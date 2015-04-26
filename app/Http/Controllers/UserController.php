<?php namespace StatusHub\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use StatusHub\User;

use StatusHub\Http\Requests;
use StatusHub\Http\Controllers\Controller;

use Illuminate\Http\Request;

class UserController extends UserPermissionsController {
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
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
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		if ( $this->urlUserId != $this->authUser->id && ! $this->isUrlUserAFriend  ) {
			$message = 'This user is not your friend, so you cannot see their friends';
			return view('notify', [ 'message' => $message ]);
		}

		$user = User::find($id);
		$friends = $user->getAllFriends()->take(10)->lists('name', 'id');
		$statuses = $user->statuses()->orderBy('created_at', 'DESC')->take(20)->get();

		return view('user.show', [ 'name' => $user->name, 'friends' => $friends, 'statuses' => $statuses ]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
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
		//
	}

}
