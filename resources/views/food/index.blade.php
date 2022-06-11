@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Food Index</div>

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
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($foods as $food)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$food->name}}</td>
                                    <td>{{$food->description}}</td>
                                    <td>{{$food->image}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
