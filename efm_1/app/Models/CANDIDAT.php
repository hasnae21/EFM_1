<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CANDIDAT extends Model
{
    protected $table = "c_a_n_d_i_d_a_t_s";
    protected $fillable = [
        "numero_dossier",
        "email",
        "idée",
        "status_idée"
    ];
    protected $primaryKey = 'numero_dossier';
}
