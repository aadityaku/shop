@extends('base')

@section('content')
<div class="container mt-3">
    <div class="row">
        <div class="col-3">
           @include('side')
        </div>
        <div class="col-9">
            <div class="row">
                <div class="col-9">
                    <h5>Manage Products</h5>
                </div>
                <div class="col">
                    <a href="{{ route('product.create') }}" class="btn btn-success float-end">Insert Product</a>
                </div>
            </div>
              <table class="table">
                  <tr>
                      <th>Id</th>
                      <th>Title</th>
                      <th>Brand</th>
                      <th>Price</th>
                      <th>Qty</th>
                      <th>Image</th>
                      <th>Action</th>
                  </tr>
                  @foreach ($products  as $pro)
                  <tr>
                    <td>{{ $pro->id}}</td>
                    <td>{{ $pro->title}}</td>
                    <td>{{ $pro->brand}}</td>
                    <td>{{ $pro->discount_price}}<del>{{$pro->price}}</del></td>
                    <td>{{ $pro->qty}}</td>
                    <td><img src="{{ asset("product_image/".$pro->image) }}" alt=""  style="object-fit:cover;height:50px"></td>
                    <td>
                        <a href="{{ route('product.delete',["id"=>$pro->id]) }}" class="btn btn-danger">X</a>
                        <a href="{{ route('product.edit',['id'=>$pro->id])}}" class="btn btn-info">Edit</a>
                        <a href="" class="btn btn-primary">View</a>
                    </td>
                </tr>
                  @endforeach
                
              </table>
        </div>
    </div>
</div>
@endsection