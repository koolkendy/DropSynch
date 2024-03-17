@extends('layouts.reseller-dashboard')

@section('content')
<aside class="col-md-3">

    <div class="card">
        <article class="filter-group">
            <header class="card-header">
                <a href="#" data-toggle="collapse" data-target="#collapse_1" aria-expanded="true" class="">
                    <i class="icon-control fa fa-chevron-down"></i>
                    <h6 class="title">Categories</h6>
                </a>
            </header>
            <div class="filter-content collapse show" id="collapse_1" style="">
                <div class="card-body">
                    <ul class="list-menu">
                        <li><a href="{{ url('reseller/dashboard') }}">All</a></li>
                        @foreach($categories as $category)
                        <li><a href="{{ url('reseller/dashboard', ['slug' => $category->slug]) }}">{{ $category->name }}</a></li>
                        @endforeach
                    </ul>

                </div> <!-- card-body.// -->
            </div>
        </article> <!-- filter-group  .// -->


    </div> <!-- card.// -->

</aside>

<main class="col-md-9">
    <header class="border-bottom mb-4 pb-3">
        <div>
            <h4>{{$categoryTitle}}</h4>
        </div>
        <div class="form-inline">
            <p class="mr-md-auto">{{count($products) > 0 ? count($products) : "No"}} Item(s) found </p>
            <select class="mr-2 form-control">
                <option>Latest items</option>
                <option>Trending</option>
                <option>Most Popular</option>
                <option>Cheapest</option>
            </select>
            <div class="btn-group">
                <a href="#" class="btn btn-outline-secondary" data-toggle="tooltip" title="" data-original-title="List view">
                    <i class="fa fa-bars"></i></a>
                <a href="#" class="btn  btn-outline-secondary active" data-toggle="tooltip" title="" data-original-title="Grid view">
                    <i class="fa fa-th"></i></a>
            </div>
        </div>
    </header><!-- sect-heading -->

    <div class="row">

        @foreach($products as $product)
        <div class="col-md-4">
            <figure class="card card-product-grid">

                <div class="img-wrap" style="text-align: center;">
                    {{--- <span class="badge badge-danger"> NEW </span> ---}}
                    <img style="max-height: 200px;" src="{{ $product->product_image ? asset('storage/products/'.$product->product_image) : asset('assets/img/products/default.webp') }}" class="img-fluid">


                    <a class="btn-overlay" href="{{ url('reseller/product', ['slug' => $product->slug]) }}"><i class="fa fa-search-plus"></i> Quick view</a>
                </div> <!-- img-wrap.// -->


                <figcaption class="info-wrap">

                    <div class="fix-height">
                        <a href="{{ url('reseller/product', ['slug' => $product->slug]) }}" class="title">{{$product->name}}</a>
                        <div class="price-wrap mt-2">
                            <span class="price">₱ {{$product->selling_price}}</span>

                            <span class="price-old">| Qty: {{$product->quantity}}</span>
                        </div> <!-- price-wrap.// -->
                    </div>

                    <a href="{{ url('reseller/product', ['slug' => $product->slug]) }}" class="btn btn-block btn-primary">View Details</a>
                </figcaption>
            </figure>
        </div> <!-- col.// -->
        @endforeach

    </div> <!-- row end.// -->

    <nav class="mt-4" aria-label="Page navigation sample">
        <ul class="pagination">
            <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
            <li class="page-item active"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">Next</a></li>
        </ul>
    </nav>
</main>
@endsection

@pushonce('page-scripts')
<script src="{{ asset('assets/js/img-preview.js') }}"></script>
@endpushonce