<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMovieRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [

                'title' =>'sometimes|required|unique:movies|string',
                "director" => 'sometimes|required|string',
                "image_url" => 'sometimes|URL|string',
                "duration" => 'sometimes|required|min:1|max:500|integer',
                "release_date" => 'sometimes|required|date_format:Y-m-d',
                "genre" => "string|nullable"



        ];
    }
}
