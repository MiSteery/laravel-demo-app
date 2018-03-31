<?php 
namespace App\Http\Requests;

use App\Http\Requests\Request; 

class BookRequest extends Request{	
	public function authorize(){
		return true;
	}

	public function rules(){
		return 
        [
          'title' =>'required',
          'author' =>'required|max:10',
        ];
	}

	/*to dispaly massgaes*/
	public function messages(){
		return [
    		'title.required' =>'You can not left :attribute empty. Must input it',
    		'author.required' =>'You can not left :attribute empty. Must input it',
    		'author.max' =>'The :attribute character can not exceed 10 chars'
    	];
	}

}