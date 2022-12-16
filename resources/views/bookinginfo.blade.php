@extends('web')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Booking Information') }}</div>
                <div class="card-body">
                    {{ Form::open(array('url' => route('bookinginfo'),'method'=>'post')) }}
                    <div class="form-group">
                        <label for="name">{{ __('Booking Id') }}</label>
                        {{ Form::text('booking_id',$booking_id,["placeholder"=>"Enter your booking Id",'id'=>'booking_id','class'=>'form-control',"required"]) }}
                    </div>
                    <br />
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">{{ __('Submit') }}</button>
                    </div>
                    {{ Form::close() }}
                    <br />

                    @if($bookingsInfo)
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th width="20%">Booking Id</th>
                                    <td>{{ $bookingsInfo->uniqid }}</td>
                                </tr>
                                <tr>
                                    <th width="20%">Customer name</th>
                                    <td>{{ $bookingsInfo->name }}</td>
                                </tr>
                                <tr>
                                    <th width="20%">Contact number</th>
                                    <td>{{ $bookingsInfo->contact_number }}</td>
                                </tr>
                                <tr>
                                    <th width="20%">Email</th>
                                    <td>{{ $bookingsInfo->email }}</td>
                                </tr>
                                <tr>
                                    <th width="20%">Booking date</th>
                                    <td>{{ $bookingsInfo->booking_date }}</td>
                                </tr>
                                <tr>
                                    <th width="20%">Flexibility</th>
                                    <td>{{ $bookingsInfo->flexibility }}</td>
                                </tr>
                                <tr>
                                    <th width="20%">Contact_number</th>
                                    <td>{{ $bookingsInfo->vehicle_size }}</td>
                                </tr>
                                <tr>
                                    <th width="20%">Approval status</th>
                                    <td>

                                        @if($bookingsInfo->approval_status)
                                            <input type="button" disabled value="Approved"
                                                class="btn btn-sm btn-success" />
                                        @else
                                            <input type="button" disabled value="Pending"
                                                class="btn btn-sm btn-warning" />
                                        @endif
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    @else
                        @if($msg)
                            <div class="alert alert-danger">
                                <ul>
                                    <li>{{ $msg }}</li>
                                </ul>
                            </div>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
