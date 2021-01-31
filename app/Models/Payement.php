<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Payement extends Model
{
    use HasFactory,Notifiable;

    protected $filiable=[
        'id_session',
        'id_stagiaire',
        'date_payement',
        'montant'
    ];
}
