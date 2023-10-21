@extends('layouts/contentNavbarLayout')

@section('title', ' Vertical Layouts - Forms')

@section('content')
<h4 class="fw-bold py-3 mb-4"> Edit Product</h4>



    <div class="card mb-4">
      
      <div class="card-body">
        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT') <!-- Use the PUT method to update the product -->
        
            <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Product Name</label>
                <input type="text" class="form-control" name="product_name" value="{{ $product->product_name }}" />
            </div>
        
            <div class="mb-3">
                <label class="form-label" for="basic-default-company">Description</label>
                <input type="text" class="form-control" name="description" value="{{ $product->description }}" />
            </div>
        
            <div class="mb-3">
                <label class="form-label" for="basic-default-email">Category</label>
                <select name="category" class="form-select form-select-lg">
                    <option>Select Category</option>
                    <option value="Women" @if ($product->category === 'Women') selected @endif>Women</option>
                    <option value="Men" @if ($product->category === 'Men') selected @endif>Men</option>
                    <option value="Accessory" @if ($product->category === 'Accessory') selected @endif>Accessory</option>
                </select>
            </div>
        
            <div class="mb-3">
                <label class="form-label" for="basic-default-message">Price</label>
                <input type="text" class="form-control" name="price" value="{{ $product->price }}" />
            </div>
        
            <div class="mb-3">
                <label for="formFileMultiple" class="form-label">Update Image</label>
                <input class="form-control" type="file" name="image" id="formFileMultiple" accept="image/*">
            </div>
        
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
        
      </div>
    </div>
 
  

@endsection
