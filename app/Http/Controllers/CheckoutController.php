<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\transaksi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Midtrans\Config;
use Midtrans\Snap;

class CheckoutController extends Controller
{
    public function index()
    {
        // ambil customer yg sedang login
        $customerId = auth('customer')->id();

        // ambil semua item di cart yg punya customer ini
        $cartItems = Cart::with('product')
            ->where('customer_id', $customerId)
            ->get();

        // hitung total harga
        $total = $cartItems->sum('subtotal');

        // kirim ke view
        return view('checkout.index', compact('cartItems', 'total'));
    }

    public function process(Request $request)
    {
        // Validasi
        $request->validate([
            'address' => 'required',
            'payment_method' => 'required'
        ]);

        $customerId = auth('customer')->id();
        $customer  = Customer::find($customerId);
        // dd($customer);

        // ambil cart
        $cartItems = Cart::with('product')
            ->where('customer_id', $customerId)
            ->get();

        if ($cartItems->isEmpty()) {
            return redirect()->back()->with('error', 'Keranjang masih kosong!');
        }

        // hitung total
        $total = $cartItems->sum('subtotal');

        // generate invoice code
        $invoice = 'INV-' . strtoupper(Str::random(10));

        // simpan order
        $order = Order::create([
            'customer_id' => $customerId,
            'invoice' => $invoice,
            'address' => $request->address,
            'payment_method' => $request->payment_method,
            'total_price' => $total,
            'status' => 'processing'
        ]);

        foreach ($cartItems as $cart) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $cart->product_id,
                'quantity' => $cart->quantity,
                'price' => $cart->product->price,
                'subtotal' => $cart->subtotal,
            ]);
        }

        if ($request->payment_method == 'transfer') {
            Config::$serverKey = config('midtrans.serverKey');
            Config::$isProduction = config('midtrans.isProduction');
            Config::$isSanitized = true;
            Config::$is3ds = true;
            $payload = [
                'transaction_details' => [
                    'order_id' => 'Produk' . '-' . $order->id . '-' . time(),
                    'gross_amount' => $total,
                ],
                'customer_details' => [
                    'name' => $customer->nama ?? 'nama tidak diketahui ',
                    'phone' => $order->nomer,
                    'email' => $customer->email ?? 'customer@mail.com',
                    // 'first_name' => $pendaftaran->nama_anak ?? 'nama tidak diketahui ',
                    // 'email'      => 'noemail@exemple.com',
                    // 'phone'      => $pendaftaran->no_whatsapp,
                    'billing_address' => [
                        'address' => $request->address,
                    ],
                ],
                'item_details' => [],
            ];

            foreach ($cartItems as $id => $item) {
                $payload['item_details'][] = [
                    'id' => $id,
                    'price' => $item->product->price,
                    'quantity' => $item->quantity,
                    'name' => 'Product-' . $item->product_id, // Bisa diganti dengan nama produk
                ];
            }
            $snapToken = Snap::getSnapToken($payload);
            // $transaksi = new transaksi;
            transaksi::create([
                'customer_id' => $customerId,
                'order_id' => $order->id,
                'status' => 'menunggu',
                'snap_token' => $snapToken,
            ]);
            // $transaksi->user_id = $customerId;
            // $transaksi->order_id = $order->id;
            // // $transaksi->mode = $request->mode;
            // $transaksi->status = 'menunggu';
            // $transaksi->snap_token = $snapToken;
            // $transaksi->save();
            Cart::where('customer_id', $customerId)->delete();
            return view('checkout.index', compact('snapToken', 'cartItems', 'total'));
            // $transaksi->order_id = 
        }

        
        transaksi::create([
                'customer_id' => $customerId,
                'order_id' => $order->id,
                'status' => 'menunggu',
                'snap_token' => null,
            ]);

        // kosongkan cart customer
        Cart::where('customer_id', $customerId)->delete();

        return redirect()->route('order.success')
            ->with('success', 'Pesanan berhasil dibuat!');
    }
}
