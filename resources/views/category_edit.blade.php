@extends('base')

@section('content')

<div class="container">
    <div class="row mt-3">
        <div class="col-3 mx-auto">
            <div class="card">
                <div class="card-body">
                    <h2>Edit Category</h2>
                    <form action="" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="">Title</label>
                            <input type="text" name="cat_title" value="{{$category->cat_title}}" class="form-control">
                            @error('cat_title')
                                <p class="text-danger small">{{ $message }}</p>
                                
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">Description</label>
                            <textarea name="cat_descriptions" rows="5" class="form-control">{{$category->cat_descriptions}}</textarea>
                        </div>
                        <div class="mb-3">
                            <input type="submit" class="btn btn-danger w-100">
                        </div>
                    </form>
                </div>
            </div>
        </div>
       
    </div>
</div>
@endsection