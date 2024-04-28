<?php

namespace App\Http\Controllers;

use App\Models\Societies;
use App\Models\Validations;
use App\Models\Validators;
use Illuminate\Http\Request;

class ValidationsController extends Controller
{


    public function store(Request $request)
    {

        $society = Societies::where('login_tokens' , $request->token)->first();
        if(!$society){
            return response()->json([
                'message' => 'Unauthorized User'
            ], 401);
        }

        $exist = Validations::where('society_id' , $society->id)->first();

        if($exist){
            return response()->json([
                'message' => 'can only one'
            ], 401);
        }

        $result = Validations::create([
            'job_category_id' => $request->job_category,
            'society_id' => $society->id,
            'work_experience' => $request->work_experience,
            'job_position' => $request->job_position,
            'reasons_accepted' => $request->reason_accepted,
        ]);

        return response()->json([
            'message' => 'Request data validation sent succesful'
        ], 200);

    }


    public function show( Request $request )
    {
        $society = Societies::where('login_tokens' , $request->token)->first();
        if(!$society){
            return response()->json([
                'message' => 'Unauthorized User'
            ], 401);
        }

        $validations_data = Validations::select([
            'id' , 'status' , 'work_experience' , 'job_category_id' , 'job_position' , 'reasons_accepted' , 'validator_notes'
        ])->where('society_id' , $society->id)->first();


        $validations_data['validator'] = $validations_data->validator();

        return response()->json([
            'validation' => $validations_data
        ], 200);
    }

}
