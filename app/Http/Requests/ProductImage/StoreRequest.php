<?php

namespace App\Http\Requests\ProductImage;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Get the validation request attributes that apply to the request.
     *
     * @return array
     */
    public static function requestAttributes()
    {
        return [
            'images' => 'images'
        ];
    }

    /**
     * Get the validation request attribute labels that apply to the request.
     *
     * @return array
     */
    public static function requestAttributeLabels()
    {
        $attributes = self::requestAttributes();

        return [
            $attributes['images'] => __('Şəkil')
        ];
    }

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
        $attributes = self::requestAttributes();

        return [
            $attributes['images'] => 'required|file|mimes:jpg,png|dimensions:width=450,height=450'
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        $attributes = self::requestAttributes();
        $attributeLabels = self::requestAttributeLabels();

        return [
            "$attributes[images].required" => __('validation.required', [
                'attribute' => $attributeLabels[$attributes['images']]
            ]),
            "$attributes[images].file" => __('validation.file', [
                'attribute' => $attributeLabels[$attributes['images']]
            ]),
            "$attributes[images].mimes" => __('validation.mimes', [
                'attribute' => $attributeLabels[$attributes['images']],
                'values' => 'JPEG, PNG'
            ]),
            "$attributes[images].dimensions" => __('validation.dimensions', [
                'attribute' => $attributeLabels[$attributes['images']]
            ])
        ];
    }
}
