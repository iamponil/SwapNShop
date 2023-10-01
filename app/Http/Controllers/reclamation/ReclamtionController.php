<?php

namespace App\Http\Controllers\reclamation;

use App\Http\Controllers\Controller;
use App\Models\reclamtion;
use Illuminate\Http\Request;

class ReclamtionController extends Controller
{

  public function index()
  {
       $reclamtions = reclamtion::all();
      return view('content.Reclamation.Reclamation', compact('reclamtions'));
  }

  public function indexh()
  {
       $reclamtions = reclamtion::all();
      return view('Template.historiqueRec', compact('reclamtions'));
  }

  public function create()
  {
    return view('content.Reclamation.createR');
  }


  public function store(Request $request)
  {
    {
      $request->validate([
          'nomRec' => 'required',
          'body' => 'required',
         // 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
      ]);

      $input = $request->all();
      if ($image = $request->file('image')) {
          $destinationPath = 'img/';
          $productImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
          $image->move($destinationPath, $productImage);
          $input['image'] = "$productImage";
      }
      reclamtion::create($input);
      return redirect()->route('reclamation')
          ->with('success','Reclamtion created successfully.');
  }
  }


  public function show(reclamtion $reclamtion)
  {
      //
  }

  public function edit(reclamtion $reclamtion)
  {
    return view('content.Reclamation.updateR', compact('reclamtion'));
  }


  public function update(Request $request, reclamtion $reclamtion)
  {
    $request->validate([
      'nomRec' => 'required',
      'body' => 'required',
  ]);

  $input = $request->all();
  if ($image = $request->file('image')) {
      $destinationPath = 'img/';
      $productImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
      $image->move($destinationPath, $productImage);
      $input['image'] = "$productImage";
  } else {
      unset($input['image']);
  }

  $reclamtion->update($input);
  return redirect()->route('reclamation')
      ->with('success','Reclamtion updated successfully.');
  }


  public function destroy(reclamtion $reclamtion)
  {
    $reclamtion->delete();
    return redirect()->route('reclamation')
        ->with('success','Reclamtion deleted successfully');
  }
}
