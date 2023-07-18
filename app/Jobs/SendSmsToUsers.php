<?php

namespace App\Jobs;

use App\Models\User;
use App\Models\Notify\SMS;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Config;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Http\Services\Message\MessageService;
use App\Http\Services\Message\SMS\SmsService;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class SendSmsToUsers implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(
        public SMS $sms
    ) {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $users = User::whereNotNull('mobile')->get();
        foreach ($users as $user) {
            $smsService = new SmsService();
            $smsService->setFrom(Config::get('sms.otp_from'));
            $smsService->setTo(array('0' . $user->mobile));
            $smsService->setText($this->sms->body);
            $smsService->setIsFlash(true);

            $messageService = new MessageService($smsService);
            $messageService->send();
        }
    }
}
