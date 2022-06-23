@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Categories Create New</div>
                
                  @if ($errors->any())
                    <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                    </div>
                  @endif

                <div class="card-body">
                    <form  method="POST" action="{{ route('categories.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                          <label for="nameInput" class="form-label">Name</label>
                          <input type="text" class="form-control" id="nameInput"  name="name">
                        </div>
                        <div class="mb-3">
                          <label for="descriptionInput" class="form-label">Description</label>
                          <input type="text" class="form-control" id="descriptionInput" name="description">
                        </div>
                        <div class="mb-3">
                          <label for="imageInput" class="form-label">Image</label>
                          <input class="form-control" type="file" id="image" name="image">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
