@extends('welcome')
@section('content')
 <div class="container">
   <div class="row">
     <div class="col-lg-8 col-md-10 mx-auto">
       
       	<a href="{{ route('add.category') }}" class="btn btn-danger">Add Category</a>
       	<a href="{{ route('all.category') }}" class="btn btn-info">All Category</a>
        <a href="{{ route('all.post') }}" class="btn btn-info">All Post</a>
       
      <hr>
      @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
       @endif

       <form action="{{ url('update/post/'.$post->id)}}" method="post" enctype="multipart/form-data">
        @csrf
         <div class="control-group">
           <div class="form-group floating-label-form-group controls">
             <label>Post Title</label>
             <input type="text" class="form-control" placeholder="Title" name="title" value="{{ $post->title}}" >
           </div>
         </div>
         <br>
          <div class="control-group">
           <div class="form-group floating-label-form-group controls">
             <label>Category</label>
            <select class="form-control" name="category_id">
              @foreach($category as $row)
            	<option value="{{ $row->id }}" <?php if($row->id == $post->category_id){ echo"selected"; }?>>{{ $row->name }}</option>
            	@endforeach
            </select>
           </div>
         </div>
         <br>
         <div class="control-group">
           <div class="form-group col-xs-12 floating-label-form-group controls">
             <label>Post Image</label>
             <h3>Image: </h3>
             <img src="{{ URL::to($post->image)}}" style="height:80px; width:170px; border:1px solid #ddd; padding: 5px" /><br><br>
             <input type="file" class="form-control" name="image">
             <input type="hidden" class="form-control" name="old_image" value="{{ $post->image}}">
             
           </div>
         </div>
         <div class="control-group">
           <div class="form-group floating-label-form-group controls">
             <label>Post Details</label>
             <textarea rows="5" class="form-control" placeholder="Details"  name="details">{{ $post->details}}</textarea>
           </div>
         </div>
         <br>
         <div id="success"></div>
         <div class="form-group">
           <button type="submit" class="btn btn-primary" id="sendMessageButton">Send</button>
         </div>
       </form>
     </div>
   </div>
</div>
@endsection