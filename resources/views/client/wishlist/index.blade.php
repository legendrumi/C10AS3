@extends('client.layouts.app')
@section('title', __('app.wishlist_title') . ' | E-SHOP')

@section('content')
    <div class="container py-5">
        <h2 class="fw-bold mb-4"><i class="bi bi-heart"></i> {{ __('app.wishlist_title') }}</h2>

        @if (count($wishlist) > 0)
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                @foreach ($wishlist as $id => $item)
                    <div class="col">
                        <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
                            @if (isset($item['image']) && $item['image'])
                                <img src="{{ asset('storage/' . $item['image']) }}" class="card-img-top"
                                    alt="{{ $item['name'] }}"style="height: 200px; object-fit: cover;">
                            @else
                                <img src="{{ asset('img/product.jpg') }}" class="w-100">
                            @endif

                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title fs-6 fw-bold mb-2">{{ $item['name'] }}</h5>

                                <div class="mt-auto">
                                    <div class="fw-bold text-success fs-5 mb-3">{{ $item['price'] }} TMT</div>

                                    <div class="d-flex gap-2">
                                        <form action="{{ route('cart.store') }}" method="POST" class="flex-fill">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $id }}">
                                            <button type="submit" class="btn btn-success btn-sm w-100 rounded-pill">
                                                <i class="bi bi-cart-plus"></i> {{ __('app.add_to_cart') }}
                                            </button>
                                        </form>

                                        <form action="{{ route('wishlist.destroy', $id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger btn-sm rounded-pill">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="card border-0 shadow-sm rounded-4 p-4">
                <div class="text-center py-5">
                    <i class="bi bi-heartbreak fs-1 text-muted d-block mb-3"></i>
                    <h5 class="text-muted">{{ __('app.wishlist_empty') }}</h5>
                    <a href="{{ route('home') }}" class="btn btn-success mt-3 fw-bold">{{ __('app.view_products') }}</a>
                </div>
            </div>
        @endif
    </div>
@endsection
