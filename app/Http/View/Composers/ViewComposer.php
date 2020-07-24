<?php


namespace App\Http\View\Composers;

use Illuminate\Support\Facades\Blade;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use App\Tag;

class ViewComposer
{
    public function compose(View $view)
    {
        $view->with('user', Auth::user())
             ->with('tagsCloud', Tag::all());

        Blade::if('admin', function (){
            return Auth::user() ? Auth::user()->isAdmin() : false;
        });


    }
}
