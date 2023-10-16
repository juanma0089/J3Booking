<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

/**
 * Summary of CreateNewUser
 */
class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {

        Validator::make($input, [
            'name' => ['required', 'string', 'min:2', 'max:255'],
            'surname' =>  ['string', 'min:2', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'min:5',
                'max:255',
                'regex:/(.*)@(.*)\.(es|com|org)/i',
                Rule::unique(User::class),
            ],
            'password' => [],
            'role' => ['required', 'string', Rule::in(['normal', 'moderator', 'admin'])],
            'phone' => []
        ])->validate();

        return User::create([
            'name' => $input['name'],
            'surname' => $input['surname'] ?? '',
            'email' => $input['email'],
            'password' => Hash::make($this->generatePassword()),
            'role' => $input['role'],
            'phone' => $input['phone']  ?? '',
        ]);
    }

    /**
     * Summary of generatePassword
     * @param mixed $length
     * @return string
     */
    function generatePassword()
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; // Caracteres posibles
        $password = ''; // Inicializar la contraseña

        for ($i = 0; $i < 8; $i++) {
            $password .= $characters[rand(0, strlen($characters) - 1)];
        }

        return $password;
    }
}
