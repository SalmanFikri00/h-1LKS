<?php

namespace App\Http\Controllers;

use App\Models\Regionals;
use App\Models\Societies;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index( Request $request )
    {

        $data = Societies::where('id_card_number' , $request->id_card_number)->where('password' , $request->password)->first();

        if(!$data){
            return response()->json([
                'message' => 'ID card Number Or Password incorrect'
            ], 200);
        }

        $data->update(['login_tokens' => md5($request->id_card_number)]);

        $data = Societies::select(
            'name' , 'born_date' , 'gender' , 'address'
            )->where('id_card_number' , $request->id_card_number)->where('password' , $request->password)->first();

        $data['tokens'] =  md5($request->id_card_number);

        $data['regional'] = Regionals::find(Societies::select([
            'regional_id'
        ])->where('id_card_number' , $request->id_card_number)->where('password' , $request->password)->first())->first();

        return response()->json($data, 200);

    }

    public function destroy( Request $request)
    {

        $data = Societies::where('login_tokens' , $request->token )->first();

        // return response()->json($data, 200);

        if(!$data){
            return response()->json([
                'message' => 'invalid tokens'
            ], 401);
        }
        $data->update(['login_tokens' => null]);

        return response()->json([
            'message' => 'logout succes'
        ], 200);

    }
}
