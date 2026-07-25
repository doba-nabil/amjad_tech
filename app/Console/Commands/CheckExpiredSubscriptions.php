<?php

namespace App\Console\Commands;

use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;

#[Signature('subscriptions:check-expired')]
#[Description('Check for expired subscriptions and update their status')]
class CheckExpiredSubscriptions extends Command
{
    /**
     * Execute the console command.
     */
    public function handle()
    {
        $expiredPurchases = \App\Models\Purchase::where('status', 'active')
            ->whereNotNull('expiration_date')
            ->where('expiration_date', '<', now()->toDateString())
            ->get();

        foreach ($expiredPurchases as $purchase) {
            $purchase->update(['status' => 'expired']);

            try {
                \Illuminate\Support\Facades\Mail::to($purchase->email)
                    ->send(new \App\Mail\SubscriptionExpiredMail($purchase));
            } catch (\Exception $e) {
                \Log::error('Failed to send expiration email for purchase ID ' . $purchase->id . ': ' . $e->getMessage());
            }
        }

        $this->info('Checked and updated ' . $expiredPurchases->count() . ' expired subscriptions.');
    }
}
