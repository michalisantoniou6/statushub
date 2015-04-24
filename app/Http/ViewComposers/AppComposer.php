<?php namespace StatusHub\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class AppComposer {

    public function compose(View $view)
    {
        if (\Auth::check()) {

            $authUserId = Auth::user()->id;

            $view->with('authUserId', $authUserId);

        }
    }

}