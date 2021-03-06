<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Address;
use Auth;
use App\Cart;
use App\Status;
use App\Services\CartService;
use Stripe\Stripe;



class OrdersController extends Controller
{

   public function __construct()
    {
        $this->middleware('auth')->except('store');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Order $order)
    {
        // display all orders of a user
        $orders = Order::where('user_id', '=', auth()->id())
            /*->join('statuses', 'orders.status_id'  , '=', 'statuses.id')*/
            ->orderBy('created_at', 'desc')
            ->get();
       // dd($orders);

        return view('orders.index', compact('orders'));

    }

    /**
     * Display a listing of the resource for the admin area.
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_index(Order $order)
    {
        // display all orders of a user
        $orders = Order::with('status', 'addresses')->get()
            ->sortByDesc('created_at');
        //var_dump($orders);
        //dd($orders);

        return view('admin.orders.index', compact('orders'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Order $order)
    {

        $this->validate(request(), [
            'email' => 'required|email',
            'first_name' => 'required|min:2',
            'last_name' => 'required|min:2',
            'street' => 'required|min:2',
            'city' => 'required|min:2',
            'state' => 'required|min:2',
            'zip_code' => 'required|numeric|min:5',
            'phone' => 'required|numeric|min:2',
            'bill_first_name' => 'sometimes|required|min:2',
            'bill_last_name' => 'sometimes|required|min:2',
            'bill_street' => 'sometimes|required|min:2',
            'bill_city' => 'sometimes|required|min:2',
            'bill_state' => 'sometimes|required|min:2',
            'bill_zip_code' => 'sometimes|required|numeric|min:5',
            'bill_phone' => 'sometimes|required|numeric|min:2',
        ]);

        // Set the $user_id the the currently authenticated user
        if (Auth::check()){
            $user_id = auth()->id();
        }
        else{
            $user_id = 0;
        }

        // find cart_id
        $cart_id = request()->cookie('cart_id');

        if(request('has_billing_address') == 0) {
            $has_billing_address = 0;
        }
        else {
            $has_billing_address = 1;
        }

        $cartService = new cartService();
        $total = $cartService->get_total_cart() + request('shipping_method');
        $total = number_format($total, 2);
        $charge_amount = number_format($total, 2) * 100;


        // set payment here
        $token = request('stripeToken');

        // Set your API key
        Stripe::setApiKey(env('STRIPE_SECRET'));

        try {
            $charge = \Stripe\Charge::create([
                'amount' => $charge_amount, // this is in cents
                'currency' => 'usd',
                'card' => $token,
                'description' => 'Order on Marco.tk',
                'metadata' => [
                    'customer_first_name' => request('first_name'),
                    'customer_last_name' => request('last_name'),
                    'customer_email' => request('email'),
                    'customer_id' => $user_id,
                ]
            ]);
        } catch(\Stripe\Error\Card $e) {
            // Declined. Don't process their purchase.
            // Go back, and tell the user to try a new card
            return redirect()->back()
                ->withErrors($e->getMessage())
                ->withInput();
        }

        $lastOrderId = Order::create([
            'user_id' => $user_id,
            'cart_id' => $cart_id,
            'email' => request('email'),
            'has_billing_address' => $has_billing_address,
            'subtotal' => $cartService->get_total_cart(),
            'shipping_cost' => request('shipping_method'),
            'total' => $total,
            'status_id' => 1,
            'note' => request('note'),
            'transaction_id' => $charge->id
        ])->id;

        Address::create([
            'id_type_address' => 1,
            'user_id' => $user_id,
            'order_id' => $lastOrderId,
            'first_name' => request('first_name'),
            'last_name' => request('last_name'),
            'street' => request('street'),
            'apartment' => request('apartment'),
            'city' => request('city'),
            'state' => request('state'),
            'zip_code' => request('zip_code'),
            'phone' => request('phone'),
        ]);
        //dd(request()->all());

        if (!request()->has('has_billing_address')) {

            Address::create([
                'id_type_address' => 1,
                'user_id' => $user_id,
                'order_id' => $lastOrderId,
                'first_name' => request('bill_first_name'),
                'last_name' => request('bill_last_name'),
                'street' => request('bill_street'),
                'apartment' => request('bill_apartment'),
                'city' => request('bill_city'),
                'state' => request('bill_state'),
                'zip_code' => request('bill_zip_code'),
                'phone' => request('bill_phone'),
            ]);

        }

        //  addProductFromCart(); // Attach all cart items to the pivot table with their fields
        $cart_products = Cart::with('product')->where('cart_id', '=', $cart_id)->get();
        foreach ($cart_products as $order_products) {

            $order->orderItems()->attach($order_products->product_id, array(
                'order_id' => $lastOrderId,
                'size_id' => $order_products->size_id,
                'qty'    => $order_products->qty,
                'price'  => $order_products->product->price,
                'discount'  => $order_products->product->custom_discount,
                'sub_total'  => ($order_products->product->price - ($order_products->product->price/100*$order_products->product->custom_discount))*$order_products->qty
            ));
//'sub_total'  => ($40.07 - 6,0105)*2
        }

        // Delete all the items in the cart after transaction successful
        Cart::where('cart_id', '=', $cart_id)->delete();

return 'Bravo!';


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $userId = auth()->id();
        $order = Order::where(function($q) use ($id, $userId) {
            $q->where('user_id', '=', $userId);
            $q->where('id', '=', $id);
        })
        ->with('addresses', 'orderItems')
        ->firstOrFail();

        return view('orders.show', compact('order'));

    }


    /**
     * Display the specified resource for admin area.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function admin_show($id)
    {

        $order = Order::where('id', '=', $id)
            ->with('addresses', 'orderItems', 'status')
            ->firstOrFail();

        $allStatuses = Status::pluck('status_name', 'id');

        return view('admin.orders.show', compact('order', 'allStatuses'));

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }



}
