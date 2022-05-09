<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Order;


class DashboardController extends Controller
{
    public function index()
    {
        $orders = Order::with(['client', 'products'])->get();

        return view('dashboard', ['orders' => $orders]);
    }
}
