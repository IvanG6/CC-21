<?php


namespace App\Contracts\Coach\Services\Authentication;


use Illuminate\Database\Eloquent\Model;

interface AuthenticationServiceContract
{
    public function login(array $data): Model;

    public function registrationValidation(array $data): array;

    public function registration(array $data): Model;
}
