<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $content=Cart::instance('default')->count()>0?Cart::instance('default')->content()->map(function ($item){
            return [
              'name'=>$item->model->name,
              'description'=>$item->model->description,
              'price'=>$item->price,
              'rowId'=>$item->rowId,
              'image'=>$item->model->image,
            ];
        }):[];
         $saveForLater=Cart::instance('saveForLater')->count()>0?Cart::instance('saveForLater')->content()->map(function ($item){
             return [
                 'name'=>$item->model->name,
                 'description'=>$item->model->description,
                 'price'=>$item->price,
                 'rowId'=>$item->rowId,
                 'image'=>$item->model->image,
             ];
         }):[];

        return inertia('Cart/Index',[
            'products' => Product::mightAlsoLike()->get(),
            'default'=>[
                'content'=>$content,
                'total'=>Cart::instance('default')->total(),
                'subtotal'=>Cart::instance('default')->subtotal(),
                'tax'=>Cart::instance('default')->tax(),
            ],
            'saveForLater'=>[
                'content'=>$saveForLater,
                'total'=>Cart::instance('saveForLater')->total(),
                'subtotal'=>Cart::instance('saveForLater')->subtotal(),
                'tax'=>Cart::instance('saveForLater')->tax(),
            ],

        ]);
    }


    /**s
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
    public function store(Request $request)
    {
        $product=$request->product;
        $isDuplicate= Cart::instance('default')->content()->search(function ($cartItem, $rowId)  use ($product){
            return $cartItem->id === $product['id'];
        });
        if($isDuplicate){
            return back()->with('error',"item already in your cart");
        }else{
            Cart::instance('default')->add($product['id'], $product['name'], 1, $product['price'])->associate('App\Models\Product');
            return redirect(route('cart.index'))->with('success',"item added successfuly in your cart");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $product=Cart::instance('default')->content()[$id]->toArray();
        $isDuplicate= Cart::instance('saveForLater')->content()->search(function ($cartItem, $rowId)  use ($product){
            return $cartItem->id === $product['id'];
        });
        if($isDuplicate){
            return back()->with('error',"item already in your saved for later cart");
        }else{
            Cart::instance('saveForLater')->add($product['id'], $product['name'], 1, $product['price'])->associate('App\Models\Product');
            Cart::instance('default')->remove($id);
            return back()->with('success','item has been saved for later');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::instance('default')->remove($id);

        return back()->with('success','item has been removed');
    }
}
