<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Service_Feature;
use App\Models\Service;
use Illuminate\Http\Request;

class BookingController extends Controller
{

    public function booking($slug)
    {
        $service = Service::with('features')->where('status', 'a')->where('slug', $slug)->firstOrFail();
        return view("website.booking", compact('service'));
    }

    public function store(Request $request)
{
    // Validate the incoming request 
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'required|string|max:20',
        'address' => 'required|string',
        'booking_type' => 'required|string',
        'booking_for' => 'required|integer',
        'booking_person' => 'required|string',
        'booking_date' => 'required|date',
        'booking_time' => 'required',
    ]);

    // Create the booking
    Booking::create([
        'name' => $validatedData['name'],
        'email' => $validatedData['email'],
        'phone' => $validatedData['phone'],
        'address' => $validatedData['address'],
        'booking_type' => $validatedData['booking_type'],
        'booking_for' => $validatedData['booking_for'],
        'booking_person' => $validatedData['booking_person'],
        'boking_date' => $validatedData['booking_date'],
        'boking_time' => $validatedData['booking_time'],
    ]);

    // Redirect or return success response
    return redirect()->back()->with('success', 'Booking successfully submitted!');
}

    
    public function bookingList(){
      $bookings = Booking::with('feature')->latest()->get();
        return view('admin.booking_list', compact('bookings'));
    }

    public function edit($id)
    {
        $booking = Booking::findOrFail($id);
        $features = Service_Feature::all(); 
        $services = Service::all(); 
    
        return view('admin.booking_edit', compact('booking', 'features', 'services'));
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:15',
            'address' => 'required|string',
            'booking_type' => 'required|string',
            'boking_date' => 'required|date',
            'boking_time' => 'required',
        ]);
    
        $booking = Booking::findOrFail($id);
        $booking->update($request->all());
    
        return redirect()->route('bookingList')->with('success', 'Booking updated successfully.');
    }
    

  public function delete($id)
    {
        $booking = Booking::findOrFail($id);

        $booking->delete(); 

        return back()->with('success', 'Booking deleted successfully');
    }


    public function getFeaturesByService($service_id)
{
    $features = Service_Feature::where('service_id', $service_id)->get();
    return response()->json($features);
}

}
