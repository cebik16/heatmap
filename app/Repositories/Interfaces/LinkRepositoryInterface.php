<?php

namespace App\Repositories\Interfaces;

use Carbon\Carbon;
use Illuminate\Support\Collection;

/**
 * Interface LinkRepositoryInterface
 * @package App\Repositories\Interfaces
 */
interface LinkRepositoryInterface
{
    /**
     * @param string $url
     * @param Carbon $startDate
     * @param Carbon $endDate
     * @return Collection
     */
    public function findByUrlInInterval(string $url, Carbon $startDate, Carbon $endDate): Collection;

    /**
     * @param string $type
     * @param Carbon $startDate
     * @param Carbon $endDate
     * @return Collection
     */
    public function findByTypeInInterval(string $type, Carbon $startDate, Carbon $endDate): Collection;

    /**
     * @param string $customer_id
     * @return Collection
     */
    public function getCustomerItinerary(string $customer_id): Collection;
}
