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
    <!-- PRODUCT -->
    <section class="section-pagetop ">
        <div class="container clearfix">
            <h2 class="title-page">{{ $product->name }}</h2>
        </div>
    </section>
    <section class="section-content bg padding-y border-top" id="site">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    @if (Session::has('message'))
                    <p class="alert alert-success">{{ Session::get('message') }}</p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="row no-gutters">
                            <aside class="col-sm-5 border-right">
                                <article class="gallery-wrap">

                                    <div class="img-big-wrap">
                                        <div>
                                            <a href="#" data-fancybox=""><img src="{{ $product->product_image ? asset('storage/products/'.$product->product_image) : asset('assets/img/products/default.webp') }}"></a>
                                        </div>
                                    </div>

                                </article>
                            </aside>
                            <aside class="col-sm-7">
                                <article class="p-5">
                                    <h3 class="title mb-3">{{ $product->name }}</h3>
                                    <dl class="row">
                                        <dt class="col-sm-3">Size: </dt>
                                        <dd class="col-sm-9">
                                            <select name="category_id" id="category_id" class="form-select @error('category_id') is-invalid @enderror" readonly>
                                                @foreach ($units as $unit)
                                                <option value="{{ $unit->id }}" selected>
                                                    {{ $unit->name }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </dd>
                                        <dt class="col-sm-3">Color: </dt>
                                        <dd class="col-sm-9">{{ $product->color }}</dd>
                                    </dl>
                                    <div class="mb-3">
                                        <var class="price h3 text-success">
                                            <span class="currency">₱</span><span class="num" id="productPrice">{{ $product->selling_price }}</span>
                                        </var>
                                    </div>
                                    <hr>
                                    <form action="{{ route('reseller.resellerAddCartItem') }}" method="POST" role="form" id="addToCart">
                                        @csrf
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <dl class="dlist-inline">
                                                    <dt>Quantity: </dt>
                                                    <dd>
                                                        <input class="form-control" type="number" min="1" value="1" max="{{ $product->quantity }}" name="qty" style="width:70px;">
                                                        <input type="hidden" name="id" value="{{ $product->id }}">
                                                        <input type="hidden" name="name" value="{{ $product->name }}">
                                                        <input type="hidden" name="selling_price" value="{{ $product->selling_price }}">
                                                    </dd>
                                                </dl>
                                            </div>
                                        </div>
                                        <hr>
                                        <button type="submit" class="btn btn-success"><i class="fas fa-shopping-cart"></i> Add To Cart</button>
                                    </form>
                                </article>
                            </aside>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <article class="card mt-4">
                        <div class="card-body">

                            <b>Description: </b>

                            {!! $product->notes !!}

                            <br>
                            <br>

                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </section>
    <!-- PRODUCT -->
</main>
@endsection

@pushonce('page-scripts')
<script src="{{ asset('assets/js/img-preview.js') }}"></script>
@endpushonce