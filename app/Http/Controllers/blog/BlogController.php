<?php

namespace App\Http\Controllers\blog;

use App\Models\blog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{

    public function index()
    {
        $blogs = blog::all();
        notify()->success('Welcome to blog⚡️') ;
        return view('content.blog.blog', compact('blogs'));
    }
    public function indexF()
    {
        $blogs = blog::all();
        return view('Template.blog', compact('blogs'));
    }


    public function create()
    {
        return view('content.blog.Create');
    }


    public function store(Request $request)
    {
        {
          $request->validate([
              'title' => 'required',
              'content' => 'required',
              'picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
          ]);

          $input = $request->all();
          if ($picture = $request->file('picture')) {
              $destinationPath = 'img/';
              $productImage = date('YmdHis') . "." . $picture->getClientOriginalExtension();
              $picture->move($destinationPath, $productImage);
              $input['picture'] = "$productImage";
          }
          $input['user_id'] = Auth::user()->id;
          blog::create($input);
          return redirect()->route('blogg')
              ->with('success','Blog created successfully.');
      }
      }



    public function show(blog $blog)
    {
        return view('content.blog.showB',compact('blog'));
    }


    public function edit(blog $blog)
    {
        return view('content.blog.Update', compact('blog'));
    }


    public function update(Request $request, blog $blog)
    {
        {
            $request->validate([
              'title' => 'required',
              'content' => 'required',
          ]);

          $input = $request->all();
          if ($picture = $request->file('picture')) {
              $destinationPath = 'img/';
              $productImage = date('YmdHis') . "." . $picture->getClientOriginalExtension();
              $picture->move($destinationPath, $productImage);
              $input['picture'] = "$productImage";
          } else {
              unset($input['picture']);
          }
          $input['user_id'] = Auth::user()->id;
          $blog->update($input);
          return redirect()->route('blogg')
              ->with('success','Blog updated successfully.');
          }
    }


    public function destroy(blog $blog)
    {
        $blog->delete();
        return redirect()->route('blogg')
            ->with('success','Blog deleted successfully');
    }
}
