<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\OrderProduct;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        return Order::all();
    }

    public function create()
    {
        return view('orders.create')->with('products', Product::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'client_id' => 'required',
            'products' => 'required',
        ]);

        $order = Order::create($request->all());

        for($i = 0; $i < count($order->products); $i++) {
            OrderProduct::create([
                'order_id' => $order->id,
                'product_id' => $order->products[$i],
            ]);
        }

        return $order;
    }

    public function show($id)
    {
        return Order::find($id);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'client_id' => 'required',
            'products' => 'required',
        ]);

        $order = Order::find($id);

        //lógica de atualizar a tabela order_products
        //1. checar quais produtos foram removidos/adicionados
        //2. remover produtos
        //3. adicionar produtos

        $order->update($request->all());
    }

    public function destroy($id)
    {
        $order = Order::find($id);

        $order->delete();

        return redirect('/dashboard')->with('success', 'Order deleted successfully');
    }
}
