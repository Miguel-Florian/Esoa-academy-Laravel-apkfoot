<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Http\Resources\SessionResource;
use App\Models\Session;

class SessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $session=Session::all();
        return response(['sessions'=>SessionResource::collection($session),'message'=>'Récupéré avec success'],200);
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
            'nom Session'=>'required|max:255',
            'date_Debut'=>'required|date',
            'date_Fin'=>'required|date'
        ]);
        if($validator->fails())
        {
            return response(['error'=>$validator->error(),'Erreur de validation']);
        }
        $session=Session::create($data);
        return response(["session"=>new SessionResource($session),'message'=>'Création effectuée avec succès'],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Session $session)
    {
        return response(['session'=>new SessionResource($session),'message'=>'Récupéré avec succès',200]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Session $session)
    {
        $session->update($request->all());
        return response(['session'=>new SessionResource($session),'message'=>'Mis à jour avec succès',200]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $session->delete();
        return response(['message'=>'Suppression Ok!']);
    }
}
