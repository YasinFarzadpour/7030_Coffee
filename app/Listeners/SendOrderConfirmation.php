<?php

namespace App\Listeners;

use App\Events\OrderConfirmation;
use App\Jobs\SendEmailJob;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendOrderConfirmation
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(OrderConfirmation $event): void
    {
        $order = $event->order;
        SendEmailJob::dispatch($order);
    }
}
