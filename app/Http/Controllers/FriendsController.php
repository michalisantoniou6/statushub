<?php namespace StatusHub\Http\Controllers;

use StatusHub\User;

use Illuminate\Routing\Router;

use StatusHub\Http\Requests;
use StatusHub\Http\Controllers\Controller;

use Illuminate\Http\Request;

class FriendsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($userId)
	{
		if ( $userId != \Auth::user()->id && ! FriendshipVerificationController::verifyFriendship($userId)  ) {
			$message = 'This user is not your friend, so you cannot see this page';
			return view('notify', [ 'message' => $message ]);
		}

		$friends = User::find($userId)->getAllFriends();

		return view('friends.index', ['friends' => $friends]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('friends.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{

	}

}
