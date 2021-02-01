<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class Categorie extends Model
{
    use HasFactory,Notifiable;
    protected $fillable = [
        'id_stagiaire',
        'nomCategorie',
        'description',
    ];
}
