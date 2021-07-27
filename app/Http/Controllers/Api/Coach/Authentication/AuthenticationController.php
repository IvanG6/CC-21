<?php

namespace App\Http\Controllers\Api\Coach\Authentication;

use App\Contracts\Coach\Services\Authentication\AuthenticationServiceContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\Coach\Authentication\LoginRequest;
use App\Http\Requests\Coach\Authentication\RegisterRequest;
use App\Http\Resources\Coach\CoachResource;
use App\Services\Coach\Authentication\AuthenticationService;
use Illuminate\Http\JsonResponse;

class AuthenticationController extends Controller
{
    /** @var AuthenticationService */
    protected AuthenticationServiceContract $service;

    public function __construct(AuthenticationServiceContract $service)
    {
        $this->service = $service;
    }

    public function login(LoginRequest $request): CoachResource
    {
        return new CoachResource($this->service->login($request->validated()));
    }

    public function register(RegisterRequest $request): JsonResponse
    {
        $data = $this->service->registrationValidation($request->validated());
        return response()->json($data, 200);
    }

    public function registerStepTwo(RegisterRequest $request): CoachResource
    {
        return new CoachResource($this->service->registration($request->validated()));
    }
}
