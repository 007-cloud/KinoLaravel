<?php

namespace App\Listeners;

use App\Events\ProductPurchased;
use App\Notifications\PaymentReceived;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class AwardAchievements
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ProductPurchased  $event
     * @return void
     */
    public function handle(ProductPurchased $event)
    {
        request()->user()->notify(new PaymentReceived(1000));
    }
}
