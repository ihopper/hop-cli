<?php

namespace App\Commands;

use Illuminate\Console\Scheduling\Schedule;
use LaravelZero\Framework\Commands\Command;

class Run extends Command implements CommandInterface
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'run';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'Start the Hop-CLI Menu';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // Draw the menu
        $this->buildMenu('Hop-Cli Menu');
    }

    
    public function execCommand($option) 
    {
        // Catch the exit event
        if ($option === null) {
            exit;
        }
        
        switch ($option) {
            case 0: 
                $this->call('project');
                break;
            case 1:
                shell_exec('bash $PWD/app/scripts/fixlocaldev.sh');
                break;
            case 2:
                shell_exec('open "https://hackertyper.net/"');
                break;
            case 3: 
                $this->call('nuke');
                break;
        } 
        
        // Redraw the menu
        $this->buildMenu('Hop-Cli Menu');
    }
    
    public function buildMenu(String $title) 
    {
        $option = $this->menu($title, [
            'Open a Project',
            'Fix Local Dev',
            '2319',
            'Execute MR #305',
            ])->open();
            
        $this->execCommand($option);
    }

    /**
     * Define the command's schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule $schedule
     * @return void
     */
    public function schedule(Schedule $schedule): void
    {
        // $schedule->command(static::class)->everyMinute();
    }
}