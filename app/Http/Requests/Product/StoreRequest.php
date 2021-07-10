<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public static function requestAttributes()
    {
        return [
            'azName' => 'azName',
            'ruName' => 'ruName',
            'enName' => 'enName',
            'azDesc' => 'azDesc',
            'ruDesc' => 'ruDesc', 
            'enDesc' => 'enDesc',
            'images' => 'images',
            'price'  => 'price',
            'category' => 'category'
        ];
    }

    public static function requestAttributeLabels()
    {
        $attributes = self::requestAttributes();

        return [
            $attributes['azName'] => __('Məhsul adı'),
            $attributes['ruName'] => __('Məhsul adı'),
            $attributes['enName'] => __('Məhsul adı'),
            $attributes['azDesc'] => __('Məhsul açıqlaması'),
            $attributes['ruDesc'] => __('Məhsul açıqlaması'),
            $attributes['enDesc'] => __('Məhsul açıqlaması'),
            $attributes['images'] => __('Məhsul şəkilləri'),
            $attributes['price']  => __('Məhsul qiyməti'),
            $attributes['category'] => __('Məhsul kateqoriyası'),
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
            $attributes['azName'] => 'required|string|max:255',
            $attributes['ruName'] => 'required|string|max:255',
            $attributes['enName'] => 'required|string|max:255',
            $attributes['azDesc'] => 'required|string|max:1000',
            $attributes['ruDesc'] => 'required|string|max:1000',
            $attributes['enDesc'] => 'required|string|max:1000',
            $attributes['images'] => 'required|array|min:1',
            $attributes['price']  => 'required|between:0,1000000.99',
            $attributes['category'] => 'required|exists:categories,id',
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
            "$attributes[azName].required" => __('validation.required', [
                'attribute' => $attributeLabels[$attributes['azName']]
            ]),
            "$attributes[azName].string" => __('validation.string', [
                'attribute' => $attributeLabels[$attributes['azName']]
            ]),
            "$attributes[azName].max" => __('validation.max.string', [
                'attribute' => $attributeLabels[$attributes['azName']],
                'max' => 255
            ]),

            "$attributes[ruName].required" => __('validation.required', [
                'attribute' => $attributeLabels[$attributes['ruName']]
            ]),
            "$attributes[ruName].string" => __('validation.string', [
                'attribute' => $attributeLabels[$attributes['ruName']]
            ]),
            "$attributes[ruName].max" => __('validation.max.string', [
                'attribute' => $attributeLabels[$attributes['ruName']],
                'max' => 255
            ]),

            "$attributes[enName].required" => __('validation.required', [
                'attribute' => $attributeLabels[$attributes['enName']]
            ]),
            "$attributes[enName].string" => __('validation.string', [
                'attribute' => $attributeLabels[$attributes['enName']]
            ]),
            "$attributes[enName].max" => __('validation.max.string', [
                'attribute' => $attributeLabels[$attributes['enName']],
                'max' => 255
            ]),

            "$attributes[azDesc].required" => __('validation.required', [
                'attribute' => $attributeLabels[$attributes['azDesc']]
            ]),
            "$attributes[azDesc].string" => __('validation.string', [
                'attribute' => $attributeLabels[$attributes['azDesc']]
            ]),
            "$attributes[azDesc].max" => __('validation.max.string', [
                'attribute' => $attributeLabels[$attributes['azDesc']],
                'max' => 1000
            ]),

            "$attributes[ruDesc].required" => __('validation.required', [
                'attribute' => $attributeLabels[$attributes['ruDesc']]
            ]),
            "$attributes[ruDesc].string" => __('validation.string', [
                'attribute' => $attributeLabels[$attributes['ruDesc']]
            ]),
            "$attributes[ruDesc].max" => __('validation.max.string', [
                'attribute' => $attributeLabels[$attributes['ruDesc']],
                'max' => 1000
            ]),

            "$attributes[enDesc].required" => __('validation.required', [
                'attribute' => $attributeLabels[$attributes['enDesc']]
            ]),
            "$attributes[enDesc].string" => __('validation.string', [
                'attribute' => $attributeLabels[$attributes['enDesc']]
            ]),
            "$attributes[enDesc].max" => __('validation.max.string', [
                'attribute' => $attributeLabels[$attributes['enDesc']],
                'max' => 1000
            ]),

            "$attributes[images].required" => __('validation.required', [
                'attribute' => $attributeLabels[$attributes['images']]
            ]),
            "$attributes[images].array" => __('validation.array', [
                'attribute' => $attributeLabels[$attributes['images']]
            ]),
            "$attributes[images].min" => __('validation.min.numeric', [
                'attribute' => $attributeLabels[$attributes['images']],
                'min' => 1
            ]),

            "$attributes[price].required" => __('validation.required', [
                'attribute' => $attributeLabels[$attributes['price']]
            ]),
            "$attributes[price].between" => __('validation.between.numeric', [
                'attribute' => $attributeLabels[$attributes['price']],
                'min' => 0,
                'max' => 1000000.99
            ]),

            "$attributes[category].required" => __('validation.required', [
                'attribute' => $attributeLabels[$attributes['category']]
            ]),
            "$attributes[category].exists" => __('validation.exists', [
                'attribute' => $attributeLabels[$attributes['category']]
            ])
        ];
    }
}
