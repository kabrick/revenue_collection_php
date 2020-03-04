<?php

namespace App\Http\Controllers;

use App\StoreOwner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class StoreOwnersController extends Controller {
    public function create() {
        return view('store_owners.create');
    }

    public function save(Request $request) {
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
}
