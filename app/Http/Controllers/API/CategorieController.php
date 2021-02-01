<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categorie;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\CategorieResource;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorie = Categorie::all();
        return response(['categories'=>CategorieResource::collection($categorie),'message'=>"Retrieved successfully"],200);
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
            'id_stagiaire'=>'required',
            'nomCategorie'=>'required|max:255',
            'description'=>'required',
        ]);
        if($validator->fails()){
            return response(['error'=>$validator->errors(),'Validation error']);
        }
        $categorie = Categorie::create($data);
        return response(['categories'=>new CategorieResource($categorie),'message'=>'Create successfully'],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Categorie $categorie)
    {
        return response(['categories'=>new CategorieResource($categorie),'message'=>'Récupéré avec succès'],200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categorie $categorie)
    {
        $categorie->update($request->all());
        return response(['categories'=>new CategorieResource($categorie),'message'=>'Mis à jour avec succès'],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categorie $categorie)
    {
        $categorie->delete();
        return response(['message'=>'Supprimé avec succès']);
    }
}
