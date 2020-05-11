<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class PaymentWarningCommand extends Command {
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'payment:warning';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Payment Warning';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle() {
        // get all of the store owners
        $store_owners = DB::table('store_owners')
            ->select('id', 'contact')
            ->get();

        foreach ($store_owners as $owner) {
            // get the transaction for this current month and year
            $transactions = DB::table('payments')
                ->where('shop_owner_id', $owner->id)
                ->where('month', Carbon::now()->month)
                ->where('year', Carbon::now()->year)
                ->get();

            if (count($transactions) < 1) {
                $sms = "Hello, this is a gentle reminder that you have to make a payment " .
                "by the 10th of this month to avoid a penalty";

                send_sms($owner->contact, $sms);
            }
        }
    }
}
