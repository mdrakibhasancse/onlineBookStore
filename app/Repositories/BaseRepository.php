<?php

namespace App\Repositories;

use App\Interfaces\IBaseRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class BaseRepository implements IBaseRepository
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function myGet(){
       return $this->model->orderBy('id', 'desc')->get();
    }

    public function myFind($id){
        $data=$this->model->find($id);
        if(!$data){
            flash('Data Not Found')->error();
            return null;
        }else{
            return $data;
        }
    }
    public function myDelete($id){
        $data=$this->model->where('created_by',Auth::id())->find($id);
        if(!$data){
            flash('Data Not Found')->error();
        }else{
            $data->delete();
            flash('Successfully Deleted')->success();
        }
    }
}
