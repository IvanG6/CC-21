<?php


namespace App\Services\Admin;


use App\Contracts\Admin\AdminPagesServiceContract;
use App\Models\Page;
use Illuminate\Database\Eloquent\Collection;

class AdminPagesService implements AdminPagesServiceContract
{
    /**
     * @param array $data
     * @return Page
     */
    public function getPages(array $data): Page
    {
        $page = Page::where('slug', $data['slug'])->first();

        return $page;
    }
}
