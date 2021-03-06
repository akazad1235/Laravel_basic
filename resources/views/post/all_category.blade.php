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
            @foreach($category as $row)
            <tr>
                <td>{{ $row->id}}</td>
                <td>{{ $row->name}}</td>
                <td>{{ $row->slug}}</td>
                <td>{{ $row->created_at}}</td>
                
                <td>
                    <a href="{{ URL::to('edit/category/'.$row->id) }}" class="btn btn-info">Edit</a>
                    <a href="{{ URL::to('view/category/'.$row->id) }}" class="btn btn-success">View</a>
                    <a href="{{ URL::to('delete/category/'.$row->id) }}" id="delete" class="btn btn-danger">Delete</a>
                </td>

            </tr>
            @endforeach
        </table>
      </div>
    </div>

</div>
@endsection