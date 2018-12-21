<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Reservation Entity
 *
 * @property int $id
 * @property int $user_id
 * @property int $vol_id
 * @property string $created
 * @property string $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Vol $vol
 */
class Reservation extends Entity
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
        'user_id' => true,
        'vol_id' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
        'vol' => true
    ];
}
