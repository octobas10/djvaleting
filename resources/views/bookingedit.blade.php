@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Booking') }}</div>
                <div class="card-body">
                    {{ Form::open(array('url' => route('bookingupdate'),'method'=>'post')) }}
                    <div class="form-group">
                        <label for="name">{{ __('Name') }}</label>
                        {{ Form::text('name',$booking->name,["placeholder"=>"Enter contact number",'id'=>'name','class'=>'form-control',"required"]) }}
                    </div>
                    <div class="form-group">
                        <label for="email">{{ __('Email') }}</label>
                        {{ Form::email('email',$booking->email,["placeholder"=>"Enter contact number",'id'=>'email','class'=>'form-control',"required"]) }}
                    </div>
                    <div class="form-group">
                        <label for="contact_number">{{ __('Contact number') }}</label>
                        {{ Form::number('contact_number',$booking->contact_number,["placeholder"=>"Enter contact number",'id'=>'contact_number','class'=>'form-control',"required"]) }}
                    </div>

                    <div class="form-group">
                        <label for="booking_date">{{ __('Booking date') }}</label>
                        {{ Form::text('booking_date',$booking->booking_date,["placeholder"=>"MM/DD/YYYY",'id'=>'booking_date','class'=>'form-control',"required"]) }}
                    </div>
                    <div class="form-group">
                        <label for="flexibility">{{ __('Flexibility') }}</label>
                        {{ Form::select('flexibility',config('constants.flexibility'),$booking->flexibility,['id'=>'flexibility','class'=>'form-control',"required"]) }}
                    </div>

                    <div class="form-group">
                        <label for="vehicle_size">{{ __('Vehicle Size') }}</label>
                        {{ Form::select('vehicle_size',config('constants.vehicle_size'), $booking->vehicle_size,['id'=>'vehicle_size','class'=>'form-control',"required"]) }}
                    </div>

                    <div class="form-group">
                        <label for="approval_status">{{ __('Approval status') }}</label>
                        {{ Form::select('approval_status',['0'=>'Pending','1'=>'Arroved'], $booking->approval_status,['id'=>'approval_status','class'=>'form-control',"required"]) }}
                    </div>

                    <br />
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">{{ __('Submit') }}</button>
                    </div>
                    {{ Form::hidden('id',$booking->id,['id'=>'id','name'=>'id']) }}
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
