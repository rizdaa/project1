<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Http\Request;

class Customer extends Authenticatable
{
	use Notifiable;
    protected $guarded = [];
    // protected $guarded = 'customers';
    // protected $tables = 'customers';

    // protected $fillable = [
    //     'name', 'email', 'password', 'phone_number', 'address', 'district_id'];

    public function setPasswordAttribute($value)
    {
        // $this->attributes['password'] = $value;
        // $value = Hash::make('password', [
        //     'rounds' => 12
        // ]);
        $this->attributes['password'] = bcrypt($value);
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }    
}
