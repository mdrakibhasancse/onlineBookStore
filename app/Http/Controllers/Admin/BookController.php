<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookRequest;
use App\Interfaces\IAuthorRepository;
use App\Interfaces\IBookRepository;
use App\Interfaces\ICategoryRepository;
use App\Interfaces\IPublisherRepository;
use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use LDAP\Result;
use Yajra\DataTables\DataTables;

class BookController extends Controller
{
    protected $bookRepo;
    protected $categoryRepo;
    protected $publisherRepo;
    protected $authorRepo;

    public function __construct(IBookRepository $bookRepo, ICategoryRepository $categoryRepo, IPublisherRepository $publisherRepo,IAuthorRepository $authorRepo)
    {
        $this->bookRepo =$bookRepo;
        $this->categoryRepo = $categoryRepo;
        $this->publisherRepo= $publisherRepo;
        $this->authorRepo = $authorRepo;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    //    $data['books']=Book::get();
    //    $data['books']=$this->bookRepo->myGet();
       return view('admin.books.index');
    }


    public function list(){
        $query =Book::query();

        $result = DataTables::of($query)
        ->addIndexColumn()
        ->addColumn('category_name', function ($book) {
                return  $book->category->name;
        })
        ->addColumn('publisher_name', function ($book) {
            return  $book->publisher->name;
        })
        ->addColumn('image', function ($book) {
            $data['book']=$book;
            return view('admin.books.image',$data);
        })
        ->addColumn('status', function ($book) {
            $data['book']=$book;
            return view('admin.books.status',$data);
        })

        ->addColumn('action', function ($book) {
            $data['book']=$book;
            return view('admin.books.action',$data);
        })


        ->make(true);

        return $result;
        // return view('admin.books.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['categories']=$this->categoryRepo->myGet();
        $data['publishers']=$this->publisherRepo->myGet();
        $data['authors']=$this->authorRepo->myGet();
        return view('admin.books.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookRequest $request)
    {
        $this->bookRepo->storeBook($request);
        return redirect('/admin/books');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->bookRepo->updateStatus($id);
        return redirect('/admin/books');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book=$this->bookRepo->myFind($id);
        if(!$book){
            return redirect('/admin/books');
        }
        $data['book']=$book;
        $data['categories']=$this->categoryRepo->myGet();
        $data['publishers']=$this->publisherRepo->myGet();
        $data['authors']=$this->authorRepo->myGet();
        return view('admin.books.edit',$data);
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
        $request->validate([
            'name'=>'required|max:255',
            'category_id'=>'required',
            'publisher_id'=>'required',
            'authors'=>'required',
            'price'=>'required|numeric',
            'page'=>'required|numeric',
            'stock'=>'numeric',
            'language'=>'required|max:255',
            'image'=>'image',
            'ISBN_NO'=>'required|max:255'
        ]);
        $this->bookRepo->updateBook($request,$id);
        return redirect('/admin/books');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->bookRepo->myDelete($id);
        return redirect('/admin/books');
    }
}
