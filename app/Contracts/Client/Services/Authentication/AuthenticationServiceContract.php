<?php

namespace App\Contracts\Client\Services\Authentication;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

interface AuthenticationServiceContract
{
    public function login(array $data): Model;
}
