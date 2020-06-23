<?php

namespace App\Console\Commands;

use App\Notifications\NewPostPublished;
use App\Post;
use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Validator;

class PostNotify extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'post:notify {--start= : Дата начала периода в формате YYYY-MM-DD} {--end= : Дата окончания периода в формате YYYY-MM-DD}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Рассылка уведолмлений о новых постах пользователям за указанный период времени';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }


    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $validator = Validator::make($this->option(), [
            'start' => ['required', 'date'],
            'end' => ['required', 'date'],
        ]);

        if ($validator->fails()) {
            foreach ($validator->errors()->all() as $error) {
                $this->error($error);
            }

            return false;
        }

        $posts = Post::whereDate('created_at', '>=', $this->option('start'))
            ->whereDate('created_at', '<', $this->option('end'))
            ->where('published', true)
            ->get();

        $users = User::all();

        $notice = new NewPostPublished($posts);

        $users->each(function ($user) use ($notice) {
            $user->notify($notice);
        });
    }
}
