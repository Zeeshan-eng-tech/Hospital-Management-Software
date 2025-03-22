@extends('layouts.admin')
@section('title' , 'Create Products')
@section('Contact')
@include('flash')
<div class="card m-1">
    <div class="card">
        <div class="card-header">
            <i class="fa fa-plus-circle"></i> Create New Product
        </div>
       <div class="card-body">
        <form action="{{route ('save.product')}}" method="post" enctype="multipart/form-data">
            @csrf 
            <div class="form-group">
                <label for="">Thumbnail</label> <br />
                <input type="file" name="thumbnail" />
                @error('thumbnail')
                <font color=red><b>{{ $message }}</b></font>
                @enderror
             </div>
            <div class="card-body">
            <div class="form-group">
                <label for="">Product Title</label>
                <input type="text" class="form-control" name="title" />
                @error('title')
                <font color=red><b>{{ $message }}</b></font>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Price</label>
                <input type="number" class="form-control" name="price" />
                @error('price')
                <font color=red><b>{{ $message }}</b></font>
                @enderror
            </div>            
            <div class="form-group">
                <label for="">Quantity</label>
                <input type="number" class="form-control" name="quantity" />
                @error('quantity')
                <font color=red><b>{{ $message }}</b></font>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Discription</label>
                  <textarea class="form-control" name="discription" rows="10"></textarea>
                @error('discription')
                <font color=red><b>{{ $message }}</b></font>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Category</label>
                  <select name="category" class="form-control" id="">
                    <option value="">Select Category</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                  </select>
                @error('category')
                <font color=red><b>{{ $message }}</b></font>
                @enderror
            </div>
            <div class="form-group">
                <button type="submit"  class="btn btn-primary float-right"><i class="fa fa-save"></i>Publish Product</button>
            </div>
          </form>  
        </div>
    </div>
</div>
@endsection
