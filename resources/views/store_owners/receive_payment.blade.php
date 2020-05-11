@extends('layouts.main')

@section('content')
    <div class="white-box">
        <h4 class="text-center">Receive Shop Owner Contribution</h4>
        <br>

        @if(Session::has('fail'))
            <div class="alert alert-danger">
                {{Session::get('fail')}}
            </div>
            <br>
        @endif

        {{ Form::open(['route' => 'store_owners.complete_payment', 'data-toggle' => 'validator']) }}
        {{ Form::hidden('id', $store_owner->id) }}
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('first_name', 'Shop Owner Name') }}
                    {{ Form::text('first_name', ($store_owner->first_name . $store_owner->last_name), ['class' => 'form-control', 'readonly']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('shop_name', 'Shop Name') }}
                    {{ Form::text('shop_name', $store_owner->shop_name, ['class' => 'form-control', 'readonly']) }}
                </div>
                UsersSeeder
                <div class="form-group">
                    {{ Form::label('contact', 'Phone') }}
                    {{ Form::text('contact', $store_owner->contact, ['class' => 'form-control', 'readonly']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('month', 'Month') }}
                    {{ Form::select('month', $months, '', ['class' => 'form-control', 'required']) }}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('shop_type', 'Shop Type') }}
                    @if($store_owner->shop_type == 1)
                        {{ Form::text('shop_type', 'Retail', ['class' => 'form-control', 'readonly']) }}
                    @else
                        {{ Form::text('shop_type', 'Wholesale', ['class' => 'form-control', 'readonly']) }}
                    @endif
                </div>

                <div class="form-group">
                    {{ Form::label('location', 'Shop Location') }}
                    {{ Form::text('location', $store_owner->location, ['class' => 'form-control', 'readonly']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('amount_paid', 'Amount To Pay') }}
                    @if($store_owner->shop_type == 1)
                        {{ Form::number('amount_paid', $settings->retail, ['class' => 'form-control', 'readonly']) }}
                    @else
                        {{ Form::number('amount_paid', $settings->wholesale, ['class' => 'form-control', 'readonly']) }}
                    @endif
                </div>

                <div class="form-group">
                    {{ Form::label('year', 'Year') }}
                    {{ Form::select('year', $years, '', ['class' => 'form-control', 'required']) }}
                </div>
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('comment', 'Comment') }}
            {{ Form::textarea('comment', '', ['class' => 'form-control', 'required']) }}
        </div>

        {{ Form::button('Submit',['type'=>'submit','class'=>'btn btn-success waves-effect waves-light m-r-10']) }}
        {{ Form::button('Cancel',['type'=>'reset','class'=>'btn btn-default waves-effect waves-light']) }}
        {{ Form::close() }}
    </div>
@endsection
