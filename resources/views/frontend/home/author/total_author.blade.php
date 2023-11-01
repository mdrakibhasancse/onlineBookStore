
@extends('frontend.layouts.app')
@section('title','Author')
@section('content')
<div class="breadcrumbs-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumbs">
                   <h2>Author</h2>
                   <ul class="breadcrumbs-list">
                        <li>
                            <a title="Return to Home" href="index.html">Home</a>
                        </li>
                        <li>Author</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumbs Area Start -->
<!-- Shop Area Start -->
<div class="section-padding">
    <div class="container" style="margin-top:30px; margin-bottom:20px">

                <div class="row">
                    @foreach ($authors as $author)
                    <div class="col-md-3">
		                <div class="thumbnail">
		                    <a href="{{ url("/author/$author->id")}}">
                                <img style="height:120px; width:120px" class="img-circle" src="{{(!empty($author->image)) ? asset("storage/".$author->image) : asset('/upload/extra.jpg')}}">
		                    </a>
		                    <div class="member-info text-center" style="margin-top: 5px;">
		                        <a href="#">{{ $author->name }}</a>
		                    </div>
		                </div>
		            </div>

                    @endforeach
                </div>
            </div>

</div>

@endsection

