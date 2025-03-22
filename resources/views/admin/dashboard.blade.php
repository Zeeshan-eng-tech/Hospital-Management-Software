@extends('layouts.admin')
@section('title' , 'Dashboard')
@section('Contact')
<div class="container">
    <br />
          <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ $users->count() }}</h3>

                <p>Users </p>
              </div>
              <div class="icon">
                <i class="fas fa-users"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ $products->count(); }}</h3>

                <p>Products</p>
              </div>
              <div class="icon">
                <i class="fas fa-list"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{ $categories->count() }}</h3>

                <p>Categories</p>
              </div>
              <div class="icon">
                <i class="fas fa-question-circle"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
        </div>
</div>
         @endsection
