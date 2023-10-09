<?php

namespace App\Http\Controllers;

use App\Models\Community;
use App\Models\User;
use Illuminate\Http\Request;

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
    $community=new Community();
    $community->name=$request->name;
    $community->description=$request->description;
    $community->creator_id=1;
    $community->save();
    //$user = Auth::user();
    $user = User::find(2);
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
    return view('community.detail',compact('community'));
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

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Community  $community
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Community $community)
  {
    $c = Community::find($community->id);
    if (!$c) {
      return redirect()->route('community.list');
    }
    $c->name=$request->input('name');
    $c->description=$request->input('description');
    //$c->creator_id=1;
    $c->save();
    return redirect('/community');
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
    return redirect('/community');
  }
  public function join(Community $community)
  {
    //$user = Auth::user();
    $user = User::find(1);
    if (!$community->members->contains($user)) {
      $community->members()->attach($user);
    }
    //return redirect()->route('community.show', ['community' => $community])
    //  ->with('success', 'You have successfully joined the community.');
    return redirect('/community');
  }
}
