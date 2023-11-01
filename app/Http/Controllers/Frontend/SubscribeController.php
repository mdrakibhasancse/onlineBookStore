<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Subscribe;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class SubscribeController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'email'=>'required|unique:subscribes|email'
        ]);

        $subscribe= new Subscribe();
        $subscribe->email=$request->email;
        $subscribe->save();
        Toastr::success('subscribe added', 'success');
        return redirect()->back();
    }
}
