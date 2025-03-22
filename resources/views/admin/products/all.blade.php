@extends('layouts.admin')
@section('title' , 'All Products')
@section('Contact')
<div class="card">
    <div class="card-header">
        <i class="fa fa-list"></i>Products
        <span class="float-right">{{ $total }} Pkr</span>
    </div>
    <table class="tabel table-bordered table-striped table-hover">
        <tr>
            <th>Title</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Category</th>
            <th>Action</th>
        </tr>
        @foreach($products as $product)
        <tr>
            <td>
            <img src="{{ asset('storage/products') }}/{{ $product->picture }}" class="img-circle" height="50px" alt="">
            {{ucfirst($product->title)}}
            </td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->quantity }}</td>
            <td>{{ $product->category->name }}</td>
            <td>
                <a href="{{ route('delete.product',$product->id)}}">
                <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                </a>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
