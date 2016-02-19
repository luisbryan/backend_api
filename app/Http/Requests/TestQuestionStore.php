<?php

namespace Testu\Http\Requests;

use Testu\Http\Requests\Request;

class TestQuestionStore extends Request
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
            'category' => 'required',
            'question' => 'required|max:500|min:10',
        ];
    }
}
