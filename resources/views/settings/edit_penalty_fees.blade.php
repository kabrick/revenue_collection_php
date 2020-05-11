@extends('layouts.main')

@section('content')
    <div class="white-box">
        <h4 class="text-center">Edit Penalty Fees</h4>
        <br>

        @if(Session::has('fail'))
            <div class="alert alert-danger">
                {{Session::get('fail')}}
            </div>
            <br>
        @endif

        @if(Session::has('success'))
            <div class="alert alert-success">
                {{Session::get('success')}}
            </div>
            <br>
        @endif

        {{ Form::open(['route' => 'settings.save_penalty_fees', 'data-toggle' => 'validator']) }}
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('penalty', 'Penalty Fees') }}
                    {{ Form::number('penalty', $settings->penalty, ['class' => 'form-control', 'required']) }}
                </div>
            </div>
            <div class="col-md-6"></div>
        </div>

        {{ Form::button('Submit',['type'=>'submit','class'=>'btn btn-success waves-effect waves-light m-r-10']) }}
        {{ Form::button('Cancel',['type'=>'reset','class'=>'btn btn-default waves-effect waves-light']) }}
        {{ Form::close() }}
    </div>
@endsection
