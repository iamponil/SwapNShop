<?php

namespace App\Http\Controllers;

use App\Models\blog;
use App\Models\Community;
use App\Models\Event;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

class CommunityController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
   */
  public function index()
  {
    //$comms = Community::factory()->count(10)->create();
    //$c = Community::factory()->create();

    $communities=Community::all();
    return view('community.list',compact('communities'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
   */
  public function create()
  {
    return view('community.add');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
   */
  public function store(Request $request)
  {
    $request->validate([
      'name' => 'required',
      'description' => 'required',
    ]);
    $community=new Community();
    $community->name=$request->name;
    $community->description=$request->description;
    $community->creator_id=Auth::user()->id;
    $community->save();
    $user = Auth::user();
    $community->members()->attach($user);
    return redirect('/community');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Community  $community
   * @return \Illuminate\Http\Response
   */
  public function show(Community $community)
  {
    $events = Event::where('community_id',$community->id)
      ->where('date_time', '>', now())
      ->orderBy('date_time', 'asc')
      ->take(3)->get();
    $events = $events->map(function ($event) {
      $event->location = json_decode($event->location, true); // Convert JSON string to an array
      return $event;
    });
    $products = Product::whereIn('user_id', $community->members->pluck('id'))->get();
    $blogs = blog::whereIn('user_id', $community->members->pluck('id'))->inRandomOrder()->take(6)->get();
    return view('community.detail',compact('products','blogs' , 'community', 'events'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Community  $community
   * @return \Illuminate\Http\Response
   */
  public function edit(Community $community)
  {
    return view('community.edit',compact('community'));
  }

  public function editAdmin(Community $community)
  {
    return view('community.editAdmin',compact('community'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Community  $community
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Community $community)
  {
    $request->validate([
      'name' => 'required',
      'description' => 'required',
    ]);
    $c = Community::find($community->id);
    if (!$c) {
      return redirect()->route('community.list');
    }
    $c->name=$request->input('name');
    $c->description=$request->input('description');
    $c->save();
    $previousURL = URL::previous();
    if (Str::contains($previousURL, '/communities/')) {
      return redirect('/communities');
    } else {
      return redirect('/community');
    }
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Community  $community
   * @return \Illuminate\Http\Response
   */
  public function destroy(Community $community)
  {
    $c=Community::find($community->id);
    $c->delete();
    $previousURL = URL::previous();
    if (Str::contains($previousURL, '/communities')) {
      return redirect('/communities');
    } else {
      return redirect('/community');
    }
  }
  public function join(Community $community)
  {
    $user = Auth::user();
    //$user = User::find(1);
    if (!$community->members->contains($user)) {
      $community->members()->attach($user);
    }
    //return redirect()->route('community.show', ['community' => $community])
    //  ->with('success', 'You have successfully joined the community.');
    //return redirect('/community');
    $previousURL = URL::previous();
    if (Str::contains($previousURL, '/event')) {
      return redirect('/event');
    } else {
      return redirect('/community');
    }
  }
  public function indexAdmin(){
    $communities=Community::all();
    return view('community.listAdmin',compact('communities'));
  }
}
