@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Table Create New</div>

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
                    <form  method="POST" action="{{ route('tables.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                          <label for="tablenoInput" class="form-label">Table Number</label>
                          <input type="text" class="form-control" id="tablenoInput"  name="table_no">
                        </div>
                        <div class="mb-3">
                          <label for="maxpaxInput" class="form-label">Max Pax</label>
                          <input type="text" class="form-control" id="maxpaxInput" name="max_pax">
                        </div>
                        <div class="mb-3">
                            <label for="statusInput" class="form-label">Status</label>
                            <select class="form-select" aria-label="Default select example" id="statusInput" name="status">
                                <option selected>Select a Status:</option>
                                <option value="available">Available</option>
                                <option value="booked">Booked</option>
                                <option value="occupied">Occupied</option>
                                <option value="unavailable">Unavailable</option>
                            </select>
                        </div>  
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
