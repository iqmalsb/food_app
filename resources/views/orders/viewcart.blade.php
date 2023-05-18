@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">View Cart</div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Additional Details</th>
                            <th scope="col">Actions</th>
                          </tr>
                        </thead>

                        {{-- 
                            @foreach(Session::get('test') as $test)
                            {{$test->id}}
                            @endforeach
                         --}}
                        <tbody>
                            {{-- @foreach (session('cart') as $item)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $item-['name'] }}</td>
                                    <td>{{ $item->['description'] }}</td>
                                    <td>{{ $item->['additional_request'] }}</td>
                                    <td>
                                    </td>
                                </tr>
                            @endforeach --}}

                            {{ session('cartItems') }}

                            {{-- 
                                1	id	bigint unsigned	NULL	NULL	NO	NULL	auto_increment		
                                2	total_price	varchar(255)	utf8mb4	utf8mb4_unicode_ci	NO	NULL			
                                3	is_paid	tinyint(1)	NULL	NULL	NO	0			
                                4	is_dine_in	tinyint(1)	NULL	NULL	NO	1			
                                5	has_cutlery	tinyint(1)	NULL	NULL	NO	0			
                                6	additional_request	varchar(255)	utf8mb4	utf8mb4_unicode_ci	NO	NULL			
                                7	user_id	bigint unsigned	NULL	NULL	NO	NULL		users(id)	
                                8	created_at	timestamp	NULL	NULL	YES	NULL			
                                9	updated_at	timestamp	NULL	NULL	YES	NULL			
                                --}}
                        </tbody>
                      </table>
                      {{-- {{ $foods->links() }} --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
