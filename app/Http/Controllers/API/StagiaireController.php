<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Stagiaire;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\StagiaireResource;

class StagiaireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stagiaire=Stagiaire::all();
        return response(['stagiaires'=>StagiaireResource::collection($stagiaire),'message'=>'Récupéré avec succès'],200);
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
            'id_user'=>'required',
            'nom'=>'required|max:255',
            'prenom'=>'required|max:255',
            'adresse'=>'required|max:255',
        ]);
        if($validator->fails())
        {
            return response(['error'=>$validator->errors(),'Erreur de validation']);
        }
        $stagiaire = Stagiaire::create($data);
        return response(['stagiaires'=>new StagiaireResource($stagiaire),'message'=>'Créé avec succès'],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Stagiare $stagiaire)
    {
         return response(['stagiaires'=>new StagiaireResource($stagiaire),'message'=>'Récupéré avec succès'],200);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stagiaire $stagiaire)
    {
        $stagiaire->update($request->all());
        return response(['stagiaires'=>new StagiaireResource($stagiaire),'message'=>'Mis à jour avec succès'],200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stagiaire $stagiaire)
    {
        $stagiaire->delete();
        return response(['message'=>'Supprimé avec succès']);

    }
}
