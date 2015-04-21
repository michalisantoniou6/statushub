<?php namespace StatusHub\Http\Controllers;

use StatusHub\Http\Requests;
use StatusHub\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Routing\Router;

class UserPermissionsController extends Controller {

    protected $authUser;
    protected $isUrlUserAFriend;
    protected $urlUserId;

    public function __construct(Router $router)
    {
        $this->urlUserId = $router->current()->getParameter('user');
        $this->authUser = \Auth::user();
        $this->isUrlUserAFriend = $this->authUser->verifyFriendship($this->urlUserId);
    }

}
