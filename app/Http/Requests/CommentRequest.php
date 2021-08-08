<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
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
            'name' => [
                'required',
                'max:255',
                'regex:/(^([a-zA-Z0-9 ]+)(\d+)?$)/u'
            ],
            'comment' => [
                'required',
                'max:500',
                'regex:/(^([a-zA-Z0-9 ]+)(\d+)?$)/u'
            ],
            'parent_id' => [
                'exists:comments,id'
            ],
        ];
    }
}
