<?php

namespace App\Repositories;

use App\Repositories\BaseRepository;
use App\Models\Setting;

class SettingRepository extends BaseRepository
{

    public function __construct(Setting $setting)
    {
        $this->model = $setting;
    }

    public function index()
    {
        return $this->model->lists('value', 'key');
    }

    public function update($inputs)
    {
        foreach ($inputs as $key => $value) {
            $this->getById($key)->update(['value' => $value]);
        }
    }
}
