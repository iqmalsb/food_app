@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Food Create New</div>

                <div class="card-body">
                    <form  method="POST" action="{{ route('food.store') }}">
                        @csrf
                        <fieldset disabled>
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
                          <input type="text" class="form-control" id="imageInput" name="image" value="{{ $food->image }}">
                        </div>
                        </fieldset>
                        <button class="btn btn-primary">Edit</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
