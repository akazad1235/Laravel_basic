@extends('welcome')
@section('content')
<div class="container">
<div class="row">
      <div class="col-lg-12 col-md-12 mx-auto">
        <p>
            <a href="{{ Route('add.category') }}" class="btn btn-danger">Add Category</a>
            <a href="{{ Route('all.category') }}" class="btn btn-info">All Category</a>
        </p>
        <hr>
         
        <table class="table table-responsive">
            <tr>
                <th>Id</th>
                <th>Category id </th>
                <th>Post Title</th>
                <th>Image</th>
               
                <th>Action</th>
            </tr>
            @foreach($allpost as $row)
            <tr>
                <td>{{ $row->id}}</td>
                <td>{{ $row->name }}</td>
                <td>{{ $row->title }}</td>
                <td><img src="{{ URL::to($row->image) }}" style="height:40px; width:100px" alt="img"></td>
                
                
                
                <td>
                    <a href="{{ URL::to('edit/post/'.$row->id) }}" class="btn btn-info">Edit</a>
                    <a href="{{ URL::to('view/post/'.$row->id) }}" class="btn btn-success">View</a>
                    <a href="{{ URL::to('delete/post/'.$row->id) }}" id="delete" class="btn btn-danger">Delete</a>
                </td>

            </tr>
            @endforeach
        </table>
      </div>
    </div>

</div>
@endsection