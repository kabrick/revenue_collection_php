@extends('layouts.main')

@section('content')
    <div class="white-box">
        <h4 class="text-center">Payment Report</h4>
        <br>
        {{ Form::open(['route' => 'reports.payments']) }}
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-3">
                    <div class="form-group">
                        {{ Form::label('month', 'Month') }}
                        {{ Form::select('month', $months, '', ['class' => 'form-control', 'required']) }}
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        {{ Form::label('year', 'Year') }}
                        {{ Form::select('year', $years, '', ['class' => 'form-control', 'required']) }}
                    </div>
                </div>
                <div class="col-md-2">
                    <br>
                    {{ Form::button('Submit',['type'=>'submit','class'=>'btn btn-success waves-effect waves-light m-r-10']) }}
                </div>
            </div>
        {{ Form::close() }}

        <hr>

        <div class="table-responsive">
            <table class="table table-striped color-bordered-table success-bordered-table">
                <thead>
                <tr>
                    <th>Shop Owner</th>
                    <th>Shop Name</th>
                    <th>Shop Location / Contact</th>
                    <th>Amount</th>
                    <th>Comment</th>
                </tr>
                </thead>
                <tbody>
                @php $total = 0; @endphp
                @foreach($payments as $payment)
                    @php
                        $total += $payment->amount;
                        $store_owner = \App\StoreOwner::find($payment->shop_owner_id);
                    @endphp
                    <tr>
                        <td>{{ $store_owner->first_name }} {{ $store_owner->last_name }}</td>
                        <td>{{ $store_owner->shop_name }}</td>
                        <td>{{ $store_owner->location }} / {{ $store_owner->contact }}</td>
                        <td>{{ $payment->amount }}</td>
                        <td>{{ $payment->comment }}</td>
                    </tr>
                @endforeach
                <tr>
                    <td><b>Total</b></td>
                    <td></td>
                    <td></td>
                    <td>{{ $total }}</td>
                    <td></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
