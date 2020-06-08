<?php


namespace App\Http\View\Composers;

use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use App\Tag;

class ProfileComposer
{
    public function compose(View $view)
    {
        $view->with('user', Auth::user());
        $view->with('tagsCloud', Tag::all());
    }
}
