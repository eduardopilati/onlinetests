<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TestGroupRequest extends FormRequest
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
        $id = $this->route('id') ?? 0;
        return [
            'title' => ['string', 'min:5', 'max:100', 'required', "unique:test_groups,title,{$id}"]
        ];
    }
}
