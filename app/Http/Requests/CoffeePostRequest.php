<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CoffeePostRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'post.name' => 'required|string|max:100',
            'post.species_name' => 'nullable|string|max:100',
            'post.area_name' => 'nullable|string|max:100',
            'post.shop_name' => 'required|string|max:100',
            'post.shop_url' => 'nullable|url',
            'post.bitter' => 'required|numeric|max:5|min:0',
            'post.acidity' => 'required|numeric|max:5|min:0',
            'post.rich' => 'required|numeric|max:5|min:0',
            'post.sweet' => 'required|numeric|max:5|min:0',
            'post.smell' => 'required|numeric|max:5|min:0',
            'post.roasted' => 'nullable',
            'post.explanation' => 'required|string',
        ];
    }
}
