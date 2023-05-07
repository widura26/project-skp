<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\Multitenantable;

class Matriks extends Model
{
    use HasFactory;
    use Multitenantable;
    protected $guarded = ['id'];
    public function indikator(){
        return $this->hasMany(IndikatorKeberhasilan::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    // public function sasaranAtasan(){
    //     return $this->belongsToMany(Matriks::class, 'intervensi', 'id_matriks', 'id_intervensi');
    // }

    public function intervensi(){
        return $this->belongsToMany(Matriks::class, 'intervensi', 'id_intervensi', 'id_matriks');
    }

    // public function diintervensi(){
    //     return $this->belongsToMany(Matriks::class, 'intervensi', 'sasaranAtasan_id','matriks_id');
    // }

    public function sasaranAtasan(){
        return $this->belongsTo(Matriks::class);
    }
    
}
