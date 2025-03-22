@extends('layouts.admin')
@section('title' , 'Categories')
@section('Contact')
@include('flash')
<div class="card">
    <div class="card-herader">
      <i class="fa fa-plus circle"></i> Create Category
    </div>
    <table class="table table-bordered table-striped table-hover">
        <tr>
            <th>Name</th>
            <th>Action</th>
        </tr>
        <form action="{{route ('save.category')}}" method="post">
            @csrf
        <tr>
            <td>
                <input type="text" name="name" value="{{old('name')}}" class="form-control">
                <!-- /resources/views/post/create.blade.php --> 
 @if ($errors->any())
     <div class="alert alert-danger">
         <ul>
             @foreach ($errors->all() as $error)
                 <li>{{ $error }}</li>
             @endforeach
         </ul>
     </div>
 @endif
  
 <!-- Create Post Form -->
            </td>
            <td>
                <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-save"></i>Save Categories</button>
            </td>
        </tr>
      </form>
      @if($categories->count() >0)
      @foreach($categories as $category)
      <tr>
        <td>{{ $category->name}} <badge class="badge badge-danger float-right">{{ $category->created_at->diffforHumans(); }}</badge> </td>
        <td>
            <a href="{{ route('delete.category', $category->id)}}">
        <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
            </a>
        </td>
      </tr> 
      @endforeach
      @else
      <tr>
        <td class="text-center" colspan="2"><i class="fa fa-question-circle"></i>No Category Here</td>
      </tr>
      @endif
    </table>
</div>
@endsection
