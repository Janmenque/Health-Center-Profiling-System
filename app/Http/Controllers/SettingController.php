<?php

namespace App\Http\Controllers;

use App\Models\Custom;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SettingController extends Controller
{

    //    ---------------------- Account --------------------------------------------------------
    public function account()
    {
        $loginUser = \Auth::user();

        return view('settings.account', compact('loginUser'));
    }

    public function accountData(Request $request)
    {
        $loginUser = \Auth::user();
        $user = User::find($loginUser->id);
        $validator = \Validator::make(
            $request->all(),
            [
                'first_name' => 'required',
                'email' => 'required|email|unique:users,email,' . $user->id,
            ]
        );
        if ($validator->fails()) {
            $messages = $validator->getMessageBag();
            return redirect()->back()->with('error', $messages->first());
        }

        if ($request->hasFile('profile')) {
            $profileWithExt = $request->file('profile')->getClientOriginalName();
            $profile = pathinfo($profileWithExt, PATHINFO_FILENAME);
            $extension = $request->file('profile')->getClientOriginalExtension();
            $profileToStore = $profile . '_' . time() . '.' . $extension;

            $directory = storage_path('uploads/profile/');
            $profilePath = $directory . $loginUser->avatar;

            if (\File::exists($profilePath)) {
                \File::delete($profilePath);
            }

            if (!file_exists($directory)) {
                mkdir($directory, 0777, true);
            }

            $request->file('profile')->storeAs('upload/profile/', $profileToStore);
        }

        if (!empty($request->profile)) {
            $user->profile = $profileToStore;
        }
        $user->first_name = $request->first_name;
        $user->last_name = !empty($request->last_name) ? $request->last_name : null;
        $user->email = $request->email;
        $user->save();

        return redirect()->back()->with('success', 'Account settings successfully updated.');
    }

    public function accountDelete(Request $request)
    {
        $loginUser = \Auth::user();
        $loginUser->delete();

        return redirect()->back()->with('success', 'Your account successfully deleted.');
    }

    //    ---------------------- Password --------------------------------------------------------

    public function password()
    {
        $loginUser = \Auth::user();

        return view('settings.password', compact('loginUser'));
    }

    public function passwordData(Request $request)
    {
        if (\Auth::Check()) {
            $validator = \Validator::make(
                $request->all(),
                [
                    'current_password' => 'required',
                    'new_password' => 'required|min:6',
                    'confirm_password' => 'required|same:new_password',
                ]
            );
            if ($validator->fails()) {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error', $messages->first());
            }
            $loginUser = \Auth::user();
            $data = $request->All();

            $current_password = $loginUser->password;
            if (Hash::check($data['current_password'], $current_password)) {
                $user_id = $loginUser->id;
                $user = User::find($user_id);
                $user->password = Hash::make($data['new_password']);;
                $user->save();

                return redirect()->back()->with('success', __('Password successfully updated.'));
            } else {
                return redirect()->back()->with('error', __('Please enter valid current password.'));
            }
        } else {
            return redirect()->back()->with('error', __('Invalid user.'));
        }
    }

    //    ---------------------- General --------------------------------------------------------

    public function general()
    {
        $loginUser = \Auth::user();

        return view('settings.general', compact('loginUser'));
    }

    public function generalData(Request $request)
    {

        if (\Auth::user()->type == 'super admin') {

            $validator = \Validator::make(
                $request->all(),
                [
                    'application_name' => 'required',
                ]
            );

            if ($request->logo) {
                $validator = \Validator::make(
                    $request->all(),
                    [
                        'logo' => 'required|mimes:png',
                    ]
                );
            }

            if ($request->landing_logo) {
                $validator = \Validator::make(
                    $request->all(),
                    [
                        'landing_logo' => 'required|mimes:png',
                    ]
                );
            }

            if ($request->favicon) {
                $validator = \Validator::make(
                    $request->all(),
                    [
                        'favicon' => 'required|mimes:png',
                    ]
                );
            }


            if ($validator->fails()) {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error', $messages->first());
            }

            if (!empty($request->application_name)) {
                $array = [
                    'APP_NAME' => $request->application_name,
                ];
                Custom::setCommon($array);
            }


            if ($request->logo) {
                $superadminLogoName = 'logo.png';
                $request->file('logo')->storeAs('upload/logo/', $superadminLogoName);
            }

            if ($request->landing_logo) {
                $superadminLandLogoName = 'landing_logo.png';
                $request->file('landing_logo')->storeAs('upload/logo/', $superadminLandLogoName);
            }

            if ($request->favicon) {
                $superadminFavicon = 'favicon.png';
                $request->file('favicon')->storeAs('upload/logo/', $superadminFavicon);
            }
        } elseif (\Auth::user()->type == 'owner') {
            $validator = \Validator::make(
                $request->all(),
                [
                    'application_name' => 'required',
                ]
            );

            if ($request->logo) {
                $validator = \Validator::make(
                    $request->all(),
                    [
                        'logo' => 'required|mimes:png',
                    ]
                );
            }

            if ($request->favicon) {
                $validator = \Validator::make(
                    $request->all(),
                    [
                        'favicon' => 'required|mimes:png',
                    ]
                );
            }

            if ($validator->fails()) {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error', $messages->first());
            }


            if (!empty($request->application_name)) {
                \DB::insert(
                    'insert into settings (`value`, `name`,`parent_id`) values (?, ?, ?) ON DUPLICATE KEY UPDATE `value` = VALUES(`value`) ',
                    [
                        $request->application_name,
                        'app_name',
                        parentId(),
                    ]
                );
            }


            if ($request->logo) {
                $ownerLogoName = parentId() . '_logo.png';
                $request->file('logo')->storeAs('upload/logo/', $ownerLogoName);

                \DB::insert(
                    'insert into settings (`value`, `name`,`parent_id`) values (?, ?, ?) ON DUPLICATE KEY UPDATE `value` = VALUES(`value`) ',
                    [
                        $ownerLogoName,
                        'company_logo',
                        parentId(),
                    ]
                );
            }

            if ($request->favicon) {
                $ownerFaviconName = parentId() . '_favicon.png';
                $request->file('favicon')->storeAs('upload/logo/', $ownerFaviconName);

                \DB::insert(
                    'insert into settings (`value`, `name`,`parent_id`) values (?, ?, ?) ON DUPLICATE KEY UPDATE `value` = VALUES(`value`) ',
                    [
                        $ownerFaviconName,
                        'company_favicon',
                        parentId(),
                    ]
                );
            }
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }


        return redirect()->back()->with('success', __('General setting successfully saved.'));
    }

    //    ---------------------- SMTP --------------------------------------------------------

    public function smtp()
    {
        $loginUser = \Auth::user();

        return view('settings.smtp', compact('loginUser'));
    }

    public function smtpData(Request $request)
    {
        if (\Auth::Check()) {
            $validator = \Validator::make(
                $request->all(),
                [
                    'sender_name' => 'required',
                    'sender_email' => 'required',
                    'server_driver' => 'required',
                    'server_host' => 'required',
                    'server_port' => 'required',
                    'server_username' => 'required',
                    'server_password' => 'required',
                    'server_encryption' => 'required',
                ]
            );
            if ($validator->fails()) {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error', $messages->first());
            }

            $smtpArray = [
                'FROM_NAME' => $request->sender_name,
                'FROM_EMAIL' => $request->sender_email,
                'SERVER_DRIVER' => $request->server_driver,
                'SERVER_HOST' => $request->server_host,
                'SERVER_PORT' => $request->server_port,
                'SERVER_USERNAME' => $request->server_username,
                'SERVER_PASSWORD' => $request->server_password,
                'SERVER_ENCRYPTION' => $request->server_encryption,
            ];
            foreach ($smtpArray as $key => $val) {
                \DB::insert(
                    'insert into settings (`value`, `name`, `type`,`parent_id`) values (?, ?, ?,?) ON DUPLICATE KEY UPDATE `value` = VALUES(`value`) ',
                    [
                        $val,
                        $key,
                        'smtp',
                        parentId(),
                    ]
                );
            }

            return redirect()->back()->with('success', __('SMTP settings successfully saved.'));
        } else {
            return redirect()->back()->with('error', __('Invalid user.'));
        }
    }

    //    ---------------------- Payment --------------------------------------------------------

    public function payment()
    {
        $loginUser = \Auth::user();

        return view('settings.payment', compact('loginUser'));
    }

    public function paymentData(Request $request)
    {
        $validator = \Validator::make(
            $request->all(),
            [
                'CURRENCY' => 'required',
                'CURRENCY_SYMBOL' => 'required',
            ]
        );
        if ($validator->fails()) {
            $messages = $validator->getMessageBag();
            return redirect()->back()->with('error', $messages->first());
        }

        $currencyArray = [
            'CURRENCY' => $request->CURRENCY,
            'CURRENCY_SYMBOL' => $request->CURRENCY_SYMBOL,
            'bank_transfer_payment' => $request->bank_transfer_payment ?? 'off',
            'STRIPE_PAYMENT' => $request->stripe_payment ?? 'off',
            'paypal_payment' => $request->paypal_payment ?? 'off',
            'flutterwave_payment' => $request->flutterwave_payment ?? 'off',
        ];
        foreach ($currencyArray as $key => $val) {
            \DB::insert(
                'insert into settings (`value`, `name`, `type`,`parent_id`) values (?, ?, ?,?) ON DUPLICATE KEY UPDATE `value` = VALUES(`value`) ',
                [
                    $val,
                    $key,
                    'payment',
                    parentId(),
                ]
            );
        }

        //        For Bank Transfer Settings
        if (isset($request->bank_transfer_payment)) {
            $validator = \Validator::make(
                $request->all(),
                [
                    'bank_name' => 'required',
                    'bank_holder_name' => 'required',
                    'bank_account_number' => 'required',
                    'bank_ifsc_code' => 'required',
                ]
            );
            if ($validator->fails()) {
                $messages = $validator->getMessageBag();
                return redirect()->back()->with('error', $messages->first());
            }

            $bankArray = [
                'bank_transfer_payment' => $request->bank_transfer_payment ?? 'off',
                'bank_name' => $request->bank_name,
                'bank_holder_name' => $request->bank_holder_name,
                'bank_account_number' => $request->bank_account_number,
                'bank_ifsc_code' => $request->bank_ifsc_code,
                'bank_other_details' => !empty($request->bank_other_details) ? $request->bank_other_details : '',
            ];

            foreach ($bankArray as $key => $val) {
                \DB::insert(
                    'insert into settings (`value`, `name`, `type`,`parent_id`) values (?, ?, ?,?) ON DUPLICATE KEY UPDATE `value` = VALUES(`value`) ',
                    [
                        $val,
                        $key,
                        'payment',
                        parentId(),
                    ]
                );
            }
        }

        //        For Strip Settings
        if (isset($request->stripe_payment)) {
            $validator = \Validator::make(
                $request->all(),
                [
                    'stripe_key' => 'required',
                    'stripe_secret' => 'required',
                ]
            );
            if ($validator->fails()) {
                $messages = $validator->getMessageBag();
                return redirect()->back()->with('error', $messages->first());
            }

            $stripeArray = [
                'STRIPE_PAYMENT' => $request->stripe_payment ?? 'off',
                'STRIPE_KEY' => $request->stripe_key,
                'STRIPE_SECRET' => $request->stripe_secret,
            ];

            foreach ($stripeArray as $key => $val) {
                \DB::insert(
                    'insert into settings (`value`, `name`, `type`,`parent_id`) values (?, ?, ?,?) ON DUPLICATE KEY UPDATE `value` = VALUES(`value`) ',
                    [
                        $val,
                        $key,
                        'payment',
                        parentId(),
                    ]
                );
            }
        }


        //        For Paypal Settings
        if (isset($request->paypal_payment)) {
            $validator = \Validator::make(
                $request->all(),
                [
                    'paypal_mode' => 'required',
                    'paypal_client_id' => 'required',
                    'paypal_secret_key' => 'required',
                ]
            );
            if ($validator->fails()) {
                $messages = $validator->getMessageBag();
                return redirect()->back()->with('error', $messages->first());
            }

            $paypalArray = [
                'paypal_payment' => $request->paypal_payment ?? 'off',
                'paypal_mode' => $request->paypal_mode,
                'paypal_client_id' => $request->paypal_client_id,
                'paypal_secret_key' => $request->paypal_secret_key,
            ];
            foreach ($paypalArray as $key => $val) {
                \DB::insert(
                    'insert into settings (`value`, `name`, `type`,`parent_id`) values (?, ?, ?,?) ON DUPLICATE KEY UPDATE `value` = VALUES(`value`) ',
                    [
                        $val,
                        $key,
                        'payment',
                        parentId(),
                    ]
                );
            }
        }

        //        For Flutterwave Settings
        if (isset($request->flutterwave_payment)) {
            $validator = \Validator::make(
                $request->all(),
                [
                    'flutterwave_public_key' => 'required',
                    'flutterwave_secret_key' => 'required',
                ]
            );
            if ($validator->fails()) {
                $messages = $validator->getMessageBag();
                return redirect()->back()->with('error', $messages->first());
            }

            $flutterwaveArray = [
                'flutterwave_payment' => $request->flutterwave_payment ?? 'off',
                'flutterwave_public_key' => $request->flutterwave_public_key,
                'flutterwave_secret_key' => $request->flutterwave_secret_key,
            ];

            foreach ($flutterwaveArray as $key => $val) {
                \DB::insert(
                    'insert into settings (`value`, `name`, `type`,`parent_id`) values (?, ?, ?,?) ON DUPLICATE KEY UPDATE `value` = VALUES(`value`) ',
                    [
                        $val,
                        $key,
                        'payment',
                        parentId(),
                    ]
                );
            }
        }


        return redirect()->back()->with('success', __('Payment successfully saved.'));
    }

    //    ---------------------- Company  --------------------------------------------------------

    public function company()
    {
        $settings = settings();
        $timezones = config('timezones');

        return view('settings.company', compact('settings', 'timezones'));
    }

    public function companyData(Request $request)
    {
        $validator = \Validator::make(
            $request->all(),
            [
                'company_name' => 'required',
                'company_email' => 'required',
                'company_phone' => 'required',
                'company_address' => 'required',
            ]
        );
        if ($validator->fails()) {
            $messages = $validator->getMessageBag();

            return redirect()->back()->with('error', $messages->first());
        }

        $settings = $request->all();
        unset($settings['_token']);

        foreach ($settings as $key => $val) {
            \DB::insert(
                'insert into settings (`value`, `name`,`parent_id`) values (?, ?, ?) ON DUPLICATE KEY UPDATE `value` = VALUES(`value`) ',
                [
                    $val,
                    $key,
                    parentId(),
                ]
            );
        }


        return redirect()->back()->with('success', __('Company setting successfully saved.'));
    }

    //    ---------------------- Language --------------------------------------------------------

    public function lanquageChange($lang)
    {
        $user = \Auth::user();
        $user->lang = $lang;
        $user->save();

        return redirect()->back()->with('success', __('Language successfully changed.'));
    }

    public function themeSettings(Request $request)
    {
        $themeSettings = $request->all();
        unset($themeSettings['_token']);
        if (\Auth::user()->type == 'super admin') {
            if (isset($request->landing_page)) {
                $themeSettings['landing_page'] = $request->landing_page;
            } else {
                $themeSettings['landing_page'] = 'off';
            }

            if (isset($request->register_page)) {
                $themeSettings['register_page'] = $request->register_page;
            } else {
                $themeSettings['register_page'] = 'off';
            }
        }

        foreach ($themeSettings as $key => $val) {
            \DB::insert(
                'insert into settings (`value`, `name`,`type`,`parent_id`) values (?, ?, ?,?) ON DUPLICATE KEY UPDATE `value` = VALUES(`value`) ',
                [
                    $val,
                    $key,
                    'common',
                    parentId(),
                ]
            );
        }

        return redirect()->back()->with('success', __('Theme settings save successfully.'));
    }

    //    ---------------------- SEO Settings --------------------------------------------------------

    public function siteSEO()
    {
        $settings = settings();
        return view('settings.site_seo', compact('settings'));
    }

    public function siteSEOData(Request $request)
    {

        $validator = \Validator::make(
            $request->all(),
            [
                'meta_seo_title' => 'required',
                'meta_seo_keyword' => 'required',
                'meta_seo_description' => 'required',
            ]
        );
        if ($validator->fails()) {
            $messages = $validator->getMessageBag();
            return redirect()->back()->with('error', $messages->first());
        }

        $settings = $request->all();
        unset($settings['_token']);
        if ($request->meta_seo_image) {
            $seoFilenameWithExt = $request->file('meta_seo_image')->getClientOriginalName();
            $seoFilename = pathinfo($seoFilenameWithExt, PATHINFO_FILENAME);
            $supportExtension = $request->file('meta_seo_image')->getClientOriginalExtension();
            $seoFileName = $seoFilename . '_' . time() . '.' . $supportExtension;


            $request->file('meta_seo_image')->storeAs('upload/seo/', $seoFileName);


            \DB::insert(
                'insert into settings (`value`, `name`, `type`,`parent_id`) values (?, ?, ?,?) ON DUPLICATE KEY UPDATE `value` = VALUES(`value`) ',
                [
                    $seoFileName,
                    'meta_seo_image',
                    'SEO',
                    parentId(),
                ]
            );
        }
        unset($settings['meta_seo_image']);
        foreach ($settings as $key => $val) {
            \DB::insert(
                'insert into settings (`value`, `name`, `type`,`parent_id`) values (?, ?, ?,?) ON DUPLICATE KEY UPDATE `value` = VALUES(`value`) ',
                [
                    $val,
                    $key,
                    'SEO',
                    parentId(),
                ]
            );
        }

        return redirect()->back()->with('success', __('Site SEO settings save successfully.'));
    }

    //    ---------------------- Google ReCaptcha Settings --------------------------------------------------------

    public function googleRecaptcha()
    {
        $settings = settings();
        return view('settings.recaptcha', compact('settings'));
    }

    public function googleRecaptchaData(Request $request)
    {

        $validator = \Validator::make(
            $request->all(),
            [
                'recaptcha_key' => 'required',
                'recaptcha_secret' => 'required',
            ]
        );
        if ($validator->fails()) {
            $messages = $validator->getMessageBag();
            return redirect()->back()->with('error', $messages->first());
        }

        $settings = $request->all();
        unset($settings['_token']);

        $recaptchaArray = [
            'google_recaptcha' => $request->google_recaptcha ?? 'off',
            'recaptcha_key' => $request->recaptcha_key,
            'recaptcha_secret' => $request->recaptcha_secret,
        ];

        foreach ($recaptchaArray as $key => $val) {
            \DB::insert(
                'insert into settings (`value`, `name`, `type`,`parent_id`) values (?, ?, ?,?) ON DUPLICATE KEY UPDATE `value` = VALUES(`value`) ',
                [
                    $val,
                    $key,
                    'recaptcha',
                    parentId(),
                ]
            );
        }

        return redirect()->back()->with('success', __('Google Recaptcha settings save successfully.'));
    }
}
