<?php

namespace App\Repositories;

use App\Interfaces\IPublisherRepository;
use App\Models\Publisher;
use Illuminate\Support\Facades\Auth;

class PublisherRepository extends BaseRepository implements IPublisherRepository
{

    public function __construct(Publisher $model)
    {
        parent::__construct($model);
    }

    public function storePublisher($request){
         $publisher=$this->model;
         $publisher->name=$request->name;
         $publisher->created_by=Auth::id();
         $publisher->address=$request->address;
         $publisher->save();
         flash('Publisher Create Successfully')->success();
    }

    public function updatePublisher($request,$id){
            $publisher=$this->myFind($id);
            if(!$publisher){
                return false;
            }
            $publisher->name=$request->name;
            $publisher->address=$request->address;
            $publisher->save();
            flash('Publisher Update Successfully')->success();
            return true;
    }
}
