<?php

namespace App\Http\Controllers\Api\Client\Authentication;

use App\Contracts\Client\Services\Authentication\AuthenticationServiceContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\Client\Authentication\LoginRequest;
use App\Http\Resources\Client\ClientResource;
use App\Services\Client\Authentication\AuthenticationService;

class AuthenticationController extends Controller
{
    /** @var AuthenticationService */
    protected AuthenticationServiceContract $service;

    public function __construct(AuthenticationServiceContract $service)
    {
        $this->service = $service;
    }

    public function login(LoginRequest $request): ClientResource
    {
        return new ClientResource($this->service->login($request->validated()));
    }
}
