<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\UpdatesUserPasswords;

class UpdateUserPassword implements UpdatesUserPasswords
{
    use PasswordValidationRules;

    /**
     * Validate and update the user's password.
     *
     * @param  array<string, string>  $input
     */
    public function update(User $user, array $input)
    {
        $validator = Validator::make($input, [
            'current_password' => ['required', 'string', 'current_password:web'],
            'password' => $this->passwordRules(),
        ], [
            'current_password.current_password' => __('La contraseña actual es incorrecta'),
        ]);

        if ($validator->fails()) {
            toastr('La contraseña debe tener mínimo 8 caracteres incluyendo letras y números', 'error', 'Error');
            return back();
        }
        
        $user->forceFill([
            'password' => Hash::make($input['password']),
        ])->save();

        toastr('La contraseña ha sido modificada correctamente', 'success', '¡Listo!');

        return back();
    }
}
