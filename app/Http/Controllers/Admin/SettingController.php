<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\SettingRepository;

class SettingController extends Controller
{
    protected $setting;

    public function __construct(SettingRepository $settingRepository)
    {
        $this->setting = $settingRepository;
    }

    
    public function getIndex()
    {
        $setting = $this->setting->index();

        return view('back.setting.index', compact('setting'));
    }

    public function putIndex(Request $request)
    {
        $this->setting->update($request->except(['_token', '_method']));
        return redirect()->route('admin::setting')
                         ->with('state', 'success')
                         ->with('message', '更新成功');
    }
}
