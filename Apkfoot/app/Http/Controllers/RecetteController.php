<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recette;
use App\Models\User;
use App\Http\Resources\RecetteResource;

class RecetteController extends Controller
{
    public function recette(){
         return RecetteResource::collection(User::all());
    }
    public function recetteByDate(Request $request) {
       return RecetteResource::collection(User::where("created_at", $request['date'])->get());
    }
}
