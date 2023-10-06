<?php

namespace App\Http\Requests;

use App\Traits\CleanPhoneNumberTrait;
use Illuminate\Foundation\Http\FormRequest;

class CustomerStoreRequest extends FormRequest
{
    use CleanPhoneNumberTrait;

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'phone_number' => 'required|string|unique:customers',
        ];
    }

    /**
     * @return void
     */
    public function prepareForValidation()
    {
        $this->merge([
            'phone_number' => self::cleanPhoneNumber($this->phone_number),
        ]);

        parent::prepareForValidation();
    }

    /**
     * @return string[]
     */
    public function messages()
    {
        return [
            'name.required' => 'Поле "Имя" обязательно для заполнения.',
            'phone_number.required' => 'Поле "Номер телефона" обязательно для заполнения.',
            'phone_number.unique' => 'Такой номер телефона уже существует в системе.',
        ];
    }
}
