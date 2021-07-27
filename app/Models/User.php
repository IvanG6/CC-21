<?php

namespace App\Models;

use App\Contracts\Common\Models\Code\CodeableContract;
use App\Contracts\Common\Models\Order\OrderableContract;
use App\Contracts\Common\Models\Payment\PaymentableContract;
use App\Traits\Common\Models\Code\Codeable;
use App\Traits\Common\Models\User\Userable;
use App\Traits\Order\Models\Orderable;
use App\Traits\Payment\Models\Paymentable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements CodeableContract, OrderableContract, PaymentableContract
{
    use HasFactory;
    use Notifiable;
    use HasApiTokens;
    use Codeable;
    use Orderable;
    use Paymentable;
    use Userable;
    use SoftDeletes;
    use HasRoles;

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
        'currency_id',
        'timezone_id',
        'deleted_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];
}
