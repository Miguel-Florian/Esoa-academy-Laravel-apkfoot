<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Type_Recette;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\Type_RecetteResource;

class Type_RecetteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $typeRecette= Type_Recette::all();
        return response(['type_recettes'=>Type_RecetteResource::collection($typeRecette),'message'=>"Retrieved successfullt"],200);
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
        $typeRecette = Type_Recette::create($data);
        return response(['type_recettes'=>new Type_RecetteResource($typeRecette),'message'=>'Create successfully'],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Type_Recette $typeRecette)
    {
    return response(['type_recettes'=>new Type_RecetteResource($typeRecette),'message'=>'Récupéré avec succès'],200);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Type_Recette $typeRecette)
    {
        $typeRecette->update($request->all());
        return response(['type_recettes'=>new Type_RecetteResource($typeRecette),'message'=>'Mis à jour avec succès'],200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Type_Recette $typeRecette)
    {
        $typeRecette->delete();
        return response(['message'=>'Supprimé avec succès']);
    }
}
