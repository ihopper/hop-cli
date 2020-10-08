<?php

namespace App\Commands;

use Illuminate\Console\Scheduling\Schedule;
use LaravelZero\Framework\Commands\Command;

class Nuke extends Command
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'nuke';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = "Execute MR #305 (It's a joke, people)";

    public $messages = [
        'Deploying MR #305...',
        'Deleting all the things...',
        'Removing useless comments...',
        'Deleting files...',
        'Munging personal data...',
        'Destroying backups...',
        'Fixing a drink...',
        'Making a toast...',
        'Applying for unemployment...',
        '#SweetSeverance',
    ];

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // Have some fun
        $bar = $this->output->createProgressBar(count($this->messages));
        
        $this->error('=======================  THE PROJECT IS DOOMED!  =======================');
        $bar->start();

        foreach ($this->messages as $message) {
            // Do something
            $this->line('  ' . "\033[1;36m" . $message . 'done' . "\033[0m");
            sleep(1.5);
            $bar->advance();
        }

        $bar->finish();
        $this->line('  Balance has been restored!');

        // Wait for user input before continuing
        $this->ask('Press RETURN to continue');
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
