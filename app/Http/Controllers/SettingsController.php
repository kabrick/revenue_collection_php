<?php

namespace App\Http\Controllers;

use App\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class SettingsController extends Controller {

    public function edit_fees(){
        $settings = Settings::find(1);

        return view('settings.edit_fees', compact('settings'));
    }

    public function save_fees(Request $request){
        $settings = Settings::find(1);
        $settings->retail = $request->retail;
        $settings->wholesale = $request->wholesale;
        $settings->save();

        return Redirect::to("/settings/edit_fees")->withSuccess('Fees have been updated successfully');
    }
}
