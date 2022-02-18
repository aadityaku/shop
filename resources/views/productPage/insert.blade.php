@extends('base')

@section('content')

<div class="container mt-3">
    <div class="row">
      <div class="col-3">
          @include('side')

      </div>
      <div class="col-9">
          <div class="row">
              <div class="col">
                  <h5>Insert Product</h5>
              </div>
          </div>
          <div class="card">
              <div class="card-body">
                  <form action="{{ route('product.create') }}" method="post" enctype="multipart/form-data">
                      @csrf
                      <div class="mb-3">
                          <label for="">Title</label>
                          <input type="text" name="title" class="form-control">
                          @error('title')
                          <p class="text-danger small">{{ $message}}</p>
                          @enderror
                      </div>
                      <div class="mb-3">
                          <label for="">brand</label>
                          <input type="text" name="brand" class="form-control">
                          @error('brand')
                          <p class="text-danger small">{{ $message}}</p>
                          @enderror
                      </div>
                      <div class="mb-3">
                          <label for="">price</label>
                          <input type="text" name="price" class="form-control">
                          @error('price')
                          <p class="text-danger small">{{ $message}}</p>
                          @enderror
                      </div>
                      <div class="mb-3">
                          <label for="">discount_price</label>
                          <input type="text" name="discount_price" class="form-control">
                          @error('discount_price')
                          <p class="text-danger small">{{ $message}}</p>
                          @enderror
                      </div>
                      <div class="mb-3">
                          <label for="">Qty</label>
                          <input type="text" name="qty" class="form-control">
                          @error('qty')
                          <p class="text-danger small">{{ $message}}</p>
                          @enderror
                      </div>
                      <div class="mb-3">
                          <label for="">category</label>
                         <select name="category_id" class="form-select">
                             @foreach($category as $item)
                             <option value="{{ $item->id}}">{{ $item->cat_title}}</option>
                             @endforeach
                         </select>
                          @error('category')
                          <p class="text-danger small">{{ $message}}</p>
                          @enderror
                      </div>
                      <div class="mb-3">
                          <label for="">Image</label>
                          <input type="file" name="image" class="form-control">
                      </div>
                     
                      <div class="mb-3">
                          <label for="">Description</label>
                            <textarea name="description" rows="5" class="form-control"></textarea>
                            @error('description')
                                <p class="text-danger small">{{ $message}}</p>
                            @enderror
                      </div>
                      <div class="mb-3">
                         
                          <input type="submit"  class="btn btn-danger w-100">
                      </div>
                  </form>
              </div>
          </div>
      </div>
    </div>
</div>
@endsection