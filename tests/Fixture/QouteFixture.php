<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * QouteFixture
 */
class QouteFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'qoute';
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
                'prod_id' => 1,
                'weight' => 1,
                'height' => 1,
                'width' => 1,
                'length' => 1,
                'amount' => 1,
                'address' => 'Lorem ipsum dolor sit amet',
                'area_id' => 1,
                'email' => 'Lorem ipsum dolor sit amet',
                'delivery_id' => 1,
            ],
        ];
        parent::init();
    }
}
