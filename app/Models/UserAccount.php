<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserAccount extends Model
{
  
        protected $fillable = ['username','useraccount_id', 'password', 'default_password','status'];
        public function employee()
    {
        return $this->belongsTo(Employee::class, 'useraccount_id', 'id');
    }
}
