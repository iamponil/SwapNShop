<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\BlogCommentaire;
use App\Models\blog;
use Illuminate\Http\Request;

class BlogCommentaireController extends Controller
{

    public function index()
    {
      $comment = BlogCommentaire::all();
      notify()->success('Welcome to blog Commentaire⚡️') ;
      return view('content.BlogCommentaire.BlogCommentaire', compact('comment'));
    }
    public function indexF()
    {
        $comment = BlogCommentaire::all();
     
        return view('content.BlogCommentaire.BlogCommentaire', compact('comment'));
    }


    public function create()
    {
      return view('content.BlogCommentaire.createBC');
    }


    public function store(Request $request)
    {
      {
        $request->validate([
            'comment' => 'required',
            'blog_id' => 'required', 

        ]);
        $user = auth()->user(); // Récupérer l'utilisateur authentifié
        BlogCommentaire::create([

          'comment' => $request->input('comment'),
          'user_id' => $user->id,
          'blog_id' => $request->input('blog_id')
        

      ]);
        return redirect()->route('commentss')
            ->with('success','BlogCommentaire created successfully.');
    }

    }


    public function show(BlogCommentaire $blogCommentaire)
    {
      return view('content.BlogCommentaire.showC',compact('blogCommentaire'));
    }



    public function destroy(BlogCommentaire $blogCommentaire)
    {
      $blogCommentaire->delete();
      return redirect()->route('commentss')
          ->with('success','Comment deleted successfully');
    }
    public function destroyF(BlogCommentaire $blogCommentaire)
    {
      $blogCommentaire->delete();
      return redirect()->route('commentss')
          ->with('success','Comment deleted successfully');
    }


    public function showCommentFormBlog($blogId)
    {
        $blogCommentaire = blog::findOrFail($blogId);
        return view('content.BlogCommentaire.createBC', compact('blogCommentaire'));
    }

    public function storeCommentBlog(Request $request, $blogId)
    {
        $blogCommentaire = blog::findOrFail($blogId);
        $comment = new BlogCommentaire([
            'comment' => $request->input('comment'),
            'user_id' => auth()->user()->id, // Assurez-vous que l'utilisateur est authentifié

        ]);

        $blogCommentaire->commentsss()->save($comment);

        return redirect()->route('commentss', $blogId); // Redirigez l'utilisateur vers la page de la réclamation
    }
    public function showCommentFormBlogF($blogId)
    {
        $blogCommentairee = blog::findOrFail($blogId);
        return view('Template.blog-detail', compact('blogCommentairee'));
    }

    public function storeCommentBlogF(Request $request, $blogId)
    {
        $blogCommentairee = blog::findOrFail($blogId);
        $comment = new BlogCommentaire([
            'comment' => $request->input('comment'),
            'user_id' => auth()->user()->id, // Assurez-vous que l'utilisateur est authentifié

        ]);

        $blogCommentairee->commentsss()->save($comment);

        return redirect()->route('blog-detail', $blogId); // Redirigez l'utilisateur vers la page de la réclamation
    }
    public function showCommentsF($blogId)
{
    $blogCommentairee = blog::findOrFail($blogId);
    $comments = $blogCommentairee->commentsss; // Récupérez les commentaires de la réclamation
    $comments = $blogCommentairee->commentsss()->with('blog')->get(); // Chargez l'utilisateur associé à chaque commentaire
    return view('Template.blog-detail', compact('blogCommentairee', 'comments'));
}
}
