<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
        return [
            'name'               => 'required|string|max:255|unique:products,name,' . $this->product->id,
            'short_description'  => 'required|string|max:500',
            'long_description'   => 'required|string|max:10000',
            'qty'                => 'required|integer',
            'price'              => 'required|numeric|min:0',
            'old_price'          => 'nullable|numeric|min:0',
            'discount_price'     => 'nullable|numeric|min:0',
            'category_id'        => 'required|exists:categories,id',
            'subcategory_id'     => 'required|exists:subcategories,id',
            'childcategory_id'   => 'required|exists:childcategories,id',
            'brand_id'           => 'required|exists:brands,id',
            'color_id'           => 'required|exists:colors,id',
            'size_id'            => 'required|exists:sizes,id',
            'thumbnail'          => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'first_image'        => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'second_image'       => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'third_image'        => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'color_id.required'           => 'Please Choose a color',
            'size_id.required'            => 'Please Choose a size',
            'category_id.required'        => 'Please Choose a category',
            'subcategory_id.required'     => 'Please Choose a subcategory',
            'childcategory_id.required'   => 'Please Choose a childcategory',
            'brand_id.required'           => 'Please Choose a brand',
            'thumbnail.image'             => 'Thumbnail must be an image',
            'thumbnail.max'               => 'Thumbnail image size must be less than 2MB',
            'first_image.image'           => 'The first image must be an image ',
            'first_image.max'             => 'The first image size must be less than 2MB',
            'second_image.image'          => 'The second image must be an image ',
            'second_image.max'            => 'The second image size must be less than 2MB',
            'third_image.image'           => 'The third image must be an image ',
            'third_image.max'             => 'The third image size must be less than 2MB',
        ];
    }
}
