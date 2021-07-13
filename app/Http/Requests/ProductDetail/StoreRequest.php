<?php

namespace App\Http\Requests\ProductDetail;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{

    public static function requestAttributes()
    {
        return [
            'productID' => 'productID',
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
            $attributes['productID'] => __('product'),
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
            $attributes['productID'] => 'required|exists:products,id',
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
            "$attributes[productID].required" => __("validation.required", [
                "attribute" => "$attributeLabels[$attribute[productID]]"
            ]),
            "$attributes[productID].exists" => __("validation.exists", [
                "attribute" => "$attributeLabels[$attribute[productID]]"
            ]),

            "$attributes[colorID].required" => __("validation.required", [
                "attribute" => "$attributeLabels[$attribute[colorID]]"
            ]),
            "$attributes[colorID].exists" => __("validation.exists", [
                "attribute" => "$attributeLabels[$attribute[colorID]]"
            ]),

            "$attributes[sizeID].required" => __("validation.required", [
                "attribute" => "$attributeLabels[$attribute[sizeID]]"
            ]),
            "$attributes[sizeID].exists" => __("validation.exists", [
                "attribute" => "$attributeLabels[$attribute[sizeID]]"
            ]),

            "$attributes[classID].required" => __("validation.required", [
                "attribute" => "$attributeLabels[$attribute[classID]]"
            ]),
            "$attributes[classID].exists" => __("validation.exists", [
                "attribute" => "$attributeLabels[$attribute[classID]]"
            ]),

            "$attributes[fabricID].required" => __("validation.required", [
                "attribute" => "$attributeLabels[$attribute[fabricID]]"
            ]),
            "$attributes[fabricID].exists" => __("validation.exists", [
                "attribute" => "$attributeLabels[$attribute[fabricID]]"
            ]),

            "$attributes[stock].required" => __("validation.required", [
                "attribute" => "$attributeLabels[$attribute[stock]]"
            ]),
            "$attributes[stock].min" => __("validation.min.numeric", [
                "attribute" => "$attributeLabels[$attribute[stock]]",
                "min" => 0
            ]),
            "$attributes[stock].max" => __("validation.max.numeric", [
                "attribute" => "$attributeLabels[$attribute[stock]]",
                "min" => 1000000
            ]),
        ];
    }
}
