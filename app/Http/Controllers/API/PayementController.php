<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payement;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\PayementResource;

class PayementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payement = Payement::all();
        return response(['payements'=>PayementResource::collection($payement),'message'=>'Retrieved successfully'], 200);
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
            'id_session'=>'required',
            'id_stagiaire'=>'required',
            'date_payement'=>'required|date',
            'montant'=>'required'
        ]);
        if($validator->fails())
        {
            return response(['error'=>$validator->errors(),'Erreur de validation']);
        }
        $payement=Payement::create($data);
        return response(['payements'=>new PayementResource($payement),'message'=>'Créé avec succès'],200);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Payement $payement
     * @return \Illuminate\Http\Response
     */
    public function show(Payement $payement)
    {
        return response(['payements'=>new PayementResource($payement),'message'=>'Récupéré avec succès'],200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Payement $payement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payement $payement)
    {
        $payement->update($request->all());
        return response(['payements'=>new PayementResource($payement),'message'=>'Mis à jour avec succès'],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Payement $payement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payement $payement)
    {
        $payement->delete();
        return response(["message"=>"Suppression"]);
    }
}
