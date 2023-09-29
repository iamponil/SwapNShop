@extends('layouts/contentNavbarLayout')

@section('title', ' Vertical Layouts - Forms')

@section('content')
<h4 class="fw-bold py-3 mb-4"> Add Product</h4>



    <div class="card mb-4">
      
      <div class="card-body">
        <form action="{{ route('products.store') }}" method="Post" enctype="multipart/form-data">
            @csrf
          <div class="mb-3">
            <label class="form-label" for="basic-default-fullname">Product Name</label>
            <input type="text" class="form-control" name="product_name" />
          </div>
          <div class="mb-3">
            <label class="form-label" for="basic-default-company">Description</label>
            <input type="text" class="form-control" name="description" />
          </div>
          <div class="mb-3">
            <label class="form-label" for="basic-default-email">Category</label>
            
               
                
                  <select name="category" class="form-select form-select-lg">
                    <option>Select Category</option>
                    <option value="Women">Women</option>
                    <option value="Men">Men</option>
                    <option value="Accessory">Accessory</option>
                  </select>
                
           
          </div>
         
          <div class="mb-3">
            <label class="form-label" for="basic-default-message">price</label>
            <input type="text" class="form-control" name="price"  />  </div>
            <div class="mb-3">
                <label for="formFileMultiple" class="form-label">Multiple files input example</label>
                <input class="form-control" type="file" name="image" id="formFileMultiple" multiple>
              </div>
          <button type="submit" class="btn btn-primary">Send</button>
        </form>
      </div>
    </div>
 
  

@endsection
