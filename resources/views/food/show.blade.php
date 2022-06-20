@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Food Details | {{ $food->name }}</div>

                <div class="card-body">
                    <form  method="POST" action="{{ route('food.update', $food) }} "enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                          <label for="nameInput" class="form-label">Name</label>
                          <input type="text" class="form-control" id="nameInput"  name="name" value="{{ $food->name }}">
                        </div>
                        <div class="mb-3">
                          <label for="descriptionInput" class="form-label">Description</label>
                          <input type="text" class="form-control" id="descriptionInput" name="description" value="{{ $food->description }}">
                        </div>
                        <div class="mb-3">
                          <label for="imageInput" class="form-label">Image</label>
                          <input type="file" class="form-control" id="imageInput" name="image" value="{{ $food->image }}">
                        </div>
                        <div class="mb-3">
                          <label for="priceInput" class="form-label">Price</label>
                          <input type="text" class="form-control" id="priceInput" name="price" value="{{ $food->price }}">
                        </div>
                        <div class="mb-3">
                          <label for="categoryInput" class="form-label">Category</label>
                          <select class="form-select" aria-label="Default select example" id="categoryInput" name="category_id">
                            <option selected>{{ $categoryname->name }}</option>
                            @foreach ($categories as $category)
                              <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                          </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Edit</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
