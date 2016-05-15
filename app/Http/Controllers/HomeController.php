<?php namespace App\Http\Controllers;

use App\Http\Controllers\Army\Army;
use Illuminate\Support\Facades\Input;

class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{

	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('war.team-form');
	}

	public function hasGeneral(Army $army)
	{
		$flag = 0;
		foreach($army->army as $soldier)
		{
			if($soldier['soldier']->soldierType == "General")
			{
				$flag =1;
			}
		}
		return $flag;
	}

	public function wantToSurrender()
	{
		if (rand(1,100)<=10)
		{
			return $surrender =1;
		}
		return $surrender = 0;
	}

	public function hit(Army $army,$position)
	{
		$accuracy = $army->army[$position]['soldier']->soldierWeapon->accuracy;
		if (rand(1,100)<=$accuracy)
		{
			return 1;
		}
		return 0;

	}

	public function attack(Army $army_1,Army $army_2,$pos)
	{
		$maxKey = max(array_keys($army_2->army));
		$position = rand(0,$maxKey);
		if(array_key_exists($position,$army_2->army))
		{
			$hit= $this->hit($army_1,$pos);
			if($hit == 1)
			{
				unset($army_2->army[$position]);
				return  "Soldier from ".$army_1->name." Killed a soldier from " .$army_2->name .' with '.$army_1->army[$pos]['soldier']->soldierWeapon->name;
			}

			return $army_1->name. " Soldier Missed Fire";
		}else
		{
			return $army_1->name." Soldier Fired at Wrong Place Wrong Time";
		}

	}

	public function getWarData()
	{
		$numberOfSoldiers = Input::get('no_of_soldiers');
		$Army_A = new Army(Input::get('team_one'));
		$Army_B = new Army(Input::get('team_two'));
		$Army_A->getArmy($numberOfSoldiers);
		$Army_B->getArmy($numberOfSoldiers);
		$Armies = [$Army_A,$Army_B];
		$n =0;
		$messages = array();
		$matchWon=null;
		while($this->hasGeneral($Army_A) == 1 && $this->hasGeneral($Army_B)==1)
		{
			$chance = $n%2;
			if($chance == 0)
			{
				$idle = 1;
			}else
			{
				$idle = 0;
			}
			$ArmyToAttack = $Armies[$chance];
			$ArmyToDefend = $Armies[$idle];

			if($this->wantToSurrender()==1)
			{
				array_push($messages,'Surrender');
				$matchWon = $ArmyToDefend->name;
				break;
			}

			$SoldiersPosition = array_keys($ArmyToAttack->army);
			$position = array_rand($SoldiersPosition);
			array_push($messages,$this->attack($ArmyToAttack,$ArmyToDefend,$position));
			$n++;
		}

		if($matchWon == null)
		{
			if($this->hasGeneral($Army_A) == 0)
			{
				array_push($messages,$Army_A->name.' General has died');
				$matchWon = $Army_B->name;
			}else
			{
				array_push($messages,$Army_B->name . " General has died");
				$matchWon = $Army_A->name;
			}
		}

		dd(['match'=>$matchWon,'messages'=>$messages]);
		return[
			'status'=>'OK',
			'matchWon'=>$matchWon,
			'messages' => $messages
		];




	}



}
