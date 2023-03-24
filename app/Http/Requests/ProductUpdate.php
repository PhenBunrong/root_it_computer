<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdate extends FormRequest
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
        $product_id = $this->route('product')->id;
        return [
            'name' => 'required|string|max:255',
            'price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'image' => 'nullable|image',
            'title' => 'nullable|string',
            'description' => 'nullable|string',
            'spl_price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'qty' => 'required|integer',
            'tax_amt' => 'required|string|max:255',
            'category_id' => 'required',
            // 'discount' => 'required',
            'brand_id' => 'required',
            'status' => 'required|boolean',
        ];
    }
}
