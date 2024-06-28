<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\DailyReport;

class SendDailyReport extends Command
{
    protected $signature = 'send:daily-report';
    protected $description = 'Send daily email report';

    public function handle()
    {
        Mail::to('recipient@example.com')->send(new DailyReport());

        $this->info('Daily report email sent successfully!');
    }
}
