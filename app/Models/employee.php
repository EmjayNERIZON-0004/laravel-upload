<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class employee extends Model
{
    protected $table = 'employees'; // Define the table name

    protected $fillable = [
        'employee_Id',
        'fname',
        'mname',
        'lname',
        'address',
        'email',
        'image_path',
        'contact',
    ];
    public function userAccount()
    {
        return $this->hasOne(UserAccount::class, 'useraccount_id', 'id');
    }
}
