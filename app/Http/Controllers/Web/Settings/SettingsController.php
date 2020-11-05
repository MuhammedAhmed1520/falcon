<?php

namespace App\Http\Controllers\Web\Settings;

use App\Http\Controllers\Api\SettingController;
use function GuzzleHttp\Promise\all;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingsController extends Controller
{
    private $config;

    public function __construct()
    {
        $this->config = new SettingController();
    }

    public function setAr()
    {
        config('app')['locale'] == 'ar';
        session(['current_lang' => 'ar']);
        return back();
    }

    public function setEn()
    {
        config('app')['locale'] == 'en';
        session(['current_lang' => 'en']);
        return back();
    }

    public function getConfigView()
    {
        $page_title = "Module Config Update";
        $settings = $this->config->index()['data']['setting'];
        // return $settings;
        return view('pages.settings.config.edit.index', compact('page_title', 'settings'));
    }

    public function handleConfig(Request $request)
    {
        $this->config->store($request);
        return back()->with('info', __('violation.edit_success'));
    }
}
