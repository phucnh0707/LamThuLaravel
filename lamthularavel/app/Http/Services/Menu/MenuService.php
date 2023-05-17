<?php

namespace App\Http\Services\Menu;
use Illuminate\Support\Str;
use App\Models\Menu;
use Illuminate\Contracts\Session\Session;

class MenuService
{
    public function create($request)
    {
        try {
            Menu::create([
                'title'=>(string) $request->input('name'),
                'parent_id'=>(string) $request->input('parent_id'),
                'description'=>(string) $request->input('description'),
                'content'=>(string) $request->input('content'),
                'active'=>(string) $request->input('active'),
                'slug' =>Str::slug($request->input('name'), '-')
            ]);
            Session::flash('success','Tạo thành công');
        } catch (\Exception $err) {
            Session::flash('error',$err->getMessage());
        }
    }
}
