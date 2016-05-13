<?php
/**
 * Created by PhpStorm.
 * User: Sushant
 * Date: 5/13/2016
 * Time: 11:50 PM
 */
class Weapons
{
    public $weapons = ['Ak-47','Insaas','Bulpa','Knife','Hand-grenade','Bullet-Vest',''];
    protected $name;
    protected $power;
    protected $accuracy;
    protected $max_kill;

    public function __construct(array $weapon)
    {
        $this->name = $weapon['name'];
        $this->power = $weapon['power'];
        $this->accuracy= $weapon['accuracy'];
        $this->max_kill = $weapon['max_kill'];
    }
}