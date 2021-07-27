<?php


namespace App\Contracts\Admin;


use App\Models\Page;
use Illuminate\Database\Eloquent\Collection;

interface AdminPagesServiceContract
{
    public function getPages(array $data): Page;
}
