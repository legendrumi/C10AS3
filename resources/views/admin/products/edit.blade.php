@extends('admin.layouts.header')

@section('title', 'Harydy Üýtget')



@section('content')

    <div class="container-fluid py-4">

        <div class="d-flex justify-content-between align-items-center mb-4">

            <h3 class="fw-bold text-dark">{{ __('app.edit_product') }}: {{ $product->name }}</h3>

            <a href="{{ route('admin.products.index') }}" class="btn btn-outline-secondary fw-bold">

                <i class="bi bi-arrow-left"></i> {{ __('app.go_back') }}

            </a>

        </div>



        @if ($errors->any())

            <div class="alert alert-danger rounded-4">

                <ul class="mb-0">

                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach

                </ul>

            </div>

        @endif



        <div class="card border-0 shadow-sm rounded-4 p-4 bg-white">

            <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">

                @csrf

                @method('PUT')



                <div class="row">

                    <div class="col-md-4 mb-3">

                        <label class="form-label fw-bold text-secondary">{{ __('app.product_name_en') }} <span
                                class="text-danger">*</span></label>

                        <input type="text" name="name" class="form-control" value="{{ old('name', $product->name) }}"
                            required>

                    </div>

                    <div class="col-md-4 mb-3">

                        <label class="form-label fw-bold text-secondary">{{ __('app.product_name_tm') }}</label>

                        <input type="text" name="name_tm" class="form-control"
                            value="{{ old('name_tm', $product->name_tm) }}">

                    </div>

                    <div class="col-md-4 mb-3">

                        <label class="form-label fw-bold text-secondary">{{ __('app.product_name_ru') }}</label>

                        <input type="text" name="name_ru" class="form-control"
                            value="{{ old('name_ru', $product->name_ru) }}">

                    </div>



                    <div class="col-md-12 mb-3">

                        <label class="form-label fw-bold text-secondary">{{ __('app.code_barcode_sku') }} <span
                                class="text-danger">*</span></label>

                        <input type="text" name="code" class="form-control" value="{{ old('code', $product->code) }}"
                            required>

                    </div>



                    <div class="col-md-6 mb-3">

                        <label class="form-label fw-bold text-secondary">{{ __('app.category') }} <span
                                class="text-danger">*</span></label>

                        <select name="category_id" class="form-select" required>

                            <option value="">Saýlaň...</option>

                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>

                                    {{ $category->name }}

                                </option>
                            @endforeach

                        </select>

                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="form-label fw-bold text-secondary">{{ __('app.brand') }} <span class="text-danger">*</span></label>

                        <select name="brand_id" class="form-select" required>

                            <option value="">Saýlaň...</option>

                            @foreach ($brands as $brand)
                                <option value="{{ $brand->id }}"
                                    {{ old('brand_id', $product->brand_id) == $brand->id ? 'selected' : '' }}>

                                    {{ $brand->name }}

                                </option>
                            @endforeach

                        </select>

                    </div>



                    <div class="col-md-6 mb-3">

                        <label class="form-label fw-bold text-secondary">{{ __('app.price_tmt') }} <span
                                class="text-danger">*</span></label>

                        <input type="number" step="0.01" name="price" class="form-control"
                            value="{{ old('price', $product->price) }}" required>

                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="form-label fw-bold text-secondary">{{ __('app.discount_percent') }}</label>

                        <input type="number" step="1" name="discount" class="form-control"
                            value="{{ old('discount', $product->discount) }}">

                    </div>



                    <div class="col-md-4 mb-3">

                        <label class="form-label fw-bold text-secondary">'{{ __('app.description_en') }}'</label>

                        <textarea name="description" class="form-control" rows="3">{{ old('description', $product->description) }}</textarea>

                    </div>

                    <div class="col-md-4 mb-3">

                        <label class="form-label fw-bold text-secondary">{{ __('app.description_tm') }}</label>

                        <textarea name="description_tm" class="form-control" rows="3">{{ old('description_tm', $product->description_tm) }}</textarea>

                    </div>

                    <div class="col-md-4 mb-3">

                        <label class="form-label fw-bold text-secondary">{{ __('app.description_ru') }}</label>

                        <textarea name="description_ru" class="form-control" rows="3">{{ old('description_ru', $product->description_ru) }}</textarea>

                    </div>



                    <div class="col-md-12 mb-4">

                        <label class="form-label fw-bold text-secondary">{{ __('app.upload_new_image') }}</label>

                        <input type="file" name="image" class="form-control" accept="image/*">



                        @if ($product->image)
                            <div class="mt-3">

                                <span class="d-block mb-1 text-muted fs-7">Häzirki ulanylýan surat:</span>

                                <img src="{{ asset('storage/' . $product->image) }}" alt="Surat"
                                    style="height: 80px; width: 80px; object-fit: cover;" class="rounded border shadow-sm">

                            </div>
                        @endif

                    </div>

                </div>



                <div class="d-flex justify-content-end mt-2 border-top pt-3">

                    <button type="submit" class="btn btn-primary fw-bold px-4 py-2">

                        <i class="bi bi-save"></i> {{ __('app.save_changes') }}

                    </button>

                </div>

            </form>

        </div>

    </div>

@endsection
