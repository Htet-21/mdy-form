<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
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
            //

            'customer_name' => 'required',
            'email' => 'required|email',
            'amount' => 'required|numeric',
            'product_name' => 'required',
            'currency' => 'required|in:USD,MMK',
            
        ];
    }
}
