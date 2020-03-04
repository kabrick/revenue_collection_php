@extends('layouts.main')

@section('content')
    <div class="white-box">
        <h4 class="text-center">Create Shop Owner Details</h4>
        <br>

        @if(Session::has('fail'))
            <div class="alert alert-danger">
                {{Session::get('fail')}}
            </div>
            <br>
        @endif

        {{ Form::open(['route' => 'store_owners.save', 'data-toggle' => 'validator']) }}
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('first_name', 'First Name') }}
                    {{ Form::text('first_name', '', ['class' => 'form-control', 'required']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('shop_name', 'Shop Name') }}
                    {{ Form::text('shop_name', '', ['class' => 'form-control', 'required']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('shop_type', 'Shop Type') }}
                    {{ Form::select('shop_type', [0 => '--select--', 1 => 'Retail', 2 => 'Wholesale'], '', ['class' => 'form-control', 'required']) }}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('last_name', 'Last Name') }}
                    {{ Form::text('last_name', '', ['class' => 'form-control', 'required']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('location', 'Shop Location') }}
                    {{ Form::text('location', '', ['class' => 'form-control', 'required']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('contact', 'Phone') }}
                    {{ Form::text('contact', '', ['class' => 'form-control', 'required']) }}
                </div>
            </div>
        </div>

        {{ Form::button('Submit',['type'=>'submit','class'=>'btn btn-success waves-effect waves-light m-r-10']) }}
        {{ Form::button('Cancel',['type'=>'reset','class'=>'btn btn-default waves-effect waves-light']) }}
        {{ Form::close() }}
    </div>
@endsection
