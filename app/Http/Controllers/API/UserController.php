<?php

    namespace App\Http\Controllers;

use App\Http\Requests\RegisterFormRequest;
use App\User;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Hash;
    use Illuminate\Support\Facades\Validator;
    use JWTAuth;
    use App\Project;
    use Tymon\JWTAuth\Exceptions\JWTException;

    class UserController extends Controller
    {
        public function authenticate(Request $request)
        {
            $credentials = $request->only('email', 'password');

            try {
                if (! $token = JWTAuth::attempt(['email' => $request->email, 'password' => $request->password,'isAdmin' => 1])) {
                    return response()->json(['error' => 'Informações Incorretas'], 400);
                }
            } catch (JWTException $e) {
                return response()->json(['error' => 'Não foi possível criar o Token'], 500);
            }

            return response()->json(compact('token'));
        }

        public function register(RegisterFormRequest $request)
        {
                $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:6|confirmed',
            ]);

            if($validator->fails()){
                    return response()->json($validator->errors()->toJson(), 400);
            }

            $user = User::create([
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'password' => Hash::make($request->get('password')),
            ]);

            $token = JWTAuth::fromUser($user);

            return response()->json(compact('user','token'),201);
        }
        //Listar Projetos API
        public function getProjects()
        {
            $projects = Project::all();
            return response()->json(['projects' => $projects]);
        }

        public function getAuthenticatedUser()
        {
            try {
                if (! $user = JWTAuth::parseToken()->authenticate()) {
                     return response()->json(['Usuário não Encontrado'], 404);
                }

                } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {

                     return response()->json(['Token Expirado'], $e->getStatusCode());

                } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {

                    return response()->json(['Token Inválido'], $e->getStatusCode());

                } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {

                    return response()->json(['Token não Encontrado'], $e->getStatusCode());

                }

                    return response()->json(compact('user'));
            }
    }