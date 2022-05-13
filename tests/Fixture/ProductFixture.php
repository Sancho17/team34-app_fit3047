<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ProductFixture
 */
class ProductFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'product';
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
                'description' => 'Lorem ipsum dolor sit amet',
                'price' => 1,
                'sku' => 1,
                'image_link' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
