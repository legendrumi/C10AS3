@extends('admin.layouts.header')

@section('title', 'Haryt Goş | ')



@section('content')

<div class="row justify-content-center">

    <div class="col-md-8">

        <div class="card border-0 shadow-sm rounded-4 p-4">

            <h4 class="fw-bold mb-3">{{ __('app.create_new_product') }}</h4>

            <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">

                @csrf

                <div class="row g-3">

                    <div class="col-md-6">

                        <label class="form-label fw-semibold">{{ __('app.category') }}</label>

                        <select name="category_id" class="form-select" required>

                            @foreach($categories as $cat)

                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>

                            @endforeach

                        </select>

                    </div>

                    <div class="col-md-6">

                        <label class="form-label fw-semibold">{{ __('app.brand') }}</label>

                        <select name="brand_id" class="form-select" required>

                            @foreach($brands as $brand)

                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>

                            @endforeach

                        </select>

                    </div>

                    <div class="col-md-6">

                        <label class="form-label fw-semibold">{{ __('app.product_name') }}</label>

                        <input type="text" name="name" class="form-control" required>

                    </div>

                    <div class="col-md-6">

                        <label class="form-label fw-semibold">{{ __('app.product_code') }}</label>

                        <input type="text" name="code" class="form-control" required>

                    </div>

                    <div class="col-md-6">

                        <label class="form-label fw-semibold">{{ __('app.price_tmt') }}</label>

                        <input type="number" step="0.01" name="price" class="form-control" required>

                    </div>

                    <div class="col-md-6">

                        <label class="form-label fw-semibold">{{ __('app.discount_percent') }}</label>

                        <input type="number" name="discount" class="form-control" value="0">

                    </div>

                    <div class="col-12">

                        <label class="form-label fw-semibold">{{ __('app.image') }}</label>

                        <input type="file" name="image" class="form-control" required>

                    </div>

                    <div class="col-12 mt-4">

                        <button type="submit" class="btn btn-success px-4 fw-bold">{{ __('app.save') }}</button>

                        <a href="{{ route('admin.products.index') }}" class="btn btn-secondary px-3">{{ __('app.back') }}</a>

                    </div>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection