<?php

namespace App\Http\Controllers;

use App\Models\Community;
use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

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
    $e->creator_id=Auth::user()->id;

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
    $user = Auth::user();
    $e->attendees()->attach($user);
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
    $event->location = json_decode($event->location, true);
    //$event->date_time = Carbon::parse($event->date_time)->format('d M, Y H:i');
    return view('event.show', compact('event'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param \App\Models\Event $event
   * @return \Illuminate\Http\Response
   */
  public function edit(Event $event)
  {
    $event->location = json_decode($event->location, true);
    return view('event.edit', compact('event'));
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
    $e = Event::find($event->id);
    if (!$e) {
      return redirect()->route('event.list');
    }
    $e->title = $request->input('title');
    $e->description = $request->input('description');
    $e->date_time = $request->input('date_time');
    $latitude = $request->input('latitude');
    $longitude = $request->input('longitude');
    // Create a JSON object with latitude and longitude
    $location = [
      'latitude' => $request->latitude,
      'longitude' => $request->longitude
    ];

    $e->location = json_encode($location); // Convert the array to JSON
    //$c->creator_id=1;
    $e->save();
    return redirect('/event');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param \App\Models\Event $event
   * @return \Illuminate\Http\Response
   */
  public function destroy(Event $event)
  {
    $c=Event::find($event->id);
    $c->delete();
    return redirect('/event');
  }
}
