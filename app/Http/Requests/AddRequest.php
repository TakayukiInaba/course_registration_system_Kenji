<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
     public function authorize()
     {
         if ($this->path() == 'add'){
             return true;
         }else{
             return false;
         }
     }
 
     /**
      * Get the validation rules that apply to the request.
      *
      * @return array
      */
     public function rules()
     {
             return [
                 'title' => 'required|between:1,20',
                 'summary' => 'required|between:1,100',
                 'teacher_id' => 'integer',
                 'fee' => 'numeric|between:0,999999',
             ];
     
     }
 
     public function messages()
     {
         return [
             'title.required' => '「講座名」を入力してください。',
             'title.between' => '「講座名」は1～20字の間で設定してください。',
             'teacher_id.integer' => 'エラーが発生しました。恐れ入りますがページ管理者を呼んでください。',
             'fee.numeric' => '「教材費」は半角数字で入力してください。',
             'fee.between' => '「教材費」は999999円までで入力してください。',
             'summary.required' => '「概要」を入力してください',
             'summary.between' => '「概要」は100字以内で入力してください。'
         ];
     }
}
