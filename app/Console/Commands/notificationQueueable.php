<?php

namespace App\Console\Commands;

use App\Notifications\OrderStatusChanged;
use Illuminate\Support\Facades\Notification;
use App\User;
use Illuminate\Console\Command;

class notificationQueueable extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notify:queueable';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'send  notify for all user every day';

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
        $userssend = User::all();
            foreach ($userssend as $userssen)
            {
                Notification::route('mail',$userssen->email)
                    ->notify(new OrderStatusChanged($userssen));
            }
    }
}