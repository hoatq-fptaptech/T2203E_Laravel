<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MailToAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     * @return int
     */
    public function handle()
    {
        if(now()== date("2023-02-23 20:10:15")){
            echo now()."-hello world!\n";
        }

        return 0;
    }
}
