<?php

namespace App\Http\Controllers;

use App\Helpers\DateFormatter;
use App\Models\Link;
use App\Repositories\Interfaces\LinkRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

/**
 * Class LinkController
 * @package App\Http\Controllers
 */
class LinkController extends Controller
{
    use DateFormatter;
    /**
     * The link repository instance.
     *
     * @var LinkRepositoryInterface
     */
    protected LinkRepositoryInterface $links;

    /**
     * Create a new controller instance.
     *
     * @param  LinkRepositoryInterface  $links
     * @return void
     */
    public function __construct(LinkRepositoryInterface $links)
    {
        $this->links = $links;
    }

    /**
     * @return JsonResponse
     */
    public function list(): JsonResponse
    {
        return response()->json([
            'data' => $this->links->all()
        ]);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     * @throws ValidationException
     */
    public function create(Request $request): JsonResponse
    {
        $this->validate($request, Link::$rules);
        return response()->json([
            'data' => $this->links->create($request)
        ], 201);
    }

    /**
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        return response()->json([
            'data' => $this->links->find($id)
        ]);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     * @throws ValidationException
     */
    public function findByUrlInInterval(Request $request): JsonResponse
    {
        $this->validate($request, [
            'start_date' => ['required', 'date'],
            'end_date' => ['date'],
            'url' => ['required', 'url'],
        ]);
        [$startDate, $endDate] = $this->formatDates($request);
        $url = $request->input('url');
        $links = $this->links->findByUrlInInterval($url, $startDate, $endDate);
        return response()->json([
            'count' => count($links),
            'data' => $links
        ]);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     * @throws ValidationException
     */
    public function findByTypeInInterval(Request $request): JsonResponse
    {
        $this->validate($request, [
            'start_date' => ['required', 'date'],
            'end_date' => ['date'],
            'type' => [
                'required',
                'in:product,category,static-page,checkout,homepage'
            ],
        ]);
        [$startDate, $endDate] = $this->formatDates($request);
        $type = $request->input('type');
        $links = $this->links->findByTypeInInterval($type, $startDate, $endDate);
        return response()->json([
            'count' => count($links),
            'data' => $links
        ]);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     * @throws ValidationException
     */
    public function getCustomerItinerary(Request $request): JsonResponse
    {
        $this->validate($request, [
            'customer_id' => ['required'],
        ]);
        return response()->json([
            'data' => $this->links->getCustomerItinerary($request->input('customer_id'))
        ]);
    }
}
