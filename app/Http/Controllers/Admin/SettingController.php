<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function settingPage()
    {
        return view('admin.settings.setting');
    }

    public function websiteName(Request $request)
    {
        $request->validate([
            'website_title'=>'required'
        ]);
        option(['website_title' => $request->website_title]);
        return redirect()->route('admin.settings');
    }

    public function daimondCommission(Request $request)
    {
        // return $request->all();
        $request->validate([
            'daimond_commission'=>'required'
        ]);
        option(['daimond_commission' => $request->daimond_commission]);
        return redirect()->route('admin.settings');
    }

    public function daimondRate(Request $request)
    {
        // return $request->all();
        $request->validate([
            'daimond_rate'=>'required'
        ]);
        option(['daimond_rate' => $request->daimond_rate]);
        return redirect()->route('admin.settings');
    }
    public function withdrawRate(Request $request)
    {
        // return $request->all();
        $request->validate([
            'withdraw_rate'=>'required'
        ]);
        option(['withdraw_rate' => $request->withdraw_rate]);
        return redirect()->route('admin.settings');
    }

    // Update
    public function minimumDeposit(Request $request)
    {
        // return $request->all();
        $request->validate([
            'min_deposit'=>'required'
        ]);
        option(['min_deposit' => $request->min_deposit]);
        return redirect()->route('admin.settings');
    }

    public function headerNotice(Request $request)
    {
        // return $request->all();
        $request->validate([
            'header_notice'=>'required'
        ]);
        option(['header_notice' => $request->header_notice]);
        return redirect()->route('admin.settings');
    }

    public function footerNotice(Request $request)
    {
        // return $request->all();
        $request->validate([
            'footer_notice'=>'required'
        ]);
        option(['footer_notice' => $request->footer_notice]);
        return redirect()->route('admin.settings');
    }

    public function clubCommission(Request $request)
    {
        // return $request->all();
        $request->validate([
            'club_commission'=>'required'
        ]);
        option(['club_commission' => $request->club_commission]);
        return redirect()->route('admin.settings');
    }
    public function sponserCommission(Request $request)
    {
        // return $request->all();
        $request->validate([
            'sponser_commission'=>'required'
        ]);
        option(['sponser_commission' => $request->sponser_commission]);
        return redirect()->route('admin.settings');
    }
}
