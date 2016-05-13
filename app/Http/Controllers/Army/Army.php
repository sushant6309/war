<?php
/**
 * Created by PhpStorm.
 * User: Sushant
 * Date: 5/14/2016
 * Time: 1:17 AM
 */
namespace App\Http\Controllers\Army;

use App\Http\Controllers\Soldier\Soldier;
use App\Http\Controllers\Weapons\Weapons;

class Army
{
    protected $army=[];
    protected $name;

    public function __construct($name)
    {
        $this->name =$name;
    }

    public function getArmy($no)
    {
        for($i=0;$i<$no;$i++)
        {
            $this->army[$i]['soldier']= new Soldier();
            $this->army[$i]['weapon']= new Weapons();
        }
    }
}