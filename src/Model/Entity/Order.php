<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Order Entity
 *
 * @property int $id
 * @property int $qoute_id
 * @property int $delivery_fee
 * @property int $total_fee
 * @property \Cake\I18n\FrozenTime $date
 *
 * @property \App\Model\Entity\Qoute $qoute
 */
class Order extends Entity
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
        'qoute_id' => true,
        'total_fee' => true,
        'date' => true,
    ];
}
