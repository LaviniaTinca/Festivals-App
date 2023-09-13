<?php

namespace App\Console\Commands;

use App\Models\Event;
use App\Models\User;
use App\Notifications\FestivalNotification;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;

class SendNotification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send-notification:now';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sends notification to users about their liked events';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $events = Event::all();

        foreach ($events as $event) {
            foreach ($event->likers as $liker) {
                if (Carbon::parse($event->date)->isToday()) {
                    $liker->notify(new FestivalNotification($event));
                }
            }
        }
        return 0;
    }
}
