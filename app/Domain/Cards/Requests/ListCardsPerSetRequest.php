<?php

    namespace App\Domain\Cards\Requests;

    use Illuminate\Foundation\Http\FormRequest;

    class ListCardsPerSetRequest extends FormRequest
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
            return [];
        }

        /**
         * @return string
         */
        public function getSetId(): string
        {
            return $this->route('setId');
        }
    }
