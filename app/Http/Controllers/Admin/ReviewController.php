<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        $data['reviews']=Review::orderBy('id','desc')->get();
        return view('admin.review.manage',$data);
    }

    public function store(Request $request)
    {
         $book_id=$request->input('book_id');
         $book=Book::where('id', $book_id)->first();
         if($book){
            $review= new Review();
            $review->name=$request->name;
            $review->email=$request->email;
            $review->rating=$request->rating;
            $review->message=$request->message;
            $review->book_id=$book_id;
            $review->save();
            return redirect()->back();
         }

    }

    public function updateStatus($id){

         $reviewStatus=Review::select('status')->where('id',$id)->first();
         if($reviewStatus->status==1){
            $statusUpdate=0;
         }else{
            $statusUpdate=1;
         }
         Review::where('id',$id)->update(['status'=>$statusUpdate]);
         flash('status update Successfully')->success();
         return redirect('admin/review/manage');

    }

    public function deleteStatus($id){
        $review=Review::find($id);
        $review->delete();
        return redirect('admin/review/manage');
    }
}
