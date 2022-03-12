<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransPrescriptions extends Model
{
    protected $table = 'trans_prescriptions';
    
    protected $fillable = ['user_id','obat_id','signa_m_id','type','name','qty'];

    protected $dates = ['created_at', 'updated_at'];

    public function obat(){
        return $this->belongsTo(Obatalkes::class, 'obat_id', 'obatalkes_id');
    }

    public function signa(){
        return $this->belongsTo(Signa::class, 'signa_m_id', 'signa_id');
    }
}
