<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Product Entity
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $price
 * @property int $sku
 * @property string $image_link
 *
 * @property \App\Model\Entity\StonetypeProduct[] $stonetype_product
 * @property \App\Model\Entity\Category[] $category
 */
class Product extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
        'description' => true,
        'price' => true,
        'delivery_fee' => true,
        'sku' => true,
        'image_link' => true,
        'stonetype_product' => true,
        'category' => true,
    ];
}
