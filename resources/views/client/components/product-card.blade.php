<div class="col">
    <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden product-card">
        <a href="{{ route('products.show', $product->id) }}"
            class="text-decoration-none text-dark d-flex flex-column h-100">
            @if ($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top w-100" alt="{{ $product->name }}"
                    style="height: 250px; object-fit: cover;">
            @else
                <img src="{{ asset('img/product.jpg') }}" class="card-img-top w-100" alt="Default Image"
                    style="height: 250px; object-fit: cover;">
            @endif

            <div class="card-body d-flex flex-column flex-grow-1">
                <span class="badge bg-secondary text-uppercase fs-7 mb-1 align-self-start">
                    {{ $product->category->name ?? __('app.no_category') }}
                </span>

                <h5 class="card-title fs-6 fw-bold mb-2">
                    {{ $product->name }}
                </h5>

                <div class="mt-auto w-100">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div>
                            @if ($product->discount > 0)
                                <span class="badge bg-danger me-1">-{{ $product->discount }}%</span>
                            @endif
                            <span class="fw-bold text-success fs-5">{{ $product->price }} TMT</span>
                        </div>
                    </div>
                </div>
            </div>
        </a>

        <div class="card-footer bg-white border-0 pt-0 pb-3 px-3">
            <div class="d-flex align-items-center justify-content-between gap-2">
                <form action="{{ route('wishlist.store') }}" method="POST" class="flex-fill">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <button type="submit"
                        class="btn btn-outline-danger w-100 btn-sm rounded-pill d-flex align-items-center justify-content-center gap-1">
                        <i class="bi bi-heart"></i> {{ __('app.add_to_wishlist') }}
                    </button>
                </form>

                <form action="{{ route('cart.store') }}" method="POST" class="flex-fill">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <button type="submit"
                        class="btn btn-success w-100 btn-sm rounded-pill d-flex align-items-center justify-content-center gap-1">
                        <i class="bi bi-cart-plus"></i> {{ __('app.add_to_cart') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
