<?php

namespace App\Repositories;

use App\Interfaces\ICategoryRepository;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class CategoryRepository extends BaseRepository implements ICategoryRepository
{

    public function __construct(Category $model)
    {
        parent::__construct($model);
    }

    public function storeCategory($request){

        $category=$this->model;
        $category->name=$request->name;
        $category->created_by=Auth::id();
        $category->save();
        flash('Category Create Successfully')->success();
    }

    public function updateCategory($request,$id){
        $category=$this->myFind($id);
        if(!$category){
           return false;
        }
        $category->name=$request->name;
        $category->save();
        flash('Category Update Successfully')->success();
        return true;
    }

    public function updateStatus($id){
        $categoryStatus=$this->myFind($id)->select('status')->where('id',$id)->first();
        if($categoryStatus->status==1){
            $statusUpdate=0;
         }else{
            $statusUpdate=1;
         }
         $this->model::where('id',$id)->update(['status'=>$statusUpdate]);
         flash('status update Successfully')->success();

    }
}
