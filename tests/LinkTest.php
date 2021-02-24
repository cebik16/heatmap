<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class LinkTest extends TestCase
{
    /**
     * A test for listing.
     *
     * @test
     * @return void
     */
    public function list(): void
    {
        $this->get('/api/links')
            ->seeJsonStructure([
                'data' => [
                    '*' => [
                        'id',
                        'url',
                        'type',
                        'customer_id',
                        'created_at',
                        'updated_at',
                    ]
                ]
            ]);
    }

    /**
     * A test for creating an entry.
     *
     * @test
     * @return void
     */
    public function create(): void
    {
        $this->post('/api/links', [
                'url' => 'http://www.example.com',
                'type' => 'product',
                'customer_id' => 'a_random_string'
            ])
            ->seeJsonStructure([
                'data' => [
                    'id',
                    'url',
                    'type',
                    'customer_id',
                    'created_at',
                    'updated_at',
                ]
            ]);
    }

    /**
     * A test for find By Url In Interval.
     *
     * @test
     * @return void
     */
    public function findByUrlInInterval(): void
    {
        $this->json('GET',  '/api/links/by-url-in-interval',[
            'start_date' => '2021-02-23',
            'url' => 'http://www.example.com',
        ])
            ->seeJsonStructure([
                'count',
                'data' => [
                    '*' => [
                        'id',
                        'url',
                        'type',
                        'customer_id',
                        'created_at',
                        'updated_at',
                    ]
                ]
            ]);
    }

    /**
     * A test for find By Type In Interval.
     *
     * @test
     * @return void
     */
    public function findByTypeInInterval(): void
    {
        $this->json('GET',  '/api/links/by-type-in-interval',[
                'start_date' => '2021-02-23',
                'type' => 'product',
            ])
            ->seeJsonStructure([
                'count',
                'data' => [
                    '*' => [
                        'id',
                        'url',
                        'type',
                        'customer_id',
                        'created_at',
                        'updated_at',
                    ]
                ]
            ]);
    }

    /**
     * A test for get Customer Itinerary.
     *
     * @test
     * @return void
     */
    public function getCustomerItinerary(): void
    {
        $this->json('GET',  '/api/links/customer-itinerary',[
                'customer_id' => 'random_string'
            ])
            ->seeJsonStructure([
                'data' => [
                    '*' => [
                        'id',
                        'url',
                        'type',
                        'customer_id',
                        'created_at',
                        'updated_at',
                    ]
                ]
            ]);
    }
}
