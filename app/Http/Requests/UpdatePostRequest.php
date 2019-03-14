<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
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
            'title' => 'required|min:3,unique:posts,title,'.$this->post['id'],
            'description'=> 'min:10',
            'user_id'=>'exists:users,id',
        ];
    }
    public function messages()
{
    return [
        'title.required' => 'A title is required',
        'description.required' => 'A Description is required',
        'user_id.exists'=> 'Username doesnot Exist',
    ];
}
}