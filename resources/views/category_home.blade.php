@extends('base')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-2">
            @include('side')
        </div>
   <div class="col-9">
    <div class="row mt-3">
        <div class="col-3">

            <div class="card">
                <div class="card-body">
                    <h2>Create Category</h2>
                    <form action="{{ route('category.store')  }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="">Title</label>
                            <input type="text" name="cat_title" class="form-control">
                            @error('cat_title')
                                <p class="text-danger small">{{ $message }}</p>
                                
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">Description</label>
                            <textarea name="cat_descriptions"  rows="5" class="form-control"></textarea>
                        </div>
                        <div class="mb-3">
                            <input type="submit" class="btn btn-danger w-100">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-9">
            <table class="table table-hover">
                <tr>
                    <th>Id</th>
                    <th>title</th>
                    <th>description</th>
                    <th>action</th>
                </tr>
                @foreach ($category as $cat)
                <tr>
                  <td>{{$cat->id}}</td>
                  <td>{{$cat->cat_title}}</td>
                  <td>{{$cat->cat_descriptions}}</td>
                  <td>
                      <a href="{{ route('category.delete',['id'=>$cat->id]) }}" class="btn btn-danger btn-sm">X</a>
                      <a href="{{ route('category.edit',['id'=>$cat->id]) }}" class="btn btn-success btn-sm">Edit</a>
                  </td>
                </tr>
                    
                @endforeach
            </table>
        </div>
    </div>
    </div>
</div>
</div>
@endsection