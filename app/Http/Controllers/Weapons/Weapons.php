<?php
/**
 * Created by PhpStorm.
 * User: Sushant
 * Date: 5/13/2016
 * Time: 11:50 PM
 */
namespace App\Http\Controllers\Weapons;
class Weapons
{
    protected $weapons = [
        'Ak-47'=>[
                    'name'=>'Ak-47',
                    'power'=>3,
                    'accuracy'=> 90,
                    'max_kill'=>2
            ],
        'Insaas'=>[
                    'name'=>'Insaas',
                    'power'=>2,
                    'accuracy'=> 60,
                    'max_kill'=>1
            ],
        'Bulpa'=>[
                    'name'=>'Bulpa',
                    'power'=>4,
                    'accuracy'=> 98,
                    'max_kill'=>5
        ],
        'Knife'=>[
                    'name'=>'Knife',
                    'power'=>3,
                    'accuracy'=> 90,
                    'max_kill'=>2
        ],
        'Hand-grenade'=>[
                    'name'=>'Hand-grenade',
                    'power'=>5,
                    'accuracy'=> 40,
                    'max_kill'=>10
        ],
        'Bullet-Vest'=>[
                    'name'=>'Bullet-vest',
                    'power'=>5,
                    'accuracy'=> 100,
                    'max_kill'=>0
        ],
        'nothing'=>[
                    'name'=>'Nothing',
                    'power'=>0,
                    'accuracy'=> 0,
                    'max_kill'=>0
        ]
    ];
    protected $name;
    protected $power;
    protected $accuracy;
    protected $max_kill;

    public function __construct()
    {
        $weapon = array_rand($this->weapons);
        $this->name = $this->weapons[$weapon]['name'];
        $this->power = $this->weapons[$weapon]['power'];
        $this->accuracy= $this->weapons[$weapon]['accuracy'];
        $this->max_kill = $this->weapons[$weapon]['max_kill'];
    }
}