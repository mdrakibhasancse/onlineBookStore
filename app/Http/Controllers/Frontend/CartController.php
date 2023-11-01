<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Interfaces\IAuthorRepository;
use App\Interfaces\IBookRepository;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;


class CartController extends Controller
{
    protected $bookRepo;
    protected $authorRepo;

    public function __construct(IBookRepository $bookRepo,IAuthorRepository $authorRepo)
    {
        $this->bookRepo = $bookRepo;
        $this->authorRepo = $authorRepo;
    }


    public function cartAdd($id){
        $book=$this->bookRepo->myFind($id);
        if($book){
            \Cart::add(array(
                'id' => $book->id,
                'name' => $book->name,
                'price' => $book->price_discount,
                'quantity' => 1,
                'attributes' => array(
                    'image' => $book->image,
                  )
            ));
            return redirect()->back();
        }else{
            return redirect()->back();
        }


    }


    public function check_out(){
        $data['authors']=$this->authorRepo->myGet();
        return view('frontend.home.check_out',$data);;
    }

    public function cartRemove($id){
        \Cart::remove($id);
        return redirect("/cart/check_out");
    }


    public function cartUpdate($id,Request $request){
        $book = $this->bookRepo->myFind($id);
        $data = \Cart::get($id);
        $old_book=$data->quantity;
        $new_book=$request->card_value;
        if($new_book==0){
            \Cart::remove($id);
            return redirect("/cart/check_out");
        }
        if($book->stock >= $new_book){
            \Cart::update($id, array(
                'quantity' =>$new_book - $old_book,
            ));
            return redirect("/cart/check_out");
        }
        else{
            return redirect("/cart/check_out");
        }

    }

    public function add_one_book($id){
        $book = $this->bookRepo->myFind($id);
        $data = \Cart::get($id);
        if($book->stock > $data->quantity){
            \Cart::update($id, array(
                'quantity' => 1,
            ));
        }
        return response("Success",200);
    }

    public function remove_one_book($id){
        $data = \Cart::get($id);
        if($data->quantity==1){
            \Cart::remove($id);
        }else{
            \Cart::update($id, array(
                'quantity' => -1,
            ));
        }
        return response("Success",200);

    }


    public function cartSingleBook(Request $request){
        $book = $this->bookRepo->myFind($request->product_id);
        if($book){
            \Cart::add(array(
                'id' => $book->id,
                'name' => $book->name,
                'price' => $book->price_discount,
                'quantity' => $request->quantity,
                'attributes' => array(
                    'image' => $book->image,
                  )
            ));
            return redirect()->back();
        }
        return redirect()->back();
    }

}
