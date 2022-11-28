<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entry_detail extends Model
{
    protected $table = "entries_details";
    use HasFactory;

    public function entrie(){
        return $this->belongsTo(Entrie::class,'entrie_id'); 
    }
    public function product(){
        return $this->belongsTo(product::class,'product_id'); 
    }
    public function employe(){
        return $this->belongsTo(Employee::class,'employee_id'); 
    }
}
