@extends('client.layouts.app')

@section('content')
    <div class="container py-5">
        <div class="row g-4 align-items-center">
            <div class="col-md-5">
                <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                    @if ($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}"
                            style="height: 200px; object-fit: cover;">
                    @else
                        <img src="{{ asset('img/product.jpg') }}" class="w-100">
                    @endif
                </div>
            </div>

            <div class="col-md-7">
                <span class="badge bg-secondary mb-2">{{ $product->category->name ?? __('app.no_category') }}</span>
                <h1 class="fw-bold text-dark mb-2">{{ $product->name }}</h1>

                <p class="text-muted mb-3">{{ __('app.brand_label') }}: <strong
                        class="text-dark">{{ $product->brand->name ?? __('app.none') }}</strong> |
                    {{ __('app.code_label') }}: <strong class="text-dark">{{ $product->code }}</strong></p>

                <div class="mb-4">
                    @if ($product->discount > 0)
                        <span class="text-danger fw-bold fs-4 me-2">-{{ $product->discount }}%</span>
                    @endif
                    <span class="text-success fw-bold fs-3">{{ $product->price }} TMT</span>
                </div>

                <p class="text-secondary mb-4">
                    {{ $product->description ?? __('app.no_description') }}</p>

                <div class="d-flex gap-3">
                    <form action="{{ route('cart.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <button type="submit" class="btn btn-success px-4 py-2 rounded-pill shadow-sm">
                            <i class="bi bi-cart-plus me-2"></i> {{ __('app.add_to_cart_full') }}
                        </button>
                    </form>

                    <form action="{{ route('wishlist.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <button type="submit" class="btn btn-outline-danger px-4 py-2 rounded-pill shadow-sm">
                            <i class="bi bi-heart me-2"></i> {{ __('app.add_to_wishlist_full') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
