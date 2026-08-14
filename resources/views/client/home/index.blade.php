@extends('client.layouts.app')
@section('title', __('app.home') . ' | E-SHOP')

@section('content')
    <div class="container py-4">
        <div class="row">
            <div class="col-lg-3 col-md-4 mb-4">
                <div class="card border-0 shadow-sm rounded-4 position-sticky" style="top: 20px;">
                    <div class="card-body p-4">
                        <h5 class="fw-bold mb-4"><i class="bi bi-funnel"></i> {{ __('app.filters') }}</h5>

                        <form action="{{ route('home') }}" method="GET">
                            <div class="mb-3">
                                <label class="form-label small fw-semibold">{{ __('app.search_label') }}</label>
                                <input type="text" name="search" value="{{ request('search') }}"
                                    class="form-control form-control-sm" placeholder="{{ __('app.search_placeholder') }}">
                            </div>

                            <div class="mb-3">
                                <label class="form-label small fw-semibold">{{ __('app.category') }}</label>
                                <select name="category_id" class="form-select form-select-sm">
                                    <option value="">{{ __('app.all') }}</option>
                                    @foreach ($categories as $cat)
                                        <option value="{{ $cat->id }}" @selected(request('category_id') == $cat->id)>{{ $cat->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label small fw-semibold">{{ __('app.brand') }}</label>
                                <select name="brand_id" class="form-select form-select-sm">
                                    <option value="">{{ __('app.all') }}</option>
                                    @foreach ($brands as $brand)
                                        <option value="{{ $brand->id }}" @selected(request('brand_id') == $brand->id)>
                                            {{ $brand->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label small fw-semibold">{{ __('app.price_range') }}</label>
                                <div class="input-group input-group-sm">
                                    <input type="number" name="min_price" value="{{ request('min_price') }}"
                                        class="form-control" placeholder="{{ __('app.min') }}">
                                    <input type="number" name="max_price" value="{{ request('max_price') }}"
                                        class="form-control" placeholder="{{ __('app.max') }}">
                                </div>
                            </div>

                            <div class="mb-3 form-check">
                                <input type="checkbox" name="has_discount" value="1" class="form-check-input"
                                    id="discount" @checked(request('has_discount'))>
                                <label class="form-check-label small"
                                    for="discount">{{ __('app.discounted_products') }}</label>
                            </div>

                            <div class="mb-3">
                                <label class="form-label small fw-semibold">{{ __('app.sort') }}</label>

                                <div class="form-check mb-1">
                                    <input class="form-check-input" type="radio" name="sort" id="sort_default"
                                        value="" @checked(!request('sort'))>
                                    <label class="form-check-label small" for="sort_default">
                                        {{ __('app.sort_default') }}
                                    </label>
                                </div>

                                <div class="form-check mb-1">
                                    <input class="form-check-input" type="radio" name="sort" id="sort_low_high"
                                        value="price_asc" @checked(request('sort') == 'price_asc')>
                                    <label class="form-check-label small" for="sort_low_high">
                                        {{ __('app.price_low_high') }}
                                    </label>
                                </div>

                                <div class="form-check mb-1">
                                    <input class="form-check-input" type="radio" name="sort" id="sort_high_low"
                                        value="price_desc" @checked(request('sort') == 'price_desc')>
                                    <label class="form-check-label small" for="sort_high_low">
                                        {{ __('app.price_high_low') }}
                                    </label>
                                </div>
                            </div>

                            <div class="d-grid gap-2 mt-4">
                                <button type="submit" class="btn btn-success fw-bold">{{ __('app.filter') }}</button>
                                <a href="{{ route('home') }}"
                                    class="btn btn-outline-secondary fw-bold">{{ __('app.clear') }}</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-9 col-md-8">
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                    @forelse($products as $product)
                        @include('client.components.product-card', ['product' => $product])
                    @empty
                        <div class="col-12 text-center py-5 text-muted">
                            <i class="bi bi-inbox fs-1 d-block mb-2"></i> {{ __('app.product_not_found') }}
                        </div>
                    @endforelse
                </div>

                <div class="mt-5 d-flex justify-content-center">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
