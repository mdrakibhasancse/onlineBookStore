<?php

namespace App\Repositories;

use App\Interfaces\IBookRepository;
use App\Models\Book;
use App\Models\Subscribe;
use App\Models\User;
use App\Notifications\BookCustomer;
use App\Notifications\SubscribeNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Notification;

class BookRepository extends BaseRepository implements IBookRepository
{

    public function __construct(Book $model)
    {
        parent::__construct($model);
    }

    public function storeBook($request){
       try {
        if($request->hasFile('image')){
            $path = $request->file('image')->store('book_images','public');
        }else{
            $path=null;
        }
         $book=$this->model;
         $book->name=$request->name;
         $book->created_by=Auth::id();
        //  $book->category_id=$request->category_id;
         $book->category()->associate($request->category_id);
        //  $book->publisher_id=$request->publisher_id;
         $book->publisher()->associate($request->publisher_id);
         $book->price=$request->price;
         $book->stock=$request->stock;
         $book->discount_amount=$request->discount_amount;
         $book->ISBN_NO=$request->ISBN_NO;
         $book->language=$request->language;
         $book->page=$request->page;
         $book->description=$request->description;
         $book->image=$path;
         $book->save();
         $book->authors()->attach($request->authors);

        //  $subscribes= Subscribe::get();
        //  foreach($subscribes as $subscribe){
        //      Notification::route('mail', $subscribe->email)
        //      ->notify(new SubscribeNotification($book));
        //  }

        //  $users = User::where('is_admin',false)->get();
        //  Notification::send($users, new BookCustomer($book));

         flash('Book Create Successfully')->success();
       }catch (\Throwable $th) {
          flash('Something Wrong'. $th->getMessage())->error();
       }
    }

    public function updateBook($request, $id){
         $book=$this->myFind($id);
         if(!$book){
             return false;
         }
            if($request->hasFile('image')){
                $deletepath=$book->image;
                Storage::disk('public')->delete($deletepath);
                $path = $request->file('image')->store('book_images','public');
            }else{
                $path = $book->image;
            }

            try {
                $book->name=$request->name;
                $book->created_by=Auth::id();
                $book->category_id=$request->category_id;
                $book->publisher_id=$request->publisher_id;
                $book->price=$request->price;
                $book->stock=$request->stock;
                $book->discount_amount=$request->discount_amount;
                $book->ISBN_NO=$request->ISBN_NO;
                $book->language=$request->language;
                $book->page=$request->page;
                $book->description=$request->description;
                $book->image=$path;
                $book->save();
                $book->authors()->detach($book->authors);
                $book->authors()->attach($request->authors);
                flash('Book Update Successfully')->success();
                return true;
            } catch (\Throwable $th) {
                flash('Something Wrong'. $th->getMessage())->error();
            }

    }

    public function updateStatus($id){
        $bookStatus=$this->myFind($id)->select('status')->where('id',$id)->first();
        if($bookStatus->status==1){
            $statusUpdate=0;
         }else{
            $statusUpdate=1;
         }
         $this->model::where('id',$id)->update(['status'=>$statusUpdate]);
         flash('status update Successfully')->success();

    }

    public function latestBooks(){
       $data = $this->model
       ->where('status',1)
       ->latest()
       ->get();
       return $data;
    }

    public function featuredBooks(){
        $data = $this->model
        ->latest()
        ->where('status',1)
        ->paginate(8);
        return $data;
     }

    public function specialBooks(){
        $data = $this->model
        ->take(8)
        ->where('discount_amount','>', 0)
        ->where('status',1)
        ->orderBy('discount_amount', 'desc')
        ->get();
        return $data;
     }

     public function newRelease(){
        $data = $this->model
        ->take(3)
        ->where('status',1)
        ->where('discount_amount','>', 0)
        ->orderBy('created_at', 'desc')
        ->get();
        return $data;
     }

     public function relatedBooks($id){
        $book=$this->myFind($id);
        $category_id=$book->category->id;
        $related_product=$this->model->where('category_id',$category_id)->where('status',1)->get();
        return $related_product;
     }

     public function bookSearch($request){
          $book=$this->model
          ->where('name','like','%'.$request->search.'%')
          ->get();
          return $book;
     }

     public function bookSearchAjax($request){
        $book=$this->model
       ->where('name','like','%'.$request->search.'%')
       ->take(5)
       ->get();
       return $book;
    }






}
