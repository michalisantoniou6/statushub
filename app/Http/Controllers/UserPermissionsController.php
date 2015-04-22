<?php namespace StatusHub\Http\Controllers;

use StatusHub\Http\Requests;
use StatusHub\Http\Controllers\Controller;

use Illuminate\Http\Request;

class UserPermissionsController extends Controller {

    protected $authUser;
    protected $isUrlUserAFriend;
    protected $urlUserId;

    public function __construct(Request $request)
    {
        $this->authUser = \Auth::user();
        $this->urlUserId = $request->route('user');
        $this->isUrlUserAFriend = $this->authUser->verifyFriendship($this->urlUserId);
    }

}
