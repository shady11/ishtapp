<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword, SearchableTrait;

    protected $connection = 'mysql';

    protected $table = 'users';

    protected $hidden = ['password', 'remember_token'];

    protected $guarded = ['id'];

    protected $searchable = [
        'columns' => [
            'name' => 10,
            'lastname' => 10,
            'login' => 10,
            'email' => 10,
        ],
    ];

    public function getFullName()
    {
        return $this->name.' '.$this->lastname;
    }

    public function getStatus()
    {
        if($this->active){
            $class = 'success';
            $status = 'активный';
        } else {
            $class = 'metal';
            $status = 'неактивный';
        }
        return '<span class="m-badge m-badge--'.$class.' m-badge--wide">'.$status.'</span>';
    }

    public function getCreatedDate()
    {
        return date('d-m-Y', strtotime($this->created_at));
    }

    public function getCreatedTime()
    {
        return date('H:i', strtotime($this->created_at));
    }

    //    Scopes
    public function scopePublished($query)
    {
        return $query->where('published', true);
    }
}
