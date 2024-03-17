<?php

namespace App\Http\Controllers\Reseller;

use App\Enums\OrderStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\Order\OrderStoreRequest;
use App\Models\Category;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Product;
use App\Models\Unit;
use App\Models\Color;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ResellerController extends Controller
{
    public function dashboard($slug = null)
    {
        $categoryTitle = '';
        if ($slug !== null) {
            $category = Category::where('slug', $slug)->firstOrFail();
            $categoryTitle = $category->name;
            $products = $category->products;
        } else {
            $products = Product::with(['category', 'unit'])->get();
        }

        $categories = Category::all(['id', 'name', 'slug']);
        $carts = Cart::content();

        return view('reseller.dashboard', [
            'categoryTitle' => $categoryTitle,
            'categories' => $categories,
            'products' => $products,
            'carts' => $carts,
        ]);
    }

    public function product($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        $units = Unit::all();
        $colors = Color::all();

        return view('reseller.product', [
            'categories' => Category::all(),
            'product' => $product,
            'units' => $units,
            'colors' => $colors,
        ]);
    }

    public function cart()
    {
        $products = Product::with(['category', 'unit'])->get();

        $users = User::all(['id', 'name']);

        $carts = Cart::content();

        return view('reseller.cart', [
            'products' => $products,
            'users' => $users,
            'carts' => $carts,
        ]);
    }

    public function store(OrderStoreRequest $request)
    {
        $order = Order::create($request->all());

        // Create Order Details
        $contents = Cart::content();
        $oDetails = [];

        foreach ($contents as $content) {
            $oDetails['order_id'] = $order['id'];
            $oDetails['product_id'] = $content->id;
            $oDetails['quantity'] = $content->qty;
            $oDetails['unitcost'] = $content->price;
            $oDetails['total'] = $content->subtotal;
            $oDetails['created_at'] = Carbon::now();
            OrderDetails::create($oDetails);
        }

        // Delete Cart Sopping History
        Cart::destroy();

        return redirect()
            ->route('orders.index')
            ->with('success', 'Order has been created!');
    }

    public function show(Order $order)
    {
        $order->loadMissing(['user', 'details'])->get();

        return view('orders.show', [
            'order' => $order
        ]);
    }

    public function update(Order $order, Request $request)
    {
        // TODO refactoring

        // Reduce the stock
        $ods = $order->details;
        foreach ($ods as $od) {
            $product = Product::where('id', $od->product_id)->firstOrFail();

            $product->updateInventory($od->quantity);
        }

        $order->update([
            'order_status' => OrderStatus::COMPLETE
        ]);

        return redirect()
            ->route('orders.complete')
            ->with('success', 'Order has been completed!');
    }

    public function destroy(Order $order)
    {
        $order->delete();
    }

    public function downloadInvoice($order)
    {
        // TODO: Need refactor
        //dd($order);

        //$order = Order::with('user')->where('id', $order_id)->first();
        $order = Order::with(['user', 'details'])
            ->where('id', $order)
            ->first();

        return view('orders.print-invoice', [
            'order' => $order,
        ]);
    }
}
