<?php

namespace App\Helpers;

use Carbon\Carbon;
use Illuminate\Http\Request;

trait DateFormatter
{
    /**
     * @param Request $request
     * @return array
     */
    private function formatDates(Request $request): array
    {
        $startDate = Carbon::parse($request->input('start_date'));
        $endDate = Carbon::parse($request->input('end_date')??'now');
        return [$startDate, $endDate];
    }
}
