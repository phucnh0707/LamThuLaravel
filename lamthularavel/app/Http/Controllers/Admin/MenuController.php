<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Menu\CreateFormRequest;
use Illuminate\Http\Request;
use App\Http\Services\Menu\MenuService;

class MenuController extends Controller
{
    protected $menuService;
    public function _construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
    }
    public function create()
    {
        return view('admin.menu.add', [
            'title' => 'Thêm Danh Mục Mới'
        ]);
    }

    public function store(CreateFormRequest $request)
    {
        $result = $this->menuService->create($request);
    }
}
