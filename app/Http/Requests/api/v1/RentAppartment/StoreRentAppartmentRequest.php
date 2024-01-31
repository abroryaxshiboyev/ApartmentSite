<?php

namespace App\Http\Requests\api\v1\RentAppartment;

use Illuminate\Foundation\Http\FormRequest;

class StoreRentAppartmentRequest extends FormRequest
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
            'micro_district_id' => 'exists:micro_districts,id',
            'orient_id' => 'exists:orients,id',
            'price'=>'required|integer',
            'num_rooms'=>'required|integer',
            'type'=>"in:jer jay,ko'p qavatli uy",
            'description'=>'required|max:500',
            'phone'=>'required|max:13',
            'telegram'=>'string|max:255',
            'latitude'=>'regex:/^\d+(\.\d{1,2})?$/',
            'longitude'=>'regex:/^\d+(\.\d{1,2})?$/',

        ];
    }
}
