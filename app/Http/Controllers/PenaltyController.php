<?php

namespace App\Http\Controllers;

use App\PaymentPenalty;
use Illuminate\Http\Request;

class PenaltyController extends Controller {
    public function index() {
        $penalties = PaymentPenalty::get();

        $months = array('' => '-select-', 1 => 'January', 2 => 'February', 3 => 'March',
            4 => 'April', 5 => 'May', 6 => 'June', 7 => 'July',
            8 => 'August', 9 => 'September', 10 => 'October',
            11 => 'November', 12 => 'December');

        return view('penalties.index', compact('penalties', 'months'));
    }
}
