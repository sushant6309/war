<?php
/**
 * Created by PhpStorm.
 * User: Sushant
 * Date: 5/13/2016
 * Time: 11:28 PM
 */
namespace App\Http\Controllers\Soldier;


use App\Http\Controllers\Weapons\Weapons;

 class Soldier
{

    protected $power = [1,2,3,4,5];
    protected $type = ['General','Major','Captain','Lieutenant','Jawan'];
    public $soldierPower;
    public $soldierType;
    public $soldierWeapon;

   public function __construct()
   {
       $this->soldierPower = array_rand($this->power);
       $type = array_rand($this->type);
       $this->soldierType = $this->type[$type];
       if($type == 0)
       {
           unset($this->type[0]);
       }
       $this->soldierWeapon = new Weapons();
   }

}
