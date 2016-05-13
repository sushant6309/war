<?php
/**
 * Created by PhpStorm.
 * User: Sushant
 * Date: 5/14/2016
 * Time: 1:17 AM
 */
namespace App\Http\Controllers\Army;

class Army
{
    protected $army=[];

    public function getArmy($soldiers,$weapons,$no)
    {
        for($i=0;$i<$no;$i++)
        {
            $this->army[$i]['soldier']= $soldiers[$i];
            $this->army[$i]['weapon']= $weapons[$i];
        }
    }
}