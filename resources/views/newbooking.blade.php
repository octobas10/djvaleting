@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create New Booking') }}</div>
                <div class="card-body">
                    {{ Form::open(array('url' => route('newbookingcreate'),'method'=>'post')) }}
                    <div class="form-group">
                        <label for="name">{{ __('Name') }}</label>
                        {{ Form::text('name',old('name'),["placeholder"=>"Enter contact number",'id'=>'name','class'=>'form-control',"required"]) }}
                    </div>
                    <div class="form-group">
                        <label for="email">{{ __('Email') }}</label>
                        {{ Form::email('email',old('email'),["placeholder"=>"Enter contact number",'id'=>'email','class'=>'form-control',"required"]) }}
                    </div>
                    <div class="form-group">
                        <label for="contact_number">{{ __('Contact number') }}</label>
                        {{ Form::number('contact_number',old('contact_number'),["placeholder"=>"Enter contact number",'id'=>'contact_number','class'=>'form-control',"required"]) }}
                    </div>

                    <div class="form-group">
                        <label for="booking_date">{{ __('Booking date') }}</label>
                        {{ Form::text('booking_date',old('booking_date'),["placeholder"=>"MM/DD/YYYY",'id'=>'booking_date','class'=>'form-control',"required"]) }}
                    </div>
                    <div class="form-group">
                        <label for="flexibility">{{ __('Flexibility') }}</label>
                        {{ Form::select('flexibility',config('constants.flexibility'),old('flexibility'),['id'=>'flexibility','class'=>'form-control',"required"]) }}
                    </div>

                    <div class="form-group">
                        <label for="vehicle_size">{{ __('Vehicle Size') }}</label>
                        {{ Form::select('vehicle_size',config('constants.vehicle_size'), old('vehicle_size'),['id'=>'vehicle_size','class'=>'form-control',"required"]) }}
                    </div>

                    <br />
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">{{ __('Submit') }}</button>
                    </div>
                    {{ Form::close() }}
                    <br />
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@if(session('msg'))
    <div class="alert alert-success" role="alert">
        {{ session('msg') }}
    </div>
@endif
@if(session('error'))
    <div class="alert alert-danger" role="alert">
        {{ session('error') }}
    </div>
@endif

@endsection
