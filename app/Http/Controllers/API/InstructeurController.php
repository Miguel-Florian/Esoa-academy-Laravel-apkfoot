<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Instructeur;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\InstructeurResource;

class InstructeurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $instructeur = Instructeur::all();
        return response(['instructeurs'=>InstructeurResource::collection($instructeur),'message'=>"Retrieved successfully"],200);
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
        $instructeur = Instructeur::create($data);
        return response(['instructeurs'=>new InstructeurResource($instructeur),'message'=>'Create successfully'],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Instructeur $instructeur)
    {
        return response(['instructeurs'=>new InstructeurResource($instructeur),'message'=>'Récupéré avec succès'],200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Instructeur $instructeur)
    {
        $instructeur->update($request->all());
        return response(['instructeurs'=>new InstructeurResource($instructeur),'message'=>'Mis à jour avec succès'],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Instructeur $instructeur)
    {
        $instructeur->delete();
        return response(['message'=>'Supprimé avec succès']);

    }
}
