<?php namespace StatusHub\Http\Controllers;

use StatusHub\Http\Requests;
use StatusHub\Http\Controllers\Controller;

use Illuminate\Http\Request;

class FriendshipController extends Controller {

	public static function verifyFriendship($userId)
    {
        return \Auth::user()->verifyFriendship($userId);
    }

}
