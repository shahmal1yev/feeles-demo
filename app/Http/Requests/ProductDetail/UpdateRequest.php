<?php

namespace App\Http\Requests\ProductDetail;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    public static function requestAttributes()
    {
        return [
            'colorID' => 'colorID',
            'sizeID' => 'sizeID',
            'classID' => 'classID',
            'fabricID' => 'fabricID',
            'stock' => 'stock'
        ];
    }

    public static function requestAttributeLabels()
    {
        $attributes = self::requestAttributes();
        return [
            $attributes['colorID'] => __('color'),
            $attributes['sizeID'] => __('size'),
            $attributes['classID'] => __('class'),
            $attributes['fabricID'] => __('fabric'),
            $attributes['stock'] => __('stock')
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
            $attributes['colorID'] => 'required|exists:colors,id',
            $attributes['sizeID'] => 'required|exists:sizes,id',
            $attributes['classID'] => 'required|exists:class_groups,id',
            $attributes['fabricID'] => 'required|exists:fabrics,id',
            $attributes['stock'] => 'required|integer|min:0|max:1000000',
        ];
    }

    public function messages()
    {
        $attributes = self::requestAttributes();
        $attributeLabels = self::requestAttributeLabels();
        return [
            "$attributes[colorID].required" => __("validation.required", [
                "attribute" => $attributeLabels[$attributes['colorID']]
            ]),
            "$attributes[colorID].exists" => __("validation.exists", [
                "attribute" => $attributeLabels[$attributes['colorID']]
            ]),

            "$attributes[sizeID].required" => __("validation.required", [
                "attribute" => $attributeLabels[$attributes['sizeID']]
            ]),
            "$attributes[sizeID].exists" => __("validation.exists", [
                "attribute" => $attributeLabels[$attributes['sizeID']]
            ]),

            "$attributes[classID].required" => __("validation.required", [
                "attribute" => $attributeLabels[$attributes['classID']]
            ]),
            "$attributes[classID].exists" => __("validation.exists", [
                "attribute" => $attributeLabels[$attributes['classID']]
            ]),

            "$attributes[fabricID].required" => __("validation.required", [
                "attribute" => $attributeLabels[$attributes['fabricID']]
            ]),
            "$attributes[fabricID].exists" => __("validation.exists", [
                "attribute" => $attributeLabels[$attributes['fabricID']]
            ]),

            "$attributes[stock].required" => __("validation.required", [
                "attribute" => $attributeLabels[$attributes['stock']]
            ]),
            "$attributes[stock].min" => __("validation.min.numeric", [
                "attribute" => $attributeLabels[$attributes['stock']],
                "min" => 0
            ]),
            "$attributes[stock].max" => __("validation.max.numeric", [
                "attribute" => $attributeLabels[$attributes['stock']],
                "min" => 1000000
            ]),
        ];
    }
}
