<?php

namespace App\Http\Controllers\Frontend;

use App\Models\HBanner;
use App\Models\HBannerBtn;
use Illuminate\Http\Request;
use App\Models\TrustedClient;
use App\Models\HBannerService;
use App\Models\TrustedClientItem;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index(){
        $hbanner = HBanner::first();
        $hbannerbtn = HBannerBtn::all();
        $hbannerservice = HBannerService::all();
        $trusted_clients = TrustedClient::where('is_active', 1)->get();
        $trasted_desc_items = TrustedClientItem::orderBy('created_at', 'DESC')->get();
        $trasted_asc_items = TrustedClientItem::orderBy('created_at', 'ASC')->get();
        return view('frontend.pages.home.index', get_defined_vars());
    }

}
