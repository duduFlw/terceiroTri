<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model implements Authenticatable
{
    use HasFactory;


    protected $hidden = [
        'password',
    ];
    
    public function getAuthIdentifierName()
    {
        return 'id';
    }

    public function getAuthIdentifier()
    {
        return $this->id;
    }
    public function getAuthPassword()
    {
        return $this ->password;
    }

    public function getRememberToken(){

        return $this ->remember;

    }
    public function setRememberToken($value){

    }
    public function getRememberTokenName(){
        return $this ->remember;
    }
    public $timestamps = false;
}
    
