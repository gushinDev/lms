<?php

namespace App\Http\Controllers;

use App\Models\NavigationBar;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

class AdminNavigation extends Controller
{
    protected Collection $navigationMenu;
    public function __construct()
    {
        $this->navigationMenu = collect(Cache::get('navigation:bar'))->sortBy('order_number');
    }
    public function index(): View
    {
        return view('admin.index', [
            'navigationMenu' => $this->navigationMenu
        ]);
    }

    public function delete(Request $request)
    {
        NavigationBar::query()->where('navigation_bar_id', $request->get('menu_item'))->delete();
        return redirect()->to('navigation');
    }
}
