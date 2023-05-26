<?php

namespace App\Http\Controllers;

use App\Models\NavigationBar;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AdminNavigation extends Controller
{
    public function index(): View
    {
        return view('admin.users.index');
    }

    public function delete(Request $request): RedirectResponse
    {
        NavigationBar::query()->where('navigation_bar_id', $request->get('menu_item'))->delete();
        return redirect()->to('navigation');
    }
}
