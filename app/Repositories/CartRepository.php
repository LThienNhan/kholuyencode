<?php

namespace App\Repositories;

use App\Models\Product;
use App\Models\Carts;
use App\Models\CartItem;
use App\Contracts\CartContract;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;
use Cart;
use Auth;
/**
 * Class ProductRepository
 *
 * @package \App\Repositories
 */
class CartRepository extends BaseRepository implements CartContract
{
   
    /**
     * ProductRepository constructor.
     * @param Product $model
     */
    public function __construct(Product $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    /**
     * @param int $id
     * @return mixed
     * @throws ModelNotFoundException
     */


    public function findProductById(int $id)
    {
        try {
            return $this->findOneOrFail($id);

        } catch (ModelNotFoundException $e) {

            throw new ModelNotFoundException($e);
        }

    }

    public function storeCartDetails($params)
    {   
        $total = 0 ;
        $qty = $params['qty'];
        $price = $params['price'];
        $total = $qty * $price;
        $cart = CartItem::create([
            'cart_id'         =>'0',
            'user_id'         => auth()->user()->id,
            'product_id'      => $params['productId'],
            'name'            => $params['name'],
            'quantity'        => $params['qty'],
            'price'           => $params['price'],
            'grand_total'     => $total,
            'color'           =>'Trắng',
        ]);
        return $cart;
    }

    public function updateSession($params, $id)
    {
        foreach (Cart::getContent() as $item) {
            if ($item -> id == $id) {
                Cart::update($item -> id, [$item-> quantity = $params['qty']]);
            }
        }
        return;
    }

    public function updateDatabase($params, $id)
    {
        $price = CartItem::select('price')->where('id', $id)->get();
        $price = $price ->implode('price', ', ');
        $grand_total=0;
        $grand_total =$params['qty'] * $price;
        $data = CartItem::find($id);
        $data->grand_total = $grand_total; 
        $data->quantity = $params['qty']; 
        $data->save();
        return;
    }

    public function clearCartDatabase()
    {
        $id = Auth::user()->id;
        CartItem::select()->where('user_id',$id)->delete();
        return;
    }


  
}
