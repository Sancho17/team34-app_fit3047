<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * OrdersFixture
 */
class OrdersFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'qoute_id' => 1,
                'delivery_fee' => 1,
                'total_fee' => 1,
                'date' => '2022-04-04 12:56:55',
            ],
        ];
        parent::init();
    }
}
