<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Company;
class Employee extends Model
{
    protected $table='employees';
    protected $primaryKey = 'emp_id';


    protected $guarded=[];
    public function company()
    {
        return $this->belongsTo(Company::class,'comp_id')->withDefault([
            'comp_name' => '---',
        ]);
    }
}
