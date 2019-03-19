<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Booking Entity
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $phone
 * @property string|null $state
 * @property \Cake\I18n\FrozenDate $check_in
 * @property \Cake\I18n\FrozenDate $check_out
 * @property string $room_type
 * @property int $room_nr
 * @property int $nr_adults
 * @property int $nr_children
 * @property int|null $total_cost
 * @property \Cake\I18n\FrozenTime|null $created
 * @property string|null $status
 */
class Booking extends Entity
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
        'first_name' => true,
        'last_name' => true,
        'email' => true,
        'phone' => true,
        'state' => true,
        'check_in' => true,
        'check_out' => true,
        'room_type' => true,
        'room_nr' => true,
        'nr_adults' => true,
        'nr_children' => true,
        'total_cost' => true,
        'created' => true,
        'status' => true
    ];
}
