@extends('welcome')
@section('content')
<div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        @foreach($allpost as $data)
        <div class="post-preview">
          <a href="post.html">
            <h2 class="post-title">
              {{ $data->title }}
            </h2>
            <h3 class="post-subtitle">
              <img src="{{ URL::to($data->image) }}" style="width:500px; height:300px; border:1px solid color:#ddd"/>
            </h3>
          </a>
          <p class="post-meta">Posted by
            <a href="#">Start Bootstrap</a>
            on September 24, 2019</p>
        </div>
        <hr>
      @endforeach
      {{ $allpost->links() }}
        <!-- Pager -->
        <div class="clearfix">
          <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
        </div>
      </div>
    </div>
  </div>

@endsection