<?php

namespace App\Http\Controllers\API\ADMIN;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function store(UserRequest $request) 
	{
        try {
			DB::beginTransaction();
			$user = new User();
			$user->fill($request->all());
			$user->password = Hash::make($request->input('password'));
            $user->save();
			DB::commit();
			return response()->json([
				'success' => true,
				'message' => 'Usuario Creado Correctamente',
			], 200);
			// $userData = $request->all();
			// if ($userData) {
			// 	return response()->json([
			// 	'success' => true,
			// 	'message' => 'Usuario Test Creado Correctamente',
			// 	], 200);
			// }
		} catch (\Exception $e) {
			DB::rollback();
			// dd($e);
			return response()->json([
				'success' => false,
				'message' => $e->getMessage()
			], 500);
		}
	}
}
