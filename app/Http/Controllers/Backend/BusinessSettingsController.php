<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Services\FileUploader;
use App\Models\Business_settings;
use App\Http\Controllers\Controller;
use App\Models\DashboardStatisticsButton;
use Illuminate\Console\View\Components\Alert;

class BusinessSettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:Settings List Page', ['only' => ['view']]);
    }
    public function view()
    {
        $data['businessSettings'] = Business_settings::first();
        $data['dashboard_buttons'] = DashboardStatisticsButton::all();
        return view('admin.pages.business-settings.settings', $data);
    }

    public function update(Request $request)
    {
        $businessSettings = Business_settings::first();

        // general info
        if ($request->query('type') == 'general_settings') {
            $request->validate([
                'logo'          => 'image|mimes:jpeg,png,jpg,gif,svg',
                'favicon'       => 'image|mimes:jpeg,png,jpg,gif,svg',
                'name'          => 'required|string',
                'email'         => 'required|email',
                'contact'       => 'required',
                'tagline'       => 'required|string',
                'address'       => 'required|string',
                'office_start'  => 'nullable',
                'office_end'    => 'nullable|after:office_start',
            ]);

            try {
                $data = [
                    'name'          => $request->name,
                    'email'         => $request->email,
                    'contact'       => $request->contact,
                    'tagline'       => $request->tagline,
                    'address'       => $request->address,
                    'office_start'  => $request->office_start,
                    'office_end'    => $request->office_end,
                ];

                // Service class for Logo upload // for company logo
                $filePath = (new FileUploader())->uploader($request, 'logo', 'settings');
                if ($request->hasFile('logo')){
                    $data['logo'] = $filePath;
                }

                // Service class for Favicon upload // for company favicon
                $filePath = (new FileUploader())->uploader($request, 'favicon', 'settings');
                if ($request->hasFile('favicon')) {
                    $data['favicon'] = $filePath;
                }

                $businessSettings->update($data);
                // Alert::success('Settings Updated');
                return redirect()->back();
            } catch (\Throwable $th) {
                // Alert::error('Something went wrong!');
                return redirect()->back();
            }
        }

        // social link
        if ($request->query('type') == 'social_link') {

            $request->validate([
                'website_link'  => 'nullable|url',
                'facebook'      => 'nullable|url',
                'linkedin'      => 'nullable|url',
                'youtube'       => 'nullable|url',
            ]);

            try {
                $data = [
                    'website_link'  => $request->website_link,
                    'facebook'      => $request->facebook,
                    'linkedin'      => $request->linkedin,
                    'youtube'       => $request->youtube,
                ];
                $businessSettings->update($data);
                // Alert::success('Settings updated');
                return redirect()->back();
            } catch (\Throwable $th) {
                // Alert::error('Something went wrong');
                return redirect()->back();
            }
        }

        // mail settings
        if ($request->query('type') == 'mail_settings') {

            $request->validate([
                'mail_mailer'           => 'required',
                'mail_host'             => 'required',
                'mail_port'             => 'required',
                'mail_username'         => 'required',
                'mail_password'         => 'required',
                'mail_encryption'       => 'required',
                'mail_from_address'     => 'required|email:rfc,dns',
                'mail_from_name'        => 'required',
            ]);

            try {
                $data = [
                    'mail_mailer'           => $request->mail_mailer,
                    'mail_host'             => $request->mail_host,
                    'mail_port'             => $request->mail_port,
                    'mail_username'         => $request->mail_username,
                    'mail_password'         => $request->mail_password,
                    'mail_encryption'       => $request->mail_encryption,
                    'mail_from_address'     => $request->mail_from_address,
                    'mail_from_name'        => $request->mail_from_name,
                ];
                $businessSettings->update($data);
                // Alert::success('Settings updated');
                return redirect()->back();
            } catch (\Throwable $th) {
                // Alert::error('Something went wrong');
                return redirect()->back();
            }
        }

        // paypal settings
        if ($request->query('type') == 'paypal_settings') {
            $request->validate([
                'paypal_mode'                    => 'required',
                'paypal_client_id'               => 'required',
                'paypal_client_secret'           => 'required',
                'paypal_currency'                => 'required',
                'paypal_test_mode'               => '',
            ]);

            try {
                $data = [
                    'paypal_mode'                    => $request->paypal_mode,
                    'paypal_client_id'               => $request->paypal_client_id,
                    'paypal_client_secret'           => $request->paypal_client_secret,
                    'paypal_currency'                => $request->paypal_currency,
                    'paypal_test_mode'               => $request->paypal_test_mode
                ];
                if (isset($request->is_paypal_active)) {
                    $data['is_paypal_active'] = 1;
                } else {
                    $data['is_paypal_active'] = 0;
                }
                $businessSettings->update($data);
                // Alert::success('Settings updated');
                return redirect()->back();
            } catch (\Throwable $th) {
                // Alert::error('Something went wrong');
                return redirect()->back();
            }
        }

        // stripe settings
        if ($request->query('type') == 'stripe_settings') {
            $request->validate([
                'stripe_key'        => 'required',
                'stripe_secret'     => 'required',
            ]);

            try {
                $data = [
                    'stripe_key'        => $request->stripe_key,
                    'stripe_secret'     => $request->stripe_secret,
                    'is_stripe_active'  => $request->is_stripe_active,
                ];
                if (isset($request->is_stripe_active)) {
                    $data['is_stripe_active'] = 1;
                } else {
                    $data['is_stripe_active'] = 0;
                }
                $businessSettings->update($data);
                // Alert::success('Settings updated');
                return redirect()->back();
            } catch (\Throwable $th) {
                // Alert::error('Something went wrong');
                return redirect()->back();
            }
        }

        // Dashboard Buttons Settings
        if ($request->query('type') == 'dashboard_button') {
            $request->validate([
                //
            ]);
            $dashboard_statisticsbuttons = DashboardStatisticsButton::all();
            // try {
            $count = 0;
            $count1 = 0;
            foreach ($dashboard_statisticsbuttons as $item) {
                $get_button = $this->getById($item->id);
                if (array_key_exists($item->id, $request->button)) {
                    $count++;
                    $get_button->status = 1;
                    $get_button->save();
                } else {
                    $count1++;
                    $get_button->status = 0;
                    $get_button->save();
                }
            }
            // Alert::success('Settings updated');
            return redirect()->back();
        }
    }

    public function getById($id)
    {
        return DashboardStatisticsButton::findOrFail($id);
    }
}
