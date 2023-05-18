@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Order Create New</div>
                
                  {{-- @if ($errors->any())
                    <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                    </div>
                  @endif --}}

                  {{-- Letak Dua Button (Dine-in or Takeaway) --}}

                <div class="card-body">
                  <div class="d-flex justify-content-evenly">
                    <a href="{{ route('orders.dine-in') }}">
                      <button type="button" class="btn btn-primary btn-lg">Dine-in</button>
                    </a>
                    <a href="{{ route('orders.takeaway') }}">
                      <button type="button" class="btn btn-secondary btn-lg">Takeaway</button>
                    </a>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
