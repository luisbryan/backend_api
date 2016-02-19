<?php

namespace Testu\Http\Requests;

use Testu\Http\Requests\Request;

class TestStoreRequest extends Request
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
        return [
            'title' => 'required',
            'sub_category_id' => 'required',
            'description' => 'required|max:300',
        ];
    }
}
