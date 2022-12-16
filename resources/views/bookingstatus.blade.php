@extends('web')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Booking Status') }}</div>
                <div class="card-body">
                    <div class="text-center">
                        <p>BOOKING ID: <b>{{ $bookingId }}</b> <br /></p>
                    </div>
                    <div class="alert alert-success text-center">
                        <p>
                            Thank you, your booking has been successfull created, <br />
                            please note "BOOKING ID" we will give approval confirmation.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
