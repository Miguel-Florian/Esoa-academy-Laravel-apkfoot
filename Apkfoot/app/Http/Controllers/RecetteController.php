<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recette;
use App\Models\User;
use App\Http\Resources\RecetteResource;
use Illuminate\Support\Facades\DB;
use PDO;

class RecetteController extends Controller
{
    public function recette(){
        $cle=0;
        $db_host = "localhost";
        $db_name = "foot";
        $db_user = "root";
        $db_pass = "";
        $db = new PDO("mysql:host=$db_host:3306;dbname=$db_name", $db_user, $db_pass);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sum=$db->query("SELECT SUM(Prix) FROM recettes")->fetch();
        echo('La recette totale est de: '.$sum[$cle]." Fcfa\n ");
         return RecetteResource::collection(Recette::all());
    }

    public function recetteByDate(Request $request) {

        $cle=0;
        $db_host = "localhost";
        $db_name = "foot";
        $db_user = "root";
        $db_pass = "";
        $db = new PDO("mysql:host=$db_host:3306;dbname=$db_name", $db_user, $db_pass);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sum=$db->query("SELECT SUM(Prix) FROM recettes where date='$request[Date]' ")->fetch();
        echo('La récette totale du '.$request['Date'] .' est de: '.$sum[$cle]." Fcfa\n ");
        return RecetteResource::collection(Recette::where("date", $request['Date'])->get());



    }
}
