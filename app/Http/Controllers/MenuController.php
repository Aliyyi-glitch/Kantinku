<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Stall;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus = Menu::with('stall')->get();
        return view('menus.index', compact('menus'));
    }

    public function create()
    {
        $stalls = Stall::all();
        return view('menus.create', compact('stalls'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'stall_id' => 'required',
            'nama_makanan' => 'required',
            'harga' => 'required|numeric',
        ]);

        Menu::create($request->all());

        return redirect()->route('menus.index')->with('success', 'Menu berhasil ditambahkan');
    }

    public function show(Menu $menu)
    {
        $menu->load('stall');
        return view('menus.show', compact('menu'));
    }

    public function edit(Menu $menu)
    {
        $stalls = Stall::all();
        return view('menus.edit', compact('menu','stalls'));
    }

    public function update(Request $request, Menu $menu)
    {
        $request->validate([
            'stall_id' => 'required',
            'nama_makanan' => 'required',
            'harga' => 'required|numeric',
            ]);
            $menu->update($request->all());
            return redirect()->route('menus.index')->with('success','Menu berhasil updated!');
    }

    public function destroy(Menu $menu)
    {
        $menu->delete();
        return redirect()->route('menus.index')->with('success','Menu berhasil destroyed!');
    }
}
