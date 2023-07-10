<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use User;

class Applications extends Model
{
     use SoftDeletes;

	protected $table = 'applications';
	protected $primaryKey = 'id';
    protected $guarded = [];
    protected $fillable = [
        'serial_no',
        'rf_embassy',
        'submit_date',
        'invoice_date',
        'name',
        'old_mrp_no',
        'new_mrp_no',
        'enrollment_no',
        'mobile_no',
        'branch_id',
        'branch_name',
        'recept_no',
        'remarks',
        'status',
        'created_by',
        'updated_by'
    ];

    protected $dates = [
        'created_at', 'updated_at','deleted_at'
    ];

    public function branch(){
        return $this->belongsTo(Branch::class,'branch_id','id');
    }

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class,'created_by','id');
    }

    public function creator(){
        return $this->belongsTo(User::class,'created_by','id');
    }

    public function updator(){
        return $this->belongsTo(User::class,'updated_by','id');
    }

    // TODO :: boot
    // boot() function used to insert logged user_id at 'created_by' & 'updated_by'
    public static function boot(){
        parent::boot();
        static::creating(function($query){
            if(\Auth::check()){
                $query->created_by = @\Auth::user()->id;
            }
        });
        static::updating(function($query){
            if(\Auth::check()){
                $query->updated_by = @\Auth::user()->id;
            }
        });
    }
}
