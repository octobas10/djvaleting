<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookingsRequest;
use App\Http\Requests\UpdateBookingsRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Http\Response;
use App\Models\Bookings;
use Illuminate\Http\Request;

class BookingsController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBookingsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBookingsRequest $request)
    {
        DB::beginTransaction();
        try {
            $uniqid = Str::random(8);
            $recordStatus = Bookings::create([
                'uniqid' => $uniqid, //\Carbon\Carbon::now()->timestamp,
                'name' => trim($request->name),
                'email' => trim($request->email),
                'contact_number' => trim($request->contact_number),
                'booking_date' => trim($request->booking_date),
                'flexibility' => trim($request->flexibility),
                'vehicle_size' => trim($request->vehicle_size),
                'approval_status' => 0, //default unapproval
            ]);
            if ($recordStatus) {
                DB::commit();
                return redirect()->route('bookingstatus', $uniqid); //->with('status', 'Thank you, your booking has been successfull created, please note booking id we wil give update to you for the confirmation.');;
            } else {
                return redirect(back())->with('error', '');
            }
        } catch (\Illuminate\Database\QueryException $e) {
            DB::rollBack();
            dd($e->getMessage());
            Log::error($e->getMessage());
            return redirect(back())->with('error', '');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bookings  $bookings
     * @return \Illuminate\Http\Response
     */
    public function bookingstatus($id = null)
    {
        if ($id) {
            return view('bookingstatus', ['bookingId' => $id]);
        }
        return redirect()->route('customers');
    }

    public function bookinginfo(Request $request)
    {
        $data = [
            'data' => null,
            'msg' => '',
            'booking_id' => '',
            'bookingsInfo' => null
        ];
        if ($request->isMethod('post')) {
            $bookingId = $request->booking_id;
            $bookingsInfo = Bookings::where('uniqid', $request->booking_id)->first();
            if ($bookingsInfo) {
                $data['data'] = true;
                $data['bookingsInfo'] = $bookingsInfo;
            } else {
                $data['msg'] = "No recourd found.";
            }
            $data['booking_id'] = $bookingId;
        }
        return view('bookinginfo', $data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bookings  $bookings
     * @return \Illuminate\Http\Response
     */
    public function bookingdelete($id = null)
    {
        try {
            if (Bookings::find($id)->forceDelete()) {
                return redirect()->route('home')->with('msg', "Record has been successfully deleted");
            }
            return redirect()->route('home')->with('msg', 'Oops something went worong');
        } catch (\Exception $e) {
        }
    }
}
