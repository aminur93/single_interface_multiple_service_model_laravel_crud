<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class CategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        if(Request::routeIs('category.store')){
            return [
                'name' => 'required|unique:categories,name',
                'slug' => 'required'
            ];
        }

        if(Request::routeIs('category.update')){

            $category_id = $this->route('id');

            return [
                'name' => 'required|unique:categories,name,'.$category_id,
                'slug' => 'required'
            ];
        }
    }
}
