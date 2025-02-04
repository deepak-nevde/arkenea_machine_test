<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Employee Entity
 *
 * @property int $emp_id
 * @property string $emp_name
 * @property string $address
 * @property string $email
 * @property int $phone
 * @property \Cake\I18n\FrozenTime $dob
 * @property string|resource $emp_img
 */
class Employee extends Entity
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
        'emp_name' => true,
        'address' => true,
        'email' => true,
        'phone' => true,
        'dob' => true,
        'emp_img' => true,
    ];
}
