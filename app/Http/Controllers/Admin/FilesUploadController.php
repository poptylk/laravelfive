<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Input;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\SettingRepository;

class FilesUploadController extends Controller
{
    private function upload()
    {
        $file            = Input::file('file');
        $destinationPath = public_path().'/uploads/';
        $fileExt         = $file->getClientOriginalExtension();
        $fileName        = md5(uniqid(rand())).'.'.$fileExt;
        $file->move($destinationPath, $fileName);
        return $fileName;
    }

    public function postSetting(SettingRepository $setting, Request $request)
    {
        $fileName = $this->upload();
        $setting->update([$request->field => $fileName]);
        return response()->json(['state' => 'success', 'img' => asset("uploads/{$fileName}")]);
    }
}
