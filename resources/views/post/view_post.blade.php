@extends('welcome')
@section('content')
<div class="container">
<div class="row">
      <div class="col-lg-10 col-md-12 mx-auto">
        <p>
            <a href="{{ Route('add.category') }}" class="btn btn-danger">Add Category</a>
            <a href="{{ Route('all.category') }}" class="btn btn-info">All Category</a>
            <a href="{{ Route('all.post') }}" class="btn btn-success">All post</a>
            
        </p>
        <hr>
         
        <a href="">{{ $single_post->title }}</a>
        <p><img src="{{ URL::to($single_post->image) }}" width="400" height="300"/></p>
        <p>{{ $single_post->details }}</p>
        
      </div>
    </div>

</div>
@endsection