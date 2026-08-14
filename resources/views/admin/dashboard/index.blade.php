@extends('admin.layouts.header')

@section('title', 'Dashboard | ')



@section('content')

    <div class="row g-4">

        <div class="d-flex justify-content-center mt-3">

            <div class="card border-0 shadow-sm rounded-4 p-4 text-white"
                style="background-color: #2c3e50; margin: 0 auto; text-align: center;">

                <h5>{{ __('app.product_management') }}</h5>

                <p class="mb-3 text-white-50">{{ __('app.product_management_desc') }}</p>

                <a href="{{ route('admin.products.index') }}"
                    class="btn btn-light btn-sm fw-bold w-100">{{ __('app.enter') }}</a>

            </div>

        </div>

    </div>

@endsection
