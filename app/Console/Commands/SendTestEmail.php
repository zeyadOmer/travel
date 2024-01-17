<?php

namespace App\Console\Commands;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestEmail;
use Illuminate\Console\Command;

class SendTestEmail extends Command
{




    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:send-test';

 

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send a test email';


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
        Mail::to('test@example.com')->send(new TestEmail());
        $this->info('Test email sent successfully!');
    }
}
