<?php

namespace App\Http\Controllers;

use App\Payment;
use Illuminate\Http\Request;

class ReportsController extends Controller {
    public function payments(Request $request) {
        if (is_null($request->month)){
            $payments = Payment::get();
        } else {
            $payments = Payment::where('month', $request->month)
                ->where('year', $request->year)
                ->get();
        }

        $months = array('' => '-select-', 1 => 'January', 2 => 'February', 3 => 'March',
            4 => 'April', 5 => 'May', 6 => 'June', 7 => 'July',
            8 => 'August', 9 => 'September', 10 => 'October',
            11 => 'November', 12 => 'December');

        $years = array('' => '-select-');

        // add years from 10 years back to now(2050? ;) )
        $end_year = date('Y');
        $start_year = $end_year - 10;

        // create array with all the years in between
        $years_range = range($start_year, $end_year);

        // add to years array to be returned to view
        foreach ($years_range as $year){
            $years[$year] = $year;
        }

        return view('reports.payments', compact('payments', 'years', 'months'));
    }
}
