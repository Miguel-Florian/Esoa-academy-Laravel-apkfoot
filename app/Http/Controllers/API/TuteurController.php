<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tuteur;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\TuteurResource;

class TuteurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tuteur = Tuteur::all();
        return response(['tuteurs'=>TuteurResource::collection($tuteur),'message'=>"Retrieved successfully"],200);
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
            'prenom'=>'required|maw:255',
            'email'=>'required|email',
            'adresse'=>'required',
        ]);
        if($validator->fails()){
            return response(['error'=>$validator->errors(),'Validation error']);
        }
        $tuteur = Tuteur::create($data);
        return response(['tuteurs'=>new TuteurResource($tuteur),'message'=>'Create successfully'],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Tuteur $tuteur)
    {
        return response(['tuteurs'=>new TuteurResource($tuteur),'message'=>'Récupéré avec succès'],200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tuteur $tuteur)
    {
        $tuteur->update($request->all());
        return response(['tuteurs'=>new TuteurResource($tuteur),'message'=>'Mis à jour avec succès'],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tuteur $tuteur)
    {
        $tuteur->delete();
        return response(['message'=>'Supprimé avec succès']);

    }
}
