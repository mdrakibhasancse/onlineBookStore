<?php

namespace App\Repositories;

use App\Interfaces\IAuthorRepository;
use App\Models\Author;
use Facade\FlareClient\Stacktrace\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AuthorRepository extends BaseRepository implements IAuthorRepository
{
    public function __construct(Author $model)
    {
        parent::__construct($model);
    }

    public function storeAuthor($request){
         try {
            //  dd($request->all());

            if($request->hasFile('image')){
                $path = $request->file('image')->store('author_images','public');
             }else{
                 $path=null;
             }

             $author=new Author();
             $author->name=$request->name;
             $author->created_by=Auth::id();
             $author->image=$path;
             $author->save();
             $author->books()->attach($request->books);
             flash('Author Create Successfully')->success();
         } catch (\Throwable $th) {
            flash('Something Wrong'. $th->getMessage())->error();
         }

    }

    public function updateAuthor($request,$id){

        $author=$this->myFind($id);
        if(!$author){
           return false;
        }

        if($request->hasFile('image')){
            $deletepath=$author->image;
            Storage::disk('public')->delete($deletepath);
            $path = $request->file('image')->store('author_images','public');
        }else{
            $path=null;
        }
        $author->name=$request->name;
        $author->image=$path;
        $author->save();
        $author->books()->attach($request->books);
        flash('Author Update Successfully')->success();
        return true;
    }

}
