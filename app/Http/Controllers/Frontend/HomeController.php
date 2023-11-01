<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Interfaces\IBookRepository;
use App\Interfaces\ICategoryRepository;
use App\Interfaces\IPublisherRepository;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;



class HomeController extends Controller
{
    protected $bookRepo;
    protected $categoryRepo;

    public function __construct(IBookRepository $bookRepo,ICategoryRepository $categoryRepo)
    {
        $this->bookRepo = $bookRepo;
        $this->categoryRepo = $categoryRepo;
    }


    public function index(){
        $data['latestBooks']= $this->bookRepo->latestBooks();
        // $collectionBooks = array_chunk($books->all(), ceil($books->count() / 2));
        // $data['featured_book_first']=  $collectionBooks[0];
        // $data['featured_book_second']=  $collectionBooks[1];
        $data['specialBooks']=$this->bookRepo->specialBooks();
        $data['newReleases']=$this->bookRepo->newRelease();
        return view('frontend.home.index',$data);
    }

    public function single_book($id){
        $book=$this->bookRepo->myFind($id);
        $data['single_book']=$this->bookRepo->myFind($id);
        $data['related_book']=$this->bookRepo->relatedBooks($id);
        $data['review_messages']=Review::where('status',1)->where('book_id',$book->id)->get();
        $rating_sum = Review::where('status',1)->where('book_id',$book->id)->sum('rating');

        if($data['review_messages']->count() > 0 ){
            $data['rating_value'] = $rating_sum / $data['review_messages']->count();
            dd($data['rating_value']);
        }else{
            $data['rating_value'] = 0;
        }

        return view('frontend.home.single_book',$data);
    }

    public function category($name){
        $id=Category::where('name',$name)->pluck('id');
        $data['books']=Book::where('category_id',$id)->where('status',1)->get();
        return view('frontend.home.category',$data);
    }


    public function search(Request $request){

        $request->validate(['search'=>'required']);
        $data['books'] = $this->bookRepo->bookSearch($request);
        return view('frontend.home.search',$data);
    }


    public function searchBook(Request $request){
        $request->validate(['search'=>'required']);
        $data['books'] = $this->bookRepo->bookSearchAjax($request);
        return view('frontend.home.search_book',$data);
    }



    public function AllBook(){
        $data['featuredBooks']= $this->bookRepo->featuredBooks();
         return view('frontend.home.shop',$data);
    }

    public function book($id){
        $book = Book::find($id);
        $category_id = $book->category()->pluck('id');
        $data['books'] = Book::where('category_id', $category_id)->get();
        return view('frontend.home.book',$data);
    }


    public function totalAuthor(){
        $data['authors'] = Author::get();
        return view('frontend.home.author.total_author',$data);
    }


    public function authorBook($id){
         $author = Author::find($id);
         $data['books'] = $author->books()->get();
         return view('frontend.home.author.author_book',$data);
    }

}
