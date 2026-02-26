<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::where('status', 1)->orderBy('id', 'desc')->get();
        return view('menu.index', compact('menus'));
    }

    public function create()
    {
        return view('menu.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $data['tanggal_input'] = now();
        $data['status'] = 1;

        $lastId = Menu::create($data);

        return redirect()->route('menu.index')
            ->with('success', 'Daftar menu berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $menu = Menu::findOrFail($id);
        return view('menu.edit', compact('menu'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();

        $data['tanggal_update'] = now();
        $data['status'] = 1;

        $menu = Menu::findOrFail($id);
        $menu->update($data);

        return redirect()->route('menu.index')
            ->with('success', 'Daftar menu berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $menu = Menu::findOrFail($id);
        $menu->status = 9;
        $menu->save();

        return redirect()->route('menu.index')
            ->with('success', 'Menu berhasil dihapus.');
    }
}
