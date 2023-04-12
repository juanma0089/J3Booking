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

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(Request $request)
    {
        $request->validate($this->validationRules());

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

    public function index(Request $request)
    {
        switch ($request->input('action')) {
            case 'get_all_users':
                return $this->getAllUsers();
            case 'delete_user':
                return $this->deleteUser($request->input('id'));
            default:
                return view('users.users');
        }
    }

    public function getAllUsers()
    {
        $users = DB::table('users')->get();
        return response()->json($users);
    }

    public function editUser($id)
    {
        $user = User::find($id);
        return view('users.edituser', ['user' => $user]);
    }

    public function updateUser(Request $request, $id)
    {

        $user = User::find($id);
        $sameEmail = $user->email == $request->email ? true : false;



        $request->validate($this->validationRules($sameEmail));

        $errors = $request->has('errors');

        if (!$errors) {

            $user->name = $request->name;
            $user->surname = $request->surname;
            $user->email = $request->email;
            $user->jobtitle = $request->jobtitle;
            $user->role = $request->role;
            $user->phone = $request->phone ?? '';

            $user->save();

            return back()->with('message', 'Usuario editado correctamente');
        } else {
            $errors = $request->errors();
            return back()->with('errors', $errors);
        }
    }

    public function deleteUser($id)
    {
        User::find($id)->delete();

        return view('users.users');
    }

    public function validationRules($sameEmail = false)
    {
        $validation = [
            'name' => ['required', 'string', 'regex:/^[a-zA-Z ]{2,254}$/i', 'min:2', 'max:255'],
            'surname' =>  ['string', 'regex:/^[a-zA-Z ]{2,254}$/i', 'min:2', 'max:255'],
            'password' => [],
            'jobtitle' => ['required', 'string', Rule::in(['rrpp'])],
            'role' => ['required', 'string', Rule::in(['normal', 'moderator', 'admin'])],
            'phone' => ['regex:/^[0-9]{9}$/i'],
        ];

        if (!$sameEmail) {
            $validation['email'] = [
                'required',
                'string',
                'email',
                'min:5',
                'max:255',
                'regex:/(.*)@(.*)\.(es|com|org)/i',
                Rule::unique(User::class),
            ];
        };

        return $validation;
    }
}
