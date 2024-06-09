<?php

use Illuminate\Console\Scheduling\Event;
use Illuminate\Support\Facades\Schedule;

Schedule::command('health:check')->hourlyAtRandom(20, 35, null, function(int $minute, Event $schedule){
    return min(($minute%5),0);
});
