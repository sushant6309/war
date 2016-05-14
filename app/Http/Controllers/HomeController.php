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
		$accuracy = $army->army[$position]['soldier']->soldierWeapon->name;
		if (rand(1,100)<=$accuracy)
		{
			return 1;
		}
		return 0;

	}

	public function attack(Army $army_1,Army $army_2,$pos)
	{
		$noOfSoldiers = count($army_2->army);
		$position = rand(0,$noOfSoldiers);
		if(array_key_exists($position,$army_2->army))
		{
			$hit= $this->hit($army_1,$pos);
			if($hit == 1)
			{
				unset($army_2->army[$position]);
				return  "Killed";
			}

			return "Missed Fire";
		}else
		{
			return "Fired at Wrong Place Wrong Time";
		}

	}

	public function getWarData()
	{
		$numberOfSoldiers = Input::get('no_of_soldiers');

		$Army_A = new Army(Input::get('team_one'));
		$Army_B = new Army(Input::get('team_two'));
		$Army_A->getArmy($numberOfSoldiers);
		$Army_B->getArmy($numberOfSoldiers);
		$chance = [$Army_A,$Army_B];
		dd($Army_B->army[0]['soldier']->soldierWeapon->name);




	}



}
