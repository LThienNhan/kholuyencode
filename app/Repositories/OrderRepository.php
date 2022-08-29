<?php

namespace App\Repositories;

use Cart;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;
use App\Contracts\OrderContract;

class OrderRepository extends BaseRepository implements OrderContract
{
    public function __construct(Order $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    public function storeOrderDetails($params)
    {
        $items = Cart::getContent();
        $quantity = 0;
        foreach ($items as $item) {
           $quantity += $item->quantity;
        }
        if (isset($params['payment_method_cod'])) {
            $payment_status = 'Delivery';
            $payment_method = $params['payment_method_cod'];
            $card_number = null;
        } elseif($params['payment_method_bank'] != 'null') {
            $payment_status = 'Complete';
            $payment_method = $params['payment_method_bank'];
            $card_number = $params['card_number'];
        } 
        $order = Order::create([
            'order_number'      =>  'ORD-'.strtoupper(uniqid()),
            'user_id'           => auth()->user()->id,
            'status'            =>  'pending',
            'grand_total'       =>  Cart::getSubTotal(),
            'item_count'        =>  $quantity,
            'payment_status'    =>  $payment_status,
            'payment_method'    =>  $payment_method,
            'card_number'       =>  $card_number,
            'first_name'        =>  $params['first_name'],
            'last_name'         =>  $params['last_name'],
            'address'           =>  $params['address'],
            'city'              =>  $params['city'],
            'country'           =>  $params['country'],
            'post_code'         =>  $params['post_code'],
            'phone_number'      =>  $params['phone_number'],
            'notes'             =>  $params['notes']
        ]);
        if ($order) {
            $items = Cart::getContent();
            foreach ($items as $item) {
                // A better way will be to bring the product id with the cart items
                // you can explore the package documentation to send product id with the cart
                $product = Product::where('name', $item->name)->first();
                $orderItem = new OrderItem([
                    'product_id'    =>  $product->id,
                    'quantity'      =>  $item->quantity,
                    'price'         =>  $item->getPriceSum()
                ]);
                $order->items()->save($orderItem);
            }
        }
        Cart::clear();
        return $order;
    }

    public function storeOrderDetailsDB($params)
    {
        if (isset($params['payment_method_cod'])) {
            $payment_status = 'Delivery';
            $payment_method = $params['payment_method_cod'];
            $card_number = null;
        } elseif($params['payment_method_bank'] != 'null') {
            $payment_status = 'Complete';
            $payment_method = $params['payment_method_bank'];
            $card_number = $params['card_number'];
        } 
        $order = Order::create([
            'order_number'      =>  'ORD-'.strtoupper(uniqid()),
            'user_id'           => auth()->user()->id,
            'status'            =>  'pending',
            'grand_total'       =>  $params['total'],
            'item_count'        =>  $params['quantity'],
            'payment_status'    =>  $payment_status,
            'payment_method'    =>  $payment_method,
            'card_number'       =>  $card_number,
            'first_name'        =>  $params['first_name'],
            'last_name'         =>  $params['last_name'],
            'address'           =>  $params['address'],
            'city'              =>  $params['city'],
            'country'           =>  $params['country'],
            'post_code'         =>  $params['post_code'],
            'phone_number'      =>  $params['phone_number'],
            'notes'             =>  $params['notes']
        ]);
        if ($order) {
            $id =auth()->user()->id;
            $items = CartItem::select()->where('user_id', $id)->get();
            foreach ($items as $item) {
                // A better way will be to bring the product id with the cart items
                // you can explore the package documentation to send product id with the cart
                $product = Product::where('name', $item->name)->first();
                $orderItem = new OrderItem([
                    'product_id'    =>  $product->id,
                    'quantity'      =>  $item->quantity,
                    'price'         =>  $item->price,
                ]);
                $order->items()->save($orderItem);
            } 
        }   
        CartItem::select()->where('user_id', $id)->delete();
        return $order;
    }

    public function listOrders(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all($columns, $order, $sort);
    }

    public function findOrderByNumber($orderNumber)
    {
        return Order::where('order_number', $orderNumber)->first();
    }
}
