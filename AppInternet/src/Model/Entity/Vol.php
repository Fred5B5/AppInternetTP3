<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Vol Entity
 *
 * @property int $id
 * @property int $emplacementdepart_id
 * @property int $emplacementfin_id
 * @property string $heuredepart
 * @property string $heurearriver
 * @property int $prixeconomique
 * @property string $created
 * @property string $modified
 *
 * @property \App\Model\Entity\Emplacement $emplacement
 * @property \App\Model\Entity\Reservation[] $reservations
 */
class Vol extends Entity
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
        'emplacementdepart_id' => true,
        'emplacementfin_id' => true,
        'heuredepart' => true,
        'heurearriver' => true,
        'prixeconomique' => true,
        'created' => true,
        'modified' => true,
        'emplacement' => true,
        'reservations' => true
    ];
}
