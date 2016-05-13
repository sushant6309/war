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

	public function getWarData()
	{
		$numberOfSoldiers = Input::get('no_of_soldiers');

		$Army_A = new Army(Input::get('team_one'));
		$Army_B = new Army(Input::get('team_two'));
		$Army_A->getArmy($numberOfSoldiers);
		$Army_B->getArmy($numberOfSoldiers);

		$war = ['army_A'=>$Army_A,'army_B'=>$Army_B];

		dd($war);
	}

}
