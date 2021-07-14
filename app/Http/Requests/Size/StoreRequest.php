<?php

namespace App\Http\Requests\Size;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{

    public static function requestAttributes()
    {
        return [
            'label' => 'label',
            'number' => 'number'
        ];
    }

    public static function requestAttributeLabels()
    {
        $attributes = self::requestAttributes();

        return [
            $attributes['label'] => __('label'),
            $attributes['number'] => __('number')
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
            $attributes['label'] => 'required|string|max:255',
            $attributes['number'] => 'required|integer|min:1|max:1000'
        ];
    }

    public function messages()
    {
        $attributes = self::requestAttributes();
        $attributeLabels = self::requestAttributeLabels();

        return [
            "$attributes[label].required" => __("validation.required", [
                'attribute' => $attributeLabels[$attributes['label']]
            ]),
            "$attributes[label].string" => __("validation.string", [
                'attribute' => $attributeLabels[$attributes['label']]
            ]),
            "$attributes[label].max" => __("validation.max.string", [
                'attribute' => $attributeLabels[$attributes['label']],
                'max' => 255
            ]),

            "$attributes[number].required" => __("validation.required", [
                'attribute' => $attributeLabels[$attributes['number']]
            ]),
            "$attributes[number].integer" => __("validation.integer", [
                'attribute' => $attributeLabels[$attributes['label']]
            ]),
            "$attributes[number].min" => __("validation.min.string", [
                'attribute' => $attributeLabels[$attributes['number']],
                'min' => 1
            ]),
            "$attributes[number].max" => __("validation.max.string", [
                'attribute' => $attributeLabels[$attributes['number']],
                'max' => 1
            ]),
        ];
    }
}
