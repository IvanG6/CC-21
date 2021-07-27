<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminPagesRequest;
use App\Services\Admin\AdminPagesService;
use Illuminate\Http\JsonResponse;

class AdminPagesController extends Controller
{
    private AdminPagesService $adminPagesService;

    public function __construct(AdminPagesService $adminPagesService)
    {
        $this->adminPagesService = $adminPagesService;
    }

    public function getPages(AdminPagesRequest $request): JsonResponse
    {
        $data = $this->adminPagesService->getPages($request->validated());

        return response()->json($data, 200);
    }
}
