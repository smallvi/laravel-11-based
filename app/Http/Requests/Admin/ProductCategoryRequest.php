<?php

namespace App\Http\Requests\Admin;

use App\Helpers\Status;
use Illuminate\Validation\Rule;
use App\Http\Middlewares\CustomAuth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;

class ProductCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return (Auth::user()->type == 'admin') && Gate::any(['product_category.create', 'product_category.update']);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|unique:product_categories|max:255',
            'sku' => 'required|gte:5',
            'status' => Rule::in(array_keys(Status::getActiveStatusText())),
            'description' => 'nullable',
        ];
    }
}
