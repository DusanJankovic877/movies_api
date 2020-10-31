<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateMovieRequest extends FormRequest
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
            'title' =>'required|unique:movies|string',
            "director" => 'required|string',
            "image_url" => 'URL|string',
            "duration" => 'required|min:1|max:500|integer',
            "release_date" => 'required|unique:movies|date_format:Y-m-d',
            "genre" => "string|nullable"


        ];
    }
}
