<?php

namespace App\Http\Requests\Color;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{

    public static function requestAttributes()
    {
        return [
            'azColor' => 'azColor',
            'ruColor' => 'ruColor',
            'enColor' => 'enColor',
            'hex'     => 'hex'
        ];
    }

    public static function requestAttributeLabels()
    {
        $attributes = self::requestAttributes();

        return [
            $attributes['azColor'] => __('color') . " " . __("azerbaijani name"),
            $attributes['ruColor'] => __('color') . " " . __("russian name"),
            $attributes['enColor'] => __('color') . " " . __('english name'),
            $attributes['hex']     => __('color') . " " . __('hexadecimal value')
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
            $attributes['azColor'] => 'required|string|min:1|max:255',
            $attributes['ruColor'] => 'required|string|min:1|max:255',
            $attributes['enColor'] => 'required|string|min:1|max:255',
            $attributes['hex']     => 'required|string|min:7|max:7'
        ];
    }

    public function messages()
    {
        $attributes = self::requestAttributes();
        $attributeLabels = self::requestAttributeLabels();

        return [

            "$attributes[azColor].required" => __('validation.required', [
                'attribute' => $attributeLabels[$attributes['azColor']]
            ]),
            "$attributes[azColor].string" => __('validation.string', [
                'attribute' => $attributeLabels[$attributes['azColor']]
            ]),
            "$attributes[azColor].min" => __('validation.min.string', [
                'attribute' => $attributeLabels[$attributes['azColor']],
                'min' => 1
            ]),
            "$attributes[azColor].max" => __('validation.max.string', [
                'attribute' => $attributeLabels[$attributes['azColor']],
                'max' => 255
            ]),
            
            "$attributes[ruColor].required" => __('validation.required', [
                'attribute' => $attributeLabels[$attributes['ruColor']]
            ]),
            "$attributes[ruColor].string" => __('validation.string', [
                'attribute' => $attributeLabels[$attributes['ruColor']]
            ]),
            "$attributes[ruColor].min" => __('validation.min.string', [
                'attribute' => $attributeLabels[$attributes['ruColor']],
                'min' => 1
            ]),
            "$attributes[ruColor].max" => __('validation.max.string', [
                'attribute' => $attributeLabels[$attributes['ruColor']],
                'max' => 255
            ]),

            "$attributes[enColor].required" => __('validation.required', [
                'attribute' => $attributeLabels[$attributes['enColor']]
            ]),
            "$attributes[enColor].string" => __('validation.string', [
                'attribute' => $attributeLabels[$attributes['enColor']]
            ]),
            "$attributes[enColor].min" => __('validation.min.string', [
                'attribute' => $attributeLabels[$attributes['enColor']],
                'min' => 1
            ]),
            "$attributes[enColor].max" => __('validation.max.string', [
                'attribute' => $attributeLabels[$attributes['enColor']],
                'max' => 255
            ]),

            "$attributes[hex].required" => __('validation.required', [
                'attribute' => $attributeLabels[$attributes['hex']]
            ]),
            "$attributes[hex].string" => __('validation.string', [
                'attribute' => $attributeLabels[$attributes['hex']]
            ]),
            "$attributes[hex].min" => __('validation.min.string', [
                'attribute' => $attributeLabels[$attributes['hex']],
                'min' => 7
            ]),
            "$attributes[hex].max" => __('validation.max.string', [
                'attribute' => $attributeLabels[$attributes['hex']],
                'max' => 7
            ]),
        ];
    }
}
