@extends('layouts.main')

@section('content')
    <div class="white-box">
        <h4 class="text-center">Penalties</h4>
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
                    <th>Store Owner</th>
                    <th>Month</th>
                    <th>Year</th>
                    <th>Status</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @if(count($penalties) > 0)
                    @foreach($penalties as $penalty)
                        <tr>
                            <td>{{ get_value_from_table($penalty->store_owner_id, 'id', 'first_name', 'store_owners') }} {{ get_value_from_table($penalty->store_owner_id, 'id', 'last_name', 'store_owners') }}</td>
                            <td>{{ $months[$penalty->month] }}</td>
                            <td>{{ $penalty->year }}</td>
                            <td>
                                @if($penalty->penalty_paid == 1)
                                    <p class="text-success">Paid</p>
                                @else
                                    <p class="text-danger">Not Paid</p>
                                @endif
                            </td>
                            <td>
                                {{--<a class="btn btn-success text-white" href="">Pay Penalty</a>--}}
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="8" class="text-center"><h4><code>No penalties applied</code></h4></td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
