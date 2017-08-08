<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * JobsOrder Entity
 *
 * @property int $id
 * @property int $standar_list_id
 * @property string $sku
 * @property string $description
 * @property string $presentation
 * @property string $job_number
 * @property int $pieces
 * @property string $comment
 *
 * @property \App\Model\Entity\StandarsList $standars_list
 */
class JobsOrder extends Entity
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
        '*' => true,
        'id' => false
    ];
}
