<?php

namespace App\Models\Users;



use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasRoles, Notifiable;

    protected $guard_name = 'api';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
            'first_name',
            'last_name',
            'email',
            'password',
            'password_changed_at',
            'confirmation_code',
            'email_verified_at',
            'timezone',
            'confirmed',
            'online',
            'active',
            'last_login_at',
            'last_login_ip',
    ];
        // protected $guard_name = 'api';

        protected $hidden = ['password', 'remember_token'];

        protected $dates = ['last_login_at', 'deleted_at'];

        protected $appends = ['full_name'];

        protected $casts = [
            'active'    => 'boolean',
            'confirmed' => 'boolean',
            'online'    => 'boolean',
            'email_verified_at' => 'datetime',
        ];

        public function getFullNameAttribute()
        {
            return $this->last_name ? $this->first_name . ' ' . $this->last_name : $this->first_name;
        }


        public function getNameAttribute()
        {
            return $this->full_name;
        }

}
