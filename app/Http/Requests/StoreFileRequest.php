<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Product;
use App\Http\Controllers\ProductController;
class StoreFileRequest extends FormRequest
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
        // return [
        //     'name' => 'bail| required| min:2|max:100',
        //     'description' => 'required| min:10',
        //     'filenames' => 'required',
        //     'filenames.*' => 'mimes:doc,pdf,docx,zip,png,jpge,jpg',
        //     'price' => 'required',
        // ];
    }
}
