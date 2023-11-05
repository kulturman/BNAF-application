<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;

class SendSMSJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private string $senderId;
    private string $phoneNumber;
    private string $message;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(
        string $senderId,
        string $phoneNumber,
        string $message
    )
    {
        //
        $this->senderId = $senderId;
        $this->phoneNumber = $phoneNumber;
        $this->message = $message;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $url = sprintf(
            'https://www.speedsms.tech/tokens/send-message?from=%s&phone=%s&message=%s',
            $this->senderId,
            $this->phoneNumber,
            $this->message
        );

        Http::withHeaders([
            'X-auth-token' => getenv('SPEED_SMS_API_TOKEN')
        ])->get($url);
    }
}
