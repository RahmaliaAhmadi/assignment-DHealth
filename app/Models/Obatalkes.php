<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obatalkes extends Model
{
    protected $table = 'obatalkes_m';
    
    protected $primaryKey = 'obatalkes_id';

    protected $fillable = ['obatalkes_kode','obatalkes_nama','stok','additional_data',
                           'created_date','created_by','modified_count','last_modified_date',
                           'last_modified_by','is_deleted','is_active','deleted_date','deleted_by'];

    protected $dates = ['created_date', 'last_modified_date'];
    public $timestamps = false;
}
