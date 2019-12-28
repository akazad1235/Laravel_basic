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
                <td>{{ $row->id}}</td></td>
                <td>{{ $row->name}}</td>
                <td>{{ $row->slug}}</td>
                <td>{{ $row->created_at}}</td>
                
                <td>
                    <a href="" class="btn btn-info">Edit</a>
                    <a href="" class="btn btn-success">View</a>
                    <a href="" class="btn btn-danger">Delete</a>
                </td>

            </tr>
            @endforeach
        </table>
      </div>
    </div>

</div>
@endsection