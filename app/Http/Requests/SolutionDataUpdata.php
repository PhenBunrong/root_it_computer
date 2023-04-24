<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SolutionDataUpdata extends FormRequest
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
        $solution_id = $this->route('solution')->id;
        return [
            'name' => 'required|string|max:255',
            'image' => 'nullable|image',
            'status' => 'required|boolean',
        ];
    }
}
