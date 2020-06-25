<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Setting;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
class SettingsController extends Controller
{
    public function setting() {
		return view('dashboard.settings');
	}
	public function setting_save(Request $request) {
		$data = $request->all();
        //return $data;
        $request_data = $request->except(['_method', '_token','logo', 'icon']);
        if ($request->logo) {
            $setting =Setting::orderBy('id', 'desc')->first();
            Storage::disk('local')->delete('public/logo/' . $setting->logo);
            $logo = Image::make($request->logo)
                ->encode('jpg', 50);
            Storage::disk('local')->put('public/logo/' . $request->logo->hashName(), (string)$logo, 'public');
            $request_data['logo'] = $request->logo->hashName();
        }
        if ($request->icon) {
            $setting =Setting::orderBy('id', 'desc')->first();
            Storage::disk('local')->delete('public/icon/' . $setting->icon);
            $icon = Image::make($request->icon)
                ->encode('jpg', 50);
            Storage::disk('local')->put('public/icon/' . $request->icon->hashName(), (string)$icon, 'public');
            $request_data['icon'] = $request->icon->hashName();
        }
		Setting::orderBy('id', 'desc')->update($request_data);
		session()->flash('success', __('site.updated_successfully'));
      return redirect('dashboard/settings');
	}
}
