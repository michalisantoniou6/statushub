<?php namespace StatusHub\Http\ViewComposers;

use Illuminate\Contracts\View\View;

class AppComposer {

    public function compose(View $view)
    {
        if (\Auth::check()) {

            $authUserId = \Auth::user()->id;

            $view->with('authUserId', $authUserId);

        }
    }

}