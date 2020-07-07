<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Model\UserProfileModel;

class UserModel extends Model
{
    protected $table        =   'user';
    protected $primaryKey   =   'id';
    use SoftDeletes;


    public function userdetails(){
        
        return $this->hasOne(UserProfileModel::class, 'user_id');
    
    }


}
