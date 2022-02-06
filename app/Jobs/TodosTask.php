<?php

namespace App\Jobs;

use App\Events\Todos;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class TodosTask implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
public $store, $userId;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($store, $userId)
    {
        $this->store = $store;
        $this->userId = $userId;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        event(new Todos($this->store, $this->userId));
    }
}
