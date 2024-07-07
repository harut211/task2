<?php

namespace App\Console\Commands;

use App\Events\PostSendEvent;
use App\Models\Post;
use Illuminate\Console\Command;

class sendnot extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:sendnot';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $user = Post::where('id',7)->get()->toArray();
        event(new PostSendEvent($user));
    }
}
