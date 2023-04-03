<?php

namespace App\Http\Controllers;

use App\Actions\Fortify\PasswordValidationRules;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UsersController extends Controller
{
    use PasswordValidationRules;

    public function index(Request $request)
    {
        if ($request->input('action') == 'get_all_users') {
            return $this->getAllUsers();
        }

        return view('users.users');
    }

    public function getAllUsers()
    {
        $users = DB::table('users')->get();
        return response()->json($users);
    }

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(Request $request)
    {
        $request->validate([
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
            'jobtitle' => ['required', 'string', Rule::in(['rrpp'])],
            'role' => ['required', 'string', Rule::in(['normal', 'moderator', 'admin'])],
            'phone' => []
        ]);

        $errors = $request->has('errors');

        if (!$errors) {
            $newUser = new User;
            $newUser->name = $request->name;
            $newUser->surname = $request->surname;
            $newUser->email = $request->email;
            $newUser->password = Hash::make($this->generatePassword());
            $newUser->jobtitle = $request->jobtitle;
            $newUser->role = $request->role;
            $newUser->phone = $request->phone ?? '';

            $newUser->save();

            return back()->with('message', 'Usuario registrado correctamente');
        } else {
            $errors = $request->errors();
            return back()->with('errors', $errors);
        }
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
