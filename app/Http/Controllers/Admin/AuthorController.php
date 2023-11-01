<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthorRequest;
use App\Interfaces\IAuthorRepository;
use App\Interfaces\IBookRepository;
use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthorController extends Controller
{
    protected $authorRepo;
    protected $bookRepo;

    public function __construct(IAuthorRepository $authorRepo ,IBookRepository $bookRepo)
    {
        $this->authorRepo = $authorRepo;
        $this->bookRepo = $bookRepo;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['authors']=$this->authorRepo->myGet();
        return view('admin.authors.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['books']=$this->bookRepo->myGet();
        // $data['books']=Book::get();
        return view('admin.authors.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AuthorRequest $request)
    {
         $this->authorRepo->storeAuthor($request);
         return redirect('/admin/authors');
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

        $author=$this->authorRepo->myFind($id);
        if(!$author){
            return redirect('/admin/authors');
        }
        $data['author']=$author;
        $data['books']=$this->bookRepo->myGet();
        return view('admin.authors.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AuthorRequest $request, $id)
    {
        $this->authorRepo->updateAuthor($request,$id);
        return redirect('/admin/authors');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorRepo->myDelete($id);
        return redirect('/admin/authors');
    }
}
