@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Food Index</div>

                @if (session()->has('alert-message'))
                    <div class="alert {{ session()->get('alert-type') }}">
                        {{ session()->get('alert-message') }}
                    </div>
                @endif
                <div class="card-body">
                    <a href="{{ route('food.create') }}"type="button" class="btn btn-dark">Add New Food</a>
                </div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Image</th>
                            <th scope="col">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($foods as $food)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$food->name}}</td>
                                    <td>{{$food->description}}</td>
                                    <td><img src="{{ asset('/storage/'.$food->image) }}" class="img-thumbnail"></td>
                                    <td>
                                        <a href="{{ route('food.show', $food) }}" type="button" class="btn btn-info">Details</a>
                                        <a href="{{ route('food.delete', $food) }}" type="button" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                      </table>
                      {{ $foods->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
