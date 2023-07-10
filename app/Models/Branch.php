<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Branch extends Model
{
    use HasFactory, SoftDeletes;

    protected $table="branch";

    protected $fillable = [
        'name',
        'remark',
    ];

    public function applications(){
        return $this->hasMany(Applications::class,'branch_id','id');
    }
}
