<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Qoute Entity
 *
 * @property int $id
 * @property int $prod_id
 * @property int $weight
 * @property int $height
 * @property int $width
 * @property int $length
 * @property int $amount
 * @property string $address
 * @property int $area_id
 * @property string $email
 * @property int $delivery_id
 *
 * @property \App\Model\Entity\AddressState $address_state
 * @property \App\Model\Entity\Product $product
 * @property \App\Model\Entity\Delivery $delivery
 */
class Qoute extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'prod_id' => true,
        'weight' => true,
        'height' => true,
        'width' => true,
        'length' => true,
        'amount' => true,
        'address' => true,
        'area_id' => true,
        'email' => true,
        'delivery_id' => true,
        'address_state' => true,
        'product' => true,
        'delivery' => true,
    ];
}
