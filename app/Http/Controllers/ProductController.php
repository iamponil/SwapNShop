<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listproducts = \App\Models\Product::all();
           return view('content.Product.products',compact('listproducts'));
    }
/**
     * Display a listing of the resource.
     *
    * @return \Illuminate\Http\Response
    */
   public function affichefront()
   {
       $listproductss = \App\Models\Product::all();
          return view('Template.product',compact('listproductss'));
   }
/**
     * Display a listing of the resource.
     *
    * @return \Illuminate\Http\Response
    */

   public function afficherMesproduits()
{
    // Récupérez les produits de l'utilisateur connecté
    $listproductss = \App\Models\Product::where('user_id', auth()->user()->id)->get();
    
    return view('Template.myproducts', compact('listproductss'));
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Template.addproduct');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    // Validate the input data
    $validatedData = $request->validate([
        'product_name' => 'required|string|max:255',
        'description' => 'required|string',
        'category' => 'required|string|max:255',
        'price' => 'required',
        'order' => 'required',
        'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Assuming it's an image upload
    ], [
        // Custom error messages
        'product_name.required' => 'Product name is required.',
        'price.numeric' => 'Price must be a number.',
        'image.image' => 'The file must be an image.',
        'image.mimes' => 'Only JPEG, PNG, JPG, and GIF files are allowed.',
        'image.max' => 'The image may not be greater than 2MB in size.',
    ]);
        $product=new Product();
        $product->product_name = $validatedData['product_name'];
    $product->description = $validatedData['description'];
    $product->category = $validatedData['category'];
    $product->price = $validatedData['price'];
    $product->order = $validatedData['order'];
    $product->user_id = auth()->user()->id;
// Handle image upload
if ($request->hasFile('image')) {
    $image = $request->file('image');
    $imageName = time() . '.' . $image->getClientOriginalExtension();
    $image->move(public_path('images'), $imageName);
    $product->image = $imageName;
}
        $product->save();
        return redirect('/myproduct');
    }
 /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getMyProducts()
    {
        // Récupérez les produits de l'utilisateur connecté (supposons que vous utilisiez l'authentification de Laravel)
        $user = auth()->user();
        $myProducts = Product::where('user_id', $user->id)->get();

        // Retournez la vue avec les produits de l'utilisateur
        return view('Template.product', ['myProducts' => $myProducts]);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function productDetails($productId)
    {
        // Fetch the product details from the database using the $productId
        $product = Product::find($productId);
    
        // Return the product details view with the product data
        return view('Template.DetailsProduct', ['product' => $product]);
    }
      /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id); // Retrieve the product by ID
        return view('content.Product.Editproduct', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editfront($id)
    {
        $product = Product::findOrFail($id); // Retrieve the product by ID
        return view('Template.editerProduct', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
{
    $product = Product::findOrFail($id);

    // Validate input data (including the image if required)
    $request->validate([
        'product_name' => 'required|string|max:255',
        'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Example image validation
    ]);

    // Update the product details
    $product->update([
        'product_name' => $request->input('product_name'),
        'description' => $request->input('description'),
        'category' => $request->input('category'),
        'price' => $request->input('price'),
        'order' => $request->input('order'),
       
    ]);

    // Handle image upload
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $imageName);

        // Update the product's image field
        $product->image = $imageName;
        $product->save();
    }

    return redirect('/myproduct')->with('success', 'Product updated successfully');
}


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = \App\Models\Product::find($id);
        $product->delete();
        return redirect()->route('products.affiche')
        ->with('success','Module deleted successfully.');;
    }
}
