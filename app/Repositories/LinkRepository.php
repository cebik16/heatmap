<?php

namespace App\Repositories;

use App\Models\Link;
use App\Repositories\Interfaces\LinkRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Support\Collection;

/**
 * Class LinkRepository
 * @package App\Repositories
 */
class LinkRepository extends BaseRepository implements LinkRepositoryInterface
{
    /**
     * Link constructor.
     *
     * @param Link $model
     */
    public function __construct(Link $model)
    {
        parent::__construct($model);
    }

    /**
     * @param string $url
     * @param Carbon $startDate
     * @param Carbon $endDate
     * @return Collection
     */
    public function findByUrlInInterval(string $url, Carbon $startDate, Carbon $endDate): Collection
    {
        return $this->model::whereBetween('created_at', [
                $startDate,
                $endDate,
            ])
            ->where('url', 'LIKE', "%$url%")
            ->get();
    }

    /**
     * @param string $type
     * @param Carbon $startDate
     * @param Carbon $endDate
     * @return Collection
     */
    public function findByTypeInInterval(string $type, Carbon $startDate, Carbon $endDate): Collection
    {
        return $this->model::whereBetween('created_at', [
                $startDate,
                $endDate,
            ])
            ->where(['type' => $type])
            ->get();
    }

    /**
     * @param Carbon $startDate
     * @param Carbon $endDate
     * @param string|null $type
     * @return Collection
     */
    private function retrieveLinkByTypeInInterval(Carbon $startDate, Carbon $endDate, ?string $type = null): Collection
    {
        $links = $this->model::whereBetween('created_at', [
            $startDate,
            $endDate,
        ]);
        if ($type) {
            $links->where(['type' => $type]);
        }
        return $links->get();
    }

    /**
     * @param string $customer_id
     * @return Collection
     */
    public function getCustomerItinerary(string $customer_id): Collection
    {
        return $this->model::where(['customer_id' => $customer_id])->get();
    }
}
