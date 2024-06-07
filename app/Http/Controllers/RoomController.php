<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;

class RoomController extends Controller
{
    /**
     * Store a newly created room in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'description' => 'required|string',
            'price' => 'required|numeric',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Assuming maximum file size is 2MB
        ]);
        

        // Create a new room instance
        $room = new Room();
        $room->description = $validatedData['description'];
        $room->price = $validatedData['price'];

        // Upload and store room images
        if ($request->hasFile('images')) {
            $images = [];
            foreach ($request->file('images') as $image) {
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->storeAs('public/room_images', $imageName);
                $images[] = $imageName;
            }
            $room->images = $images;
        }

        // Save the room to the database
        $room->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Room created successfully!');
    }

    public function showReservations()
{
    // Logic to fetch reservations data goes here...

    // If there's a status message to display, set the $status variable
    $status = session('status');

    // Render the reservations view and pass the $status variable to the view
    return view('reservations', compact('reservations', 'status'));
}
}
