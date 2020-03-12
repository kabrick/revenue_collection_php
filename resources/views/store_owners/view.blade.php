@extends('layouts.main')

@section('content')
    <div class="white-box">
        <h4 class="text-center">Shop Owners</h4>
        <br>

        @if(Session::has('success'))
            <div class="alert alert-success">
                {{Session::get('success')}}
            </div>
            <br>
        @endif

        <div class="table-responsive">
            <table class="table table-striped color-bordered-table success-bordered-table">
                <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Shop Name</th>
                    <th>Shop Location</th>
                    <th>Shop Type</th>
                    <th>Contact</th>
                    <th colspan="2"></th>
                </tr>
                </thead>
                <tbody>
                @if(count($store_owners) > 0)
                    @foreach($store_owners as $store_owner)
                        <tr>
                            <td>{{ $store_owner->first_name }}</td>
                            <td>{{ $store_owner->last_name }}</td>
                            <td>{{ $store_owner->shop_name }}</td>
                            <td>{{ $store_owner->location }}</td>
                            <td>
                                @if($store_owner->shop_type == 1)
                                    Retail
                                @else
                                    Wholesale
                                @endif
                            </td>
                            <td>{{ $store_owner->contact }}</td>
                            <td>
                                <a class="btn btn-success text-white" href="/store_owners/receive_payment/{{ $store_owner->id }}">Receive Payment</a>
                            </td>
                            <td>
                                <a class="btn btn-info text-white" href="/store_owners/edit/{{ $store_owner->id }}">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="6"><h4><code>No shop owners registered</code></h4></td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
