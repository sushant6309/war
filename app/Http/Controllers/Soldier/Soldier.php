<?php
/**
 * Created by PhpStorm.
 * User: Sushant
 * Date: 5/13/2016
 * Time: 11:28 PM
 */
namespace App\Http\Controllers\Soldier;


class Soldier
{

    protected $power = [1,2,3,4,5];
    protected $type = ['General','Major','Captain','Lieutenant','Jawan'];
    protected $soldierPower;
    protected $soldierType;

   public function __construct()
   {
       $this->powerType = array_rand($this->power);
       $this->soldierType = array_rand($this->type);
   }
}
