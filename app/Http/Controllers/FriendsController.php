<?php namespace StatusHub\Http\Controllers;

use StatusHub\User;

use StatusHub\Http\Requests;
use StatusHub\Http\Controllers\Controller;

use Illuminate\Http\Request;

class FriendsController extends UserPermissionsController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if ( $this->urlUserId != $this->authUser->id && ! $this->isUrlUserAFriend  ) {
			$message = 'This user is not your friend, so you cannot see their friends.';
			return view('notify', [ 'message' => $message ]);
		}

		$friends = User::find($this->urlUserId)->getAllFriends();

		$hideDeleteButton = ($this->urlUserId == $this->authUser->id) ? true : false;

		return view('friends.index', ['friends' => $friends, 'hideDeleteButton' => $hideDeleteButton]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$allNotFriends = $this->authUser->getAllNotFriends($this->authUser->id);

		return view('friends.create', [ 'allUsers' => $allNotFriends ]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$friendId = $request->input('friendId');

		if( ! $this->authUser->verifyFriendship($friendId) ){
			$this->authUser->addFriend($friendId);
			$success = 'You have added ' . User::find($friendId)->name . '!';
			$responseMsg = $success;
		} else {
			$responseMsg = 'fail';
		}

		return $responseMsg;
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($userId, $friendId, Request $request)
	{
		$unfriend = User::find($this->authUser->id)->removeFriend($friendId);

		if ( $request->ajax() ) {
			return 'ok';
		} else {
			return redirect()->back();
		}
	}

}
