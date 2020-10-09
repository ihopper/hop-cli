<?php

namespace App\Commands;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Console\Scheduling\Schedule;
use LaravelZero\Framework\Commands\Command;

class Project extends Command implements CommandInterface
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'project {name? : The name of the project}';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'Open a project in VS Code';

    // Constants (put these in a config)
    Const SWEETWATER="~/sites/sweetwater.com";
    Const ADMIN="~/sites/admin.sweetwater";
    Const BATCH="~/sites/batch";
    Const INSYNC="~/sites/insync";
    Const GEARFEST="~/sites/gearfest-site";
    Const MARKETPLACE="~/sites/marketplace";
    Const SWEETCARE="~/sites/sweetcare";
    Const SWEETAGILE="~/sites/sweetagile";
    Const WEBTOOLS="~/sites/webtools";
    Const SWCMS="~/sites/sweetwater-cms";


    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //Open the project
        $project = $this->argument('name');
        if (!$project) {
            // Draw the menu
            $this->buildMenu('Project Menu');
        } else {
            $this->execCommand($project);
        }

    }

    public function buildMenu(String $title) 
    {
        $project = $this->menu($title, [
            'Sweetwater.com',
            'Admin Tools',
            'Batch',
            'GearFest',
            'InSync',
            'Marketplace (UGM)',
            'SweetAgile',
            'SweetCare',
            'Sweetwater CMS',
            'WebTools'
            ])->open();

        $this->execCommand($project);
    }

    public function execCommand($project) 
    {
         // Catch the exit event
        if ($project === null) {
            exit;
        }

        switch ($project) {
            case 0: 
            case 'sw':
                shell_exec('eval cd ' . Project::SWEETWATER . ' && code .');
                break;
            case 1: 
            case 'admin':
                shell_exec('eval cd ' . Project::ADMIN . ' && code .');
                break;
            case 2: 
            case 'batch': 
                shell_exec('eval cd ' . Project::BATCH . ' && code .');
                break;
            case 3: 
            case 'gearfest': 
                shell_exec('eval cd ' . Project::GEARFEST . ' && code .');
                break;
            case 4: 
            case 'insync': 
                shell_exec('eval cd ' . Project::INSYNC . ' && code .');
                break;
            case 5: 
            case 'marketplace': 
                shell_exec('eval cd ' . Project::MARKETPLACE . ' && code .');
                break;
            case 6: 
            case 'sweetagile': 
                shell_exec('eval cd ' . Project::SWEETAGILE . ' && code .');
                break;
            case 7: 
            case 'sweetcare': 
                shell_exec('eval cd ' . Project::SWEETCARE . ' && code .');
                break;
            case 8: 
            case 'cms': 
                shell_exec('eval cd ' . Project::SWCMS . ' && code .');
                break;
            case 9: 
            case 'webtools': 
                shell_exec('eval cd ' . Project::WEBTOOLS . ' && code .');
                break;
        }

        // Redraw the main menu
        if (gettype($project) === 'integer') {
            Artisan::call('run');
        }
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
