<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Model\UserModel;

class UserProfileModel extends Model
{
    protected $table        =   'user_profile';
    protected $primaryKey   =   'id';
    use SoftDeletes;

}
