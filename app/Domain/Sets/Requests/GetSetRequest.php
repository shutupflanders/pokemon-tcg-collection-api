<?php

namespace App\Domain\Sets\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GetSetRequest extends FormRequest
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
            //
        ];
    }

    /**
     * @return string
     */
    public function getSetName(): string
    {
        return $this->route('setName');
    }
}
