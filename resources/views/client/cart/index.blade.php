@extends('client.layouts.app')
@section('title', __('app.cart') . ' | E-SHOP')

@section('content')
    <div class="container py-5">
        <h2 class="fw-bold mb-4"><i class="bi bi-cart3"></i> {{ __('app.cart') }}</h2>

        @if (count($cart) > 0)
            <div class="card border-0 shadow-sm rounded-4 p-4">
                <div class="table-responsive">
                    <table class="table align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>{{ __('app.image') }}</th>
                                <th>{{ __('app.product_name') }}</th>
                                <th>{{ __('app.price') }}</th>
                                <th>{{ __('app.quantity') }}</th>
                                <th>{{ __('app.total') }}</th>
                                <th class="text-end">{{ __('app.actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $grandTotal = 0; @endphp
                            @foreach ($cart as $id => $item)
                                @php
                                    $total = $item['price'] * $item['quantity'];
                                    $grandTotal += $total;
                                @endphp
                                <tr>
                                    <td class="align-middle" style="width: 70px;">
                                        @if (isset($item['image']) && $item['image'])
                                            <img src="{{ asset('storage/' . $item['image']) }}" alt="{{ $item['name'] }}"
                                                style="width: 50px; height: 50px; object-fit: cover; border-radius: 6px;">
                                        @else
                                            <img src="{{ asset('img/product.jpg') }}" alt="Default"
                                                style="width: 50px; height: 50px; object-fit: cover; border-radius: 6px;">
                                        @endif
                                    </td>
                                    <td class="fw-semibold">{{ $item['name'] }}</td>
                                    <td>{{ $item['price'] }} TMT</td>
                                    <td>{{ $item['quantity'] }} {{ __('app.pieces') }}</td>
                                    <td class="fw-bold text-success">{{ $total }} TMT</td>
                                    <td class="text-end">
                                        <form action="{{ route('cart.destroy', $id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger btn-sm rounded-pill">
                                                <i class="bi bi-trash"></i> {{ __('app.remove') }}
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="d-flex justify-content-between align-items-center mt-4 pt-3 border-top">
                    <h4 class="fw-bold mb-0">{{ __('app.grand_total') }}: <span class="text-success">{{ $grandTotal }}
                            TMT</span></h4>
                    <a href="{{ route('home') }}"
                        class="btn btn-outline-secondary fw-bold">{{ __('app.continue_shopping') }}</a>
                </div>
            </div>
        @else
            <div class="card border-0 shadow-sm rounded-4 p-4">
                <div class="text-center py-5">
                    <i class="bi bi-cart-x fs-1 text-muted d-block mb-3"></i>
                    <h5 class="text-muted">{{ __('app.cart_empty') }}</h5>
                    <a href="{{ route('home') }}" class="btn btn-success mt-3 fw-bold">{{ __('app.start_shopping') }}</a>
                </div>
            </div>
        @endif
    </div>
@endsection
