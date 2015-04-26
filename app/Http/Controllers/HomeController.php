<?php namespace StatusHub\Http\Controllers;

use Laracasts\Utilities\JavaScript\JavaScriptFacade;

use StatusHub\User;

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
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		$id = \Auth::user()->id;

		$friends = User::find($id)->getAllFriends()->take(10)->lists('name', 'id');
		$statuses = User::find($id)->statuses()->orderBy('created_at', 'DESC')->take(20)->get()->toJson();

		\JavaScript::put([
			'authUser' => \Auth::id(),
			'baseUrl' => \URL::to('/'),
			'myStatuses' => $statuses
		]);

		return view('home', ['friends' => $friends]);
	}

}
