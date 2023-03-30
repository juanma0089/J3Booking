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
            'password' => ['required', 'string', 'min:8', 'max:8']
        ])->validate();

        return User::create([
            'name' => $input['name'],
            'surname' => $input['surname'],
            'email' => $input['email'],
            'phone' => $input['phone'],


            'password' => Hash::make($input['password']),
            // 'address_id' => $address->id
        ]);
    }

    /**
     * Summary of generatePassword
     * @param mixed $length
     * @return string
     */
    function generatePassword($length)
    {
        $key = "";
        $pattern = "1234567890abcdefghijklmnopqrstuvwxyz";
        $max = strlen($pattern) - 1;
        for ($i = 0; $i < $length; $i++) {
            $key .= substr($pattern, mt_rand(0, $max), 1);
        }
        return $key;
    }
}
