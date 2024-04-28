<?php

namespace App\Http\Controllers;

use App\Http\Resources\avaible_position_resource;
use App\Http\Resources\VacanciesResource;
use App\Models\Avaible_position;
use App\Models\Societies;
use Illuminate\Http\Request;

class Job_vacancy_Controller extends Controller
{

    public function details(Request $request)
    {
        $society = Societies::where('login_tokens' , $request->token)->first();
        if(!$society){
            return response()->json([
                'message' => 'Unauthorized User'
            ], 401);
        }

        $vacancy = $society->validation()->first()->job_category()->first()->job_vacancy()->where('id' , $request->id)->first();


        $category = $vacancy->job_category()->first();
        $avaible_position = $vacancy->avaible_position()->get();

        return response()->json([
            'vacancy' => [
                "id" => $vacancy->id,
                'category' => [
                    'id' => $category->id,
                    'job_category' => $category->job_category,
                ],
                'company' => $vacancy->company,
                'address' => $vacancy->address,
                'description' => $vacancy->description,
                'avaible_position' => avaible_position_resource::collection($avaible_position),
            ]
        ] ,200);
    }


    public function show(Request $request )
    {


        $society = Societies::where('login_tokens' , $request->token)->first();
        if(!$society){
            return response()->json([
                'message' => 'Unauthorized User'
            ], 401);
        }

        $validations = $society->validation()->first()->job_category()->first()->job_vacancy()->get();

        return response()->json([

            'vacancies'=> VacanciesResource::collection($validations)

        ], 200);



    }

}
