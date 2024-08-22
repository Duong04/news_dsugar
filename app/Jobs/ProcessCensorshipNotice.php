<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Mail\CensorshipNotice;

class ProcessCensorshipNotice implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    private $title;
    private $name;
    private $status;
    private $created_at;
    private $reviewed_at;
    private $note;
    private $email;
    public function __construct($title, $name, $status, $created_at, $reviewed_at, $email, $note = null)
    {
        $this->title = $title;
        $this->name = $name;
        $this->status = $status;
        $this->created_at = $created_at;
        $this->reviewed_at = $reviewed_at;
        $this->email = $email;
        $this->note = $note;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->email)->send(new CensorshipNotice($this->title, $this->name, $this->status, $this->created_at, $this->reviewed_at, $this->note));
    }
}
