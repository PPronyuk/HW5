<?php

if (! function_exists('message')) {
    function message(string $message, string $type = 'success')
    {
        session()->flash('message', $message);
        session()->flash('message-type', $type);
    }
}

if (! function_exists('admin')) {
    function admin()
    {
        return \App\User::query()->where('id', config('app.admin_id'))->first();
    }
}
