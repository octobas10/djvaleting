<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookingsRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Bookings;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['bookings'] = Bookings::paginate(50);
        return view('home', $data);
    }

    public function newbooking()
    {
        return view('newbooking');
    }

    public function newbookingcreate(StoreBookingsRequest $request)
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
                return redirect()->route('home')->with('msg', 'New booking has been successfull created.');
            }
        } catch (\Illuminate\Database\QueryException $e) {
            DB::rollBack();
            Log::error($e->getMessage());
        }
        return redirect()->route('home')->with('error', 'Opps something went wrong');
    }

    public function bookingedit($id)
    {
        try {
            $booking = Bookings::find($id);
            if ($booking) {
                return view('bookingedit', ['booking' => $booking]);
            }
        } catch (\Illuminate\Database\QueryException $e) {
            DB::rollBack();
            Log::error($e->getMessage());
        }
        return redirect()->route('home')->with('error', 'Opps something went wrong');
    }

    public function bookingupdate(Request $request)
    {
        try {
            $booking = Bookings::find($request->id);
            $booking->name = trim($request->name);
            $booking->email = trim($request->email);
            $booking->contact_number = trim($request->contact_number);
            $booking->booking_date = trim($request->booking_date);
            $booking->flexibility = trim($request->flexibility);
            $booking->vehicle_size = trim($request->vehicle_size);
            $booking->approval_status = $request->approval_status;
            if ($booking->save()) {
                return redirect()->route('home')->with('msg', 'Booking has been successfull updated.');
            }
        } catch (\Illuminate\Database\QueryException $e) {
            DB::rollBack();
            Log::error($e->getMessage());
        }
        return redirect()->route('home')->with('error', 'Opps something went wrong');
    }
}
