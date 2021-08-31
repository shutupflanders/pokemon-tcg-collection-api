<?php

    namespace App\Domain\Collection\Requests;

    use Illuminate\Foundation\Http\FormRequest;

    class SearchCardRequest extends FormRequest
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

        public function rules()
        {
            return [
                'name' => 'required|string|min:1',
                'number' => 'required|string|min:1|regex:/\d+(\/\d+)*/',
            ];
        }

        /**
         * @return string
         */
        public function getName(): string
        {
            return $this->query('name');
        }

        /**
         * @return string
         */
        public function getNumber(): string
        {
            return $this->query('number');
        }
    }
