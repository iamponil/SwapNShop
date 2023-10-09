<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::all();
        $events = $events->map(function ($event) {
            $event->location = json_decode($event->location, true); // Convert JSON string to an array
            return $event;
        });
        return view('event.list', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('event.add');
    }

    public function form($id)
    {
        return view('event.add', compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $e = new Event();
        $e->title = $request->title;
        $e->description = $request->description;
        //$e->location=$request->location;

        $latitude = $request->input('latitude');
        $longitude = $request->input('longitude');
        // Create a JSON object with latitude and longitude
        $location = [
            'latitude' => $request->latitude,
            'longitude' => $request->longitude
        ];

        $e->location = json_encode($location); // Convert the array to JSON

        $e->date_time = $request->date_time;
        $e->community_id = $request->id;
        $e->save();
        return redirect('/event');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Event $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Event $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Event $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Event $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        //
    }
}
