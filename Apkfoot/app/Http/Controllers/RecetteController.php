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
        /*$db_host = "localhost";
        $db_name = "foot";
        $db_user = "root";
        $db_pass = "";
        $db = new PDO("mysql:host=$db_host:3306;dbname=$db_name", $db_user, $db_pass);
        /*$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sumByDate=$db->query("SELECT SUM(Prix) FROM recettes WHERE date=$request");
        $sum=$sumByDate->fetch();
        var_dump($sumByDate);*/
        /*$prix = $db->query("SELECT SUM(Prix) FROM recettes WHERE date=$request"/*DB::table('recettes')->where('Prix','>', 0)->value('Prix'));
            $prix->num_rows;
            while($row=$db_prix->fetch_assoc()){
                $result= $row['Prix'] ;
                echo($result."\n");
            }
            $db_result->free() ;
                    chercher pourquoi cela affiche 10k,
                    et voir si c'est possible d'afficher
                    d'autre prix et la somme de ces prix*/

        return RecetteResource::collection(Recette::where("date", $request['Date'])->get());



    }
}
