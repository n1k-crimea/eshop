<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        return view('admin.home ');
    }

    public function categories()
    {
        return view('admin.categories');
    }

    public function products()
    {
        return view('admin.products');
    }
}
