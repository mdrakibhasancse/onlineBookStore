<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\IAuthorRepository;
use App\Interfaces\IBookRepository;
use App\Interfaces\IPublisherRepository;
use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class DashboardController extends Controller
{
    protected $authorRepo;
    protected $bookRepo;
    protected $publisherRepo;

    public function __construct(IAuthorRepository $authorRepo,IBookRepository $bookRepo,IPublisherRepository $publisherRepo)
    {
        $this->authorRepo = $authorRepo;
        $this->bookRepo= $bookRepo;
        $this->publisherRepo= $publisherRepo;
    }


    public function index(){

        $data['authors']=$this->authorRepo->myGet();
        $data['books']=$this->bookRepo->myGet();
        $data['publishers']=$this->authorRepo->myGet();
        $data['customer']=User::where('is_admin',false)->get();
        $data['popular_books'] = Book::withCount('reviews')
        ->orderBy('reviews_count','desc')
        ->take(5)->get();
        return view('admin.dashboard.index',$data);
    }

    public function showCustomer(){
        // $data['customers']=User::where('is_admin',false)->get();
        return view('admin.customer.index');
    }

    public function destroy($id){
         $user=User::find($id);
         if(!$user){
            flash('Data Not Found')->error();
         }
         $user->delete();
         flash('Data delete Success')->success();
         return redirect('/admin/customers');
    }

    public function list(){
        $query =User::where('is_admin',false);
        $result = DataTables::of($query)
        ->addIndexColumn()
        ->addColumn('action', function ($customer) {
            $data['customer']=$customer;
            return view('admin.customer.action',$data);
        })
        ->make(true);
        return $result;
    }

}
