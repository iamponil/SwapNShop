<?php

namespace App\Http\Controllers;

use App\Models\blog;
use App\Models\Community;
use App\Models\Event;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
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
    $response = Http::get('http://localhost:8089/community/all');
    if ($response->successful()) {
      $communities = $response->json();
      return view('community.list', compact('communities'));
    } else {
      return view('error');
    }
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
  public function storeApi(Request $request)
  {
    $request->validate([
      'name' => 'required',
      'description' => 'required',
    ]);

    $data = [
      'name' => $request->input('name'),
      'description' => $request->input('description'),
    ];

    $response = Http::post('http://localhost:8089/community/add', $data);

    if ($response->successful()) {
      return redirect('/community');
    } else {
      return redirect('/community/create')->with('error', 'Community creation failed');
    }
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
  public function getById(int $community)
  {
    //dd($community);
    $response = Http::get('http://localhost:8089/community/'.$community);
    if ($response->successful()) {
      $community = $response->json();
      return view('community.detail',compact('community'));
    } else {
      return view('error');
    }
  }
  public function delete(int $community)
  {
    $response = Http::delete('http://localhost:8089/community/'.$community);
    if ($response->successful()) {
      return redirect('/community');
    } else {
      return view('error');
    }
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
  public function editForm(int $id)
  {
    $response = Http::get('http://localhost:8089/community/'.$id);
    if ($response->successful()) {
      $community = $response->json();
      return view('community.edit', compact('community'));
    }else{
      return view('community.edit');
    }
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
  public function updateApi(Request $request, int $community)
  {
    $request->validate([
      'name' => 'required',
      'description' => 'required',
    ]);
    $data = [
      'name' => $request->input('name'),
      'description' => $request->input('description'),
    ];

    $response = Http::put('http://localhost:8089/community/'.$community, $data);
    if ($response->successful()) {
      return redirect('/community');
    } else {
      return redirect('/community/edit')->with('error', 'Community update failed');
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
  public function leave(Community $community)
  {
    $previousURL = URL::previous();
    $user = Auth::user();
    if ($community->members()->contains($user)) {
      $community->attendees()->detach($user);
    }
    return redirect($previousURL);
  }
  public function myCommunities(){
    $communities = Community::where('creator_id',Auth::user()->id)->get();
    return view('community.myCommunities',compact('communities'));
  }
}
