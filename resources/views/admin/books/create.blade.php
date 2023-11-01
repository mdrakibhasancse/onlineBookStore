@extends('admin.layouts.app')
@section('title','Create')

@section('page_title')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1>Book</h1>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{url('/admin/dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item active">Book</li>
      </ol>
    </div>
  </div>
@endsection
@section('content')
          <!-- Default box -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title mt-2">Book Create</h3>
            </div>
                <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Book Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" id="exampleInputEmail1" placeholder="Enter Book Name">
                        @error('name')
                        <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="exampleInputEmail1">Book Category</label>
                        <select name="category_id" id="" class="form-control @error('category_id') is-invalid @enderror" name="category_id" value="{{ old('category_id') }}">
                            <option value="">--selected category--</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"{{ old('category_id')==  $category->id ? 'selected' : ' '}}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Book Publisher</label>
                        <select name="publisher_id" id="" class="form-control @error('publisher_id') is-invalid @enderror" name="publisher_id" value="{{ old('publisher_id') }}">
                            <option value="">--selected publisher--</option>
                            @foreach ($publishers as $publisher)
                                <option value="{{ $publisher->id }}"{{ old('publisher_id')==  $publisher->id ? 'selected' : ' '}}>{{ $publisher->name }}</option>
                            @endforeach
                        </select>
                        @error('publisher_id')
                        <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Book Author</label>
                        <select name="authors[]" id="" class="form-control @error('authors') is-invalid @enderror" multiple>
                            <option value="">--selected authors--</option>
                            @foreach ($authors as $author)
                                <option value="{{ $author->id }}">{{ $author->name }}</option>
                            @endforeach
                        </select>
                        @error('authors')
                        <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>


                    <div class="form-group">
                          <label for="exampleInputEmail1">Book Price</label>
                          <input type="number" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" id="exampleInputEmail1" placeholder="Enter Book Price">
                          @error('price')
                          <span style="color: red">{{ $message }}</span>
                          @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Book Stock</label>
                        <input type="number" class="form-control @error('stock') is-invalid @enderror" name="stock" value="{{ old('stock') }}" id="exampleInputEmail1" placeholder="Enter Book Stock">
                        @error('stock')
                        <span style="color: red">{{ $message }}</span>
                        @enderror
                   </div>



                    <div class="form-group">
                        <label for="exampleInputEmail1">Book page</label>
                        <input type="number" class="form-control @error('page') is-invalid @enderror" name="page" value="{{ old('page') }}" id="exampleInputEmail1" placeholder="Enter Book Page">
                        @error('page')
                        <span style="color: red">{{ $message }}</span>
                        @enderror
                   </div>

                    <div class="form-group">
                          <label for="exampleInputEmail1">Book Language</label>
                          <input type="text" class="form-control @error('language') is-invalid @enderror" name="language" value="{{ old('language') }}" id="exampleInputEmail1" placeholder="Enter Book Language">
                          @error('language')
                          <span style="color: red">{{ $message }}</span>
                          @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">ISBN_NO</label>
                        <input type="text" class="form-control @error('ISBN_NO') is-invalid @enderror" name="ISBN_NO" value="{{ old('ISBN_NO') }}" id="exampleInputEmail1" placeholder="Enter ISBN_NO">
                        @error('ISBN_NO')
                        <span style="color: red">{{ $message }}</span>
                        @enderror
                  </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Book Discount</label>
                        <input type="number" class="form-control" name="discount_amount" value="{{ old('discount_amount') }}" id="exampleInputEmail1" placeholder="Enter Book Discount">

                    </div>

                   <div class="form-group">
                        <label for="exampleInputEmail1">Book Description</label>
                        <textarea name="description" class="form-control">{{old('description')}}</textarea>
                   </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Book Image</label>
                    <input type="file" name="image">
                    @error('image')
                    <span style="color: red">{{ $message }}</span>
                    @enderror
                  </div>


                    </div>

                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </form>
          </div>
          <!-- /.card -->
@endsection
