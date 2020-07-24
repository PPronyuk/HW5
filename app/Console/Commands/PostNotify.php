<?php

namespace App\Console\Commands;

use App\Notifications\NewPostPublished;
use App\Post;
use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Date;

class PostNotify extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'post:notify {--start=YYYY-MM-DD : Дата начала периода} {--end=YYYY-MM-DD : Дата окончания периода}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Рассылка уведомлений о новых постах пользователям за указанный период времени';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $posts = Post::whereBetween('created_at', [Date::create($this->option('start')), Date::create($this->option('end'))])
            ->where('published', true)
            ->get();

        $users = User::all();

        $notice = new NewPostPublished($posts);

        $users->each(function ($user) use ($notice) {
            $user->notify($notice);
        });
    }
}
