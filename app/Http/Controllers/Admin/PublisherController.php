<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PublisherRequest;
use App\Interfaces\IPublisherRepository;
use Illuminate\Http\Request;

class PublisherController extends Controller
{
    protected $publisherRepo;

    public function __construct(IPublisherRepository $publisherRepo)
    {
        $this->publisherRepo = $publisherRepo;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['publishers']=$this->publisherRepo->myGet();
        return view('admin.publishers.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.publishers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PublisherRequest $request)
    {
        $this->publisherRepo->storePublisher($request);
        return redirect('/admin/publishers');

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
        $publisher=$this->publisherRepo->myFind($id);
        if(!$publisher){
            return redirect('/admin/publishers');
        }
        $data['publisher']=$publisher;
        return view('admin.publishers.edit',$data);
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
        $this->publisherRepo->updatePublisher($request,$id);
        return redirect('/admin/publishers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->publisherRepo->myDelete($id);
        return redirect('/admin/publishers');
    }
}
