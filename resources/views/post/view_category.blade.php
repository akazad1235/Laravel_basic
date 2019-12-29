@extends('welcome')
@section('content')
<div class="container">
<div class="row">
      <div class="col-lg-10 col-md-12 mx-auto">
        <p>
            <a href="{{ Route('add.category') }}" class="btn btn-danger">Add Category</a>
            <a href="{{ Route('all.category') }}" class="btn btn-info">All Category</a>
        </p>
        <hr>
         
        <table class="table table-responsive">
            <tr>
                <th>Id</th>
                <th>Category Name</th>
                <th>Slug Name</th>
                <th>date</th>
                <th>Action</th>
            </tr>
            
            <tr>
                <td>{{ $category->id}}</td></td>
                <td>{{ $category->name}}</td>
                <td>{{ $category->slug}}</td>
                <td>{{ $category->created_at}}</td>
                
                <td>
                    <a href="" class="btn btn-info">Edit</a>
                    <a href="" class="btn btn-danger">Delete</a>
                </td>

            </tr>
           
        </table>
      </div>
    </div>

</div>
@endsection