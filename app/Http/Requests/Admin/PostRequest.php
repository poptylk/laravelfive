<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;

class PostRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch ($this->method()) {
            case 'POST':
                return [
                    'name'         => 'required|max:255',
                    'release_date' => 'required|date',
                    'content'      => 'max:65000',
                    'status'       => 'boolean',
                    'sort'         => 'required|integer|min:0',
                    'title'        => 'string|max:55',
                    'keywords'     => 'string|max:155',
                    'description'  => 'string|max:160',
                    'slug'         => 'string|max:155'
                ];
                break;
            case 'PUT':
                return [
                    'name'         => 'required|max:255',
                    'release_date' => 'required|date',
                    'content'      => 'max:65000',
                    'status'       => 'boolean',
                    'sort'         => 'required|integer|min:0',
                    'title'        => 'string|max:55',
                    'keywords'     => 'string|max:155',
                    'description'  => 'string|max:160',
                    'slug'         => 'string|max:155'
                ];
                break;
        }
    }
}
