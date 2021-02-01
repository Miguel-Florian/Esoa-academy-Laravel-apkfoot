<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Type_Depense;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\Type_DepenseResource;

class Type_DepenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $typeDepense= Type_Depense::all();
        return response(['type_depenses'=>Type_RecetteResource::collection($typeDepense),'message'=>"Retrieved successfullt"],200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $data=$request->all();
        $validator=Validator::make($data,[
            'libellé'=>'required',
        ]);
        if($validator->fails()){
            return response(['error'=>$validator->errors(),'Validation error']);
        }
        $typeDepense = Type_Depense::create($data);
        return response(['type_depenses'=>new Type_DepenseResource($typeDepense),'message'=>'Create successfully'],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Type_Depense $typeDepense)
    {
    return response(['type_depenses'=>new Type_DepenseResource($typeDepense),'message'=>'Récupéré avec succès'],200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Type_Depense $typeDepense)
    {
         $typeDepense->update($request->all());
        return response(['type_recettes'=>new Type_DepenseResource($typeDepense),'message'=>'Mis à jour avec succès'],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Type_Recette $typeDepense)
    {
        $typeDepense->delete();
        return response(['message'=>'Supprimé avec succès']);
    }
}
