<?php

namespace App\Http\Controllers;

use App\Payment;
use App\StoreOwner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class StoreOwnersController extends Controller {
    public function create() {
        return view('store_owners.create');
    }

    public function save(Request $request) {
        if (strlen($request->contact) != 10){
            return Redirect::to("/store_owners/create")->withFail('An error occurred. Please enter exactly 10 digits for the contact');
        } elseif (!in_array(str_split($request->contact, 3)[0], ["077", "070", "075"])) {
            return Redirect::to("/store_owners/create")->withFail('An error occurred. Please enter number beginning with 077, 075 or 070');
        }

        $store_owner = new StoreOwner();
        $store_owner->first_name = $request->first_name;
        $store_owner->last_name = $request->last_name;
        $store_owner->contact = $request->contact;
        $store_owner->shop_name = $request->shop_name;
        $store_owner->shop_type = $request->shop_type;
        $store_owner->location = $request->location;
        $store_owner->created_by = Auth::id();

        if ($store_owner->save()){
            return Redirect::to("/store_owners/view")->withSuccess('Shop owner details saved');
        } else {
            return Redirect::to("/store_owners/create")->withFail('An error occurred. Shop owner details not saved.');
        }
    }

    public function view() {
        $store_owners = StoreOwner::get();

        return view('store_owners.view', compact('store_owners'));
    }

    public function edit($id) {
        $store_owner = StoreOwner::find($id);

        return view('store_owners.edit', compact('store_owner'));
    }

    public function update(Request $request) {
        if (strlen($request->contact) != 10){
            return Redirect::to("/store_owners/edit/" . $request->id)->withFail('An error occurred. Please enter exactly 10 digits for the contact');
        } elseif (!in_array(str_split($request->contact, 3)[0], ["077", "070", "075"])) {
            return Redirect::to("/store_owners/edit/" . $request->id)->withFail('An error occurred. Please enter number beginning with 077, 075 or 070');
        }

        $store_owner = StoreOwner::find($request->id);
        $store_owner->first_name = $request->first_name;
        $store_owner->last_name = $request->last_name;
        $store_owner->contact = $request->contact;
        $store_owner->shop_name = $request->shop_name;
        $store_owner->shop_type = $request->shop_type;
        $store_owner->location = $request->location;

        $store_owner->save();

        return Redirect::to("/store_owners/view")->withSuccess('Shop owner details updated');
    }

    public function receive_payment($id) {
        $store_owner = StoreOwner::find($id);

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

        return view('store_owners.receive_payment', compact('store_owner', 'months', 'years'));
    }

    public function complete_payment(Request $request) {
        $payment = new Payment();

        $payment->shop_owner_id = $request->id;
        $payment->month = $request->month;
        $payment->year = $request->year;
        $payment->amount = $request->amount_paid;
        $payment->comment = $request->comment;
        $payment->created_by = Auth::id();

        $payment->save();

        return Redirect::to("/store_owners/view")->withSuccess('Shop owner payment has been processed successfully');
    }
}
