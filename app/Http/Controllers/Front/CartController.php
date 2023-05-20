<?php

namespace App\Http\Controllers\Front;

use App\Model\Admin\Banner;
use App\Model\Admin\Order;
use App\Model\Admin\OrderDetail;
use App\Model\Admin\Product;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Jenssegers\Agent\Agent;


class CartController extends Controller
{
    protected $view;

    public function __construct(Agent $agent)
    {
        $this->view = 'front2';
        if ($agent->isMobile()) {
            $this->view .= '.mobiles';
        }
    }

    public function index()
    {
        $cartCollection = \Cart::getContent();
        $total = \Cart::getTotal();
        // cho mobile
        $bannersRight = Banner::query()->where(['position' => 'right'])->latest()->take(3)->get();

        return view($this->view.'.cart', compact('cartCollection', 'total', 'bannersRight'));
    }

    public function addItem(Request $request, $productId)
    {
        $product = Product::query()->find($productId);

        \Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => 1,
            'attributes' => [
                'image' => $product->image->path ?? ''
            ]
        ]);

        return \Response::json(['success' => true]);
    }

    public function updateItem(Request $request)
    {
        \Cart::update($request->product_id, array(
            'quantity' => array(
                'relative' => false,
                'value' => $request->qty
            ),
        ));

        return \Response::json(['success' => true, 'items' => \Cart::getContent(), 'total' => \Cart::getTotal()]);

    }

    public function removeItem(Request $request)
    {
        \Cart::remove($request->product_id);

        return \Response::json(['success' => true, 'items' => \Cart::getContent(), 'total' => \Cart::getTotal()]);
    }

    public function checkout(Request $request)
    {
        $translate = [
            'customer_name.required' => 'Vui lòng nhập họ tên',
            'customer_phone.required' => 'Vui lòng nhập số điện thoại',
            'customer_address.required' => 'Vui lòng nhập địa chỉ',
            'payment_method.required' => 'Vui lòng chọn phương thức thanh toán',
        ];

        $validate = Validator::make(
            $request->all(),
            [
                'customer_name' => 'required',
                'customer_phone' => 'required',
                'customer_address' => 'required',
                'payment_method' => 'required',
            ],
            $translate
        );
        $json = new \stdClass();

        if ($validate->fails()) {
            $json->success = false;
            $json->errors = $validate->errors();
            $json->message = "Thao tác thất bại!";
            return Response::json($json);
        }

        $lastId = Order::query()->latest('id')->first()->id ?? 1;

        $order = Order::query()->create([
            'customer_name' => $request->customer_name,
            'customer_phone' => $request->customer_phone,
            'customer_email' => $request->customer_email,
            'customer_address' => $request->customer_address,
            'customer_required' => $request->customer_required,
            'payment_method' => $request->payment_method,
            'code' => 'ORDER' . date('Ymd') . '-' . $lastId
        ]);

        foreach ($request->items as $item) {
            $detail = new OrderDetail();
            $detail->order_id = $order->id;
            $detail->product_id = $item['id'];
            $detail->qty = $item['quantity'];
            $detail->price = $item['price'];

            $detail->save();
        }

        \Cart::clear();

        return Response::json(['success' => true, 'order_code' => $order->code]);
    }

    public function checkoutSuccess(Request $request)
    {
        $order = Order::query()->where('code', $request->code)->first();

        if ($order) {
            return view('front2.checkout_success');
        }

        return redirect()->route('homePage');
    }

}
