@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <table class="table table-bordered table-hover">
            <thead>
                <th>{{ __('Booking ID') }}</th>
                <th>{{ __('Customer Name') }}</th>
                <th>{{ __('Email') }}</th>
                <th>{{ __('Phone Number') }}</th>
                <th>{{ __('Booking Date') }}</th>
                <th>{{ __('Flexibility') }}</th>
                <th>{{ __('Vehicle size') }}</th>
                <th>{{ __('Booking Status') }}</th>
                <th>{{ __('Action') }}</th>
            </thead>
            <tbody>
                @if($bookings->count() == 0)
                    <tr>
                        <td colspan="5">{{ __('No products to display.') }}</td>
                    </tr>
                @endif

                @foreach($bookings as $b)
                    <tr>
                        <td>{{ $b->uniqid }}</td>
                        <td>{{ $b->name }}</td>
                        <td>{{ $b->email }}</td>
                        <td>{{ $b->contact_number }}</td>
                        <td>{{ $b->booking_date }}</td>
                        <td>{{ $b->flexibility }}</td>
                        <td>{{ $b->vehicle_size }}</td>
                        <td>
                            @if($b->approval_status)
                                <input type="button" disabled value="Approved" class="btn btn-sm btn-success" />
                            @else
                                <input type="button" disabled value="Pending" class="btn btn-sm btn-warning" />
                            @endif
                        </td>

                        <td>
                            <a class="btn btn-sm btn-success"
                                href="{{ route('bookingedit', $b->id) }}">{{ __('Edit') }}</a>
                            <a href="{{ route('bookingdelete', $b->id) }}"
                                class="btn btn-sm btn-danger">{{ __('Delete') }}</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $bookings->links() }}

        <p>
            {{ __('Displaying') }} {{ $bookings->count() }} of {{ $bookings->total() }}
            booking(s).
        </p>

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
    </div>
</div>
@endsection
