<!DOCTYPE html>
<html lang="en">
<head>
	<title>Add product</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="{{asset('css/util.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/main.css')}}">
	</head>



	<body>
		<h1 style="font-size: 24px; color: #333;  padding: 10px 20px; border: 1px solid #ccc; border-radius: 5px; text-align: center; margin: 10px 0;">Edit Product</h1>
<div class=" size-310 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
      
      <div class="card-body" style="margin-left: 250px">
        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT') <!-- Use the PUT method to update the product -->
        
			
           
          <div class="mb-3">
            <label class="form-label" for="basic-default-fullname">Product Name</label>
            <input type="text" class="form-control" name="product_name" value="{{ $product->product_name }}" style="width: 80%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; background-color: #f5f5f5; font-size: 16px; color: #333;"/>
          </div>
          <div class="mb-3">
            <label class="form-label" for="basic-default-company">Description</label>
            <input type="text" class="form-control" name="description" value="{{ $product->description }}" style="width: 80%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; background-color: #f5f5f5; font-size: 16px; color: #333;" />
          </div>
          <div class="mb-3" >
            <label class="form-label" for="basic-default-email">Category</label>
            
				  <select name="category" class="form-select form-select-lg" style="width: 80%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; background-color: #f5f5f5; font-size: 16px; color: #333;">
                    <option>Select Category</option>
                    <option value="Clothes" @if ($product->category === 'Clothes') selected @endif>Clothes</option>
                    <option value="Electronicique" @if ($product->category === 'Electronicique') selected @endif>Electronicique</option>
                    <option value="Accessory" @if ($product->category === 'Accessory') selected @endif>Accessory</option>
                </select>
          </div>
         
          <div class="mb-3">
            <label class="form-label" for="basic-default-message">price</label>
            <input type="text" class="form-control" name="price" value="{{ $product->price }}"  style="width: 80%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; background-color: #f5f5f5; font-size: 16px; color: #333;"/>  </div>
			<div class="mb-3">
				<label class="form-label" for="basic-default-message">order</label>
				<input type="text" class="form-control" name="order" value="{{ $product->order }}"  style="width: 80%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; background-color: #f5f5f5; font-size: 16px; color: #333;"/>  </div>
			  
			<div class="mb-3">
				<label for="formFileMultiple" class="form-label">Update Image</label>
                <input class="form-control" type="file" name="image" id="formFileMultiple" accept="image/*"  style="width: 80%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; background-color: #f5f5f5; font-size: 16px; color: #333;" multiple>
           
              </div>
			  <br/>
			  <div style="margin-left : 130px">
          <button type="submit" class="stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer" style="width:30% ;">Send</button>
		  <button type="button" class="stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer" style="width:30% ;" onclick="window.location.href='{{ route('myproduct') }}'">Cancel</button>
		</div>
		</form>
      </div>
    </div>



	



</body>
</html>