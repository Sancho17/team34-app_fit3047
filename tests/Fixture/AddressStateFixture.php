<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AddressStateFixture
 */
class AddressStateFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'address_state';
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
                'name' => 'Lorem ipsum dolor sit amet',
                'delivery_fee' => 1,
            ],
        ];
        parent::init();
    }
}
