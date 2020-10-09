<?php

namespace App\Commands;

use Illuminate\Console\Scheduling\Schedule;

interface CommandInterface
{
    public function handle();
    public function execCommand($option);
    public function buildMenu(String $title);
    public function schedule(Schedule $schedule);
}