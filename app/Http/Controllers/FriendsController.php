<?php namespace StatusHub\Http\Controllers;

use StatusHub\User;


use Illuminate\Routing\Router;

use StatusHub\Http\Requests;
use StatusHub\Http\Controllers\Controller;

use Illuminate\Http\Request;

class FriendsController extends Controller {

	private $isUrlUserAFriend;
	private $authUser;

	public function __construct(Router $router)
	{
		$userId = $router->current()->getParameter('user');

		$this->authUser = \Auth::user();
		$this->isUrlUserAFriend = $this->authUser->verifyFriendship($userId);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($userId)
	{
		if ( $userId != \Auth::user()->id && ! $this->isUrlUserAFriend  ) {
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
			$saved = $this->authUser->addFriend($friendId);

			return view('notify', [ 'message' => 'Successfully added friend' ]);
		}

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
