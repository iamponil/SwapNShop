@extends('layouts/contentNavbarLayout')

@section('title', 'Tables - Basic Tables')

@section('content')

<!-- Add these lines to include Bootstrap and jQuery -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

<!--/ Basic Bootstrap Table -->
<div class="card">
   
 <div><h5 class="card-header">All Products  <a href="{{ route('products.create') }}" style="margin-left: 1020px ;"> <img  src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAAAXNSR0IArs4c6QAAALNJREFUSEvtltENwjAMRF82YQNGKCOxAXSDjlQ2gA06Ahu0itRKkSIjx7Q4SInkP9t3ebmPBJxOcNKlCf+MfEPtjvpicPAGnto56Y1n7YKk7wGoDVcnrHae3HgX1AbSZSMSarcb/224RqADxKQfhdosXJaUvNssrA1XFIjntNZmYQDOwAu4Jr4mIJb4EdCGa3uqO3BTYOqB2FufsBtqBbWPLeZwNeFvCWTz7bO3O1JpoRvqBaPJLB8biop8AAAAAElFTkSuQmCC" /></a>

 </h5>
     
   </div> 
  <div class="table-responsive text-nowrap">
 
   	@if(isset($listproducts) && count($listproducts) > 0)
  <table class="table">
    <thead>
        <tr>
            <th>Name Product</th>
            <th>price</th>
            <th>Description</th>
            <th>Category</th>
            
            <th>Image</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody class="table-border-bottom-0">
        @foreach($listproducts as $l)
        <tr>
            <td>{{$l->product_name}}</td>
            <td>{{$l->price}}$</td>
            <td>{{$l->description}}</td>
            <td>{{$l->category}}</td>
            
            <td>
                <img src="{{ asset('images/' . $l->image) }}" alt="Product Image" width="100">
            </td>
            <td>
                <div class="dropdown">
                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                    <div class="dropdown-menu">
                     
                        <a href="{{ route('products.edit', ['id' => $l->id]) }}" class="btn btn-link"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                        <button type="button" class="btn btn-link show-product" data-bs-toggle="modal" data-bs-target="#basicModal"
        data-product-name="{{ $l->product_name }}"
        data-product-price="{{ $l->price }}"
        data-product-description="{{ $l->description }}"
        data-product-image="{{ asset('images/' . $l->image) }}">
    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAAAXNSR0IArs4c6QAAAoVJREFUSEvt1l3IzncYB/DP07CUmLdsTSbilKYoNbM1EStvJ0Ro0ZQ2RcnOyYHC1sp7pHBgQ2rEgY1y4EBC2kLCTsQkcSDy0vV03fr1738/7mcHnsRVd93373dd1/d3fa+3u00XSVsX4XoP/MaYfyuo7ou5GIn+GJD0/Id7uIK9eNAKba1EPAarMAvdXuP0KX7DWlzuSLcj4H74GfNrHNzFrTwfgoEVnRfYiRV4WPeAZsB98BdGp9ET7MIfeV51Fvpf4lssQve0O4Nv8LgKXgf8IU5hXCofxFJElK3Ix/nIKal8HFPxvDSuA96POam0PvNb2vTGckTufywor/rdiiV5uDFpf6VTBV6M7Xl7BDMQ+WpIVPZ5fJYHPetozLsP8Ce+yN8R9bGGoxL4I9xERHQNn9cUxjqsLh4yMdPSLAVB+6VsvRsY3qC8BP4Bv6SHyThR4+33bKvG1b/4HifRK/u5aha9vy8PF2JPfC+BI2+bUmEmDtcAh4NwVCdxN6/mYnb2dlxFcL9WgYPqq0lLRDIK9yuOoli2NQH+Lqu5vI7pdhGf4DZG4FEVOH6XUUchRF+WbRAFcxrjK+DR819XCrFaXPHoHXXFFWc9cLYYHBuwsgISw2EZJuSjonK34FmhFykMkGAhJObCV+XD6vr4U5zDoDQ6lAXU6gAJ+905scLFdYytFl6zkTk0qzpyEhIjMyI4mq9vz1MhMdejtaZngQXNIRcwqW7qdbQkYvUF1QtqiulOTqzYVoOLFdlQjbrYjJ86uyRKrJjZ4WBaC2sxmDmANfinSfW3H7eyjxv2QWesyGEZYTASEn8E4vM3Ys7XrsHqIzoD3FEAnb57D9xpyv6vwbtH9UszLnYfuL6nrgAAAABJRU5ErkJggg=="/>
    Show Product
</button>

                         {{-- <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a> --}}
                        <form action="{{ route('products.destroy', ['id'=>$l->id]) }}" method="Post">
                            @csrf
                            @Method('DELETE')
                            <button class="dropdown-item" type="submit" class="btn btn-link"><i class="bx bx-trash me-1"></i> Delete</button>
                        </form>

                    </div>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

	@else
    <p>No products available.</p>
@endif


  </div>
</div>

@endsection
<!-- Modal -->
<div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Product Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col mb-3">
                        <p><strong>Name:</strong> <span id="productName"></span></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-0">
                        <p><strong>Price:</strong> <span id="productPrice"></span></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-0">
                        <p><strong>Description:</strong> <span id="productDescription"></span></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-0">
                        <p><strong>Image:</strong></p>
                        <img id="productImage" src="" alt="Product Image" width="100">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- Include jQuery before your custom JavaScript code -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function () {
        $('.show-product').click(function () {
            
            console.log('Button clicked'); // Add this line
            var productName = $(this).data('product-name');
            var productPrice = $(this).data('product-price');
            var productDescription = $(this).data('product-description');
            var productImage = $(this).data('product-image');

            // Set the modal content with product details
            $('#productName').text(productName);
            $('#productPrice').text(productPrice);
            $('#productDescription').text(productDescription);
            $('#productImage').attr('src', productImage);
        });
    });
</script>

