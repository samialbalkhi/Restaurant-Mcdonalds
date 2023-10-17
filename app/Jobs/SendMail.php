<?php

namespace App\Jobs;

use App\Mail\AnsweringJobApplicationsMail;
use App\Models\Employment_application;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use Throwable;

class SendMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    protected $id;
    protected $data;

    public function __construct($id, $data)
    {
        $this->id = $id;
        $this->data = $data;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $Employment_application = Employment_application::find($this->id);
        $data = [
            'name' => $this->data['name'],
            'message' => $this->data['message'],
            'description' => $this->data['description'],
        ];

        Mail::to($Employment_application->email)->send(new AnsweringJobApplicationsMail($data));
    }

    public function failed(Throwable $e)
    {
        info('Email was not sent');
    }
}
