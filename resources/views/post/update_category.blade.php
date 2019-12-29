@extends('welcome')
@section('content')
<div class="container">
<div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <p>
            <a href="{{ Route('add.category') }}" class="btn btn-danger">Add Category</a>
            <a href="{{ Route('all.category') }}" class="btn btn-info">All Category</a>
        </p>
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
        <!-- Contact Form - Enter your email address on line 19 of the mail/contact_me.php file to make this form work. -->
        <!-- WARNING: Some web hosts do not allow emails to be sent through forms to common mail hosts like Gmail or Yahoo. It's recommended that you use a private domain email address! -->
        <!-- To use the contact form, your site must be on a live web host with PHP! The form will not work locally! -->
        <form action="{{ url('update/category/'.$category->id)}}" method="post">
        @csrf
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>category Name</label>
              <input type="text" class="form-control" placeholder="Category Name" name="name" value="{{ $category->name}}" >
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Slug name</label>
              <input type="text" class="form-control" placeholder="Slug Name" name="slug"  value="{{ $category->slug}}">
              <p class="help-block text-danger"></p>
            </div>
          </div>
          
          <br>
          
          <div id="success"></div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary" >Update</button>
          </div>
        </form>
      </div>
    </div>

</div>
@endsection