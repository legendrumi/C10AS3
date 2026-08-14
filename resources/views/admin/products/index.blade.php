@extends('admin.layouts.header')

@section('title', 'Harytlar | ')



@section('content')

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h3 class="fw-bold text-dark">{{ __('app.product_list') }}</h3>

        <a href="{{ route('admin.products.create') }}" class="btn btn-primary btn-sm shadow-sm px-3 py-2"><i
                class="bi bi-plus-lg"></i> {{ __('app.add_new_product') }}</a>

    </div>



    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">

        <div class="table-responsive">

            <table class="table table-hover align-middle mb-0">

                <thead class="table-dark">

                    <tr>

                        <th>{{ __('app.image') }}</th>

                        <th>{{ __('app.name_col') }}</th>

                        <th>{{ __('app.code_col') }}</th>

                        <th>{{ __('app.price_col') }}</th>

                        <th>{{ __('app.discount_col') }}</th>

                        <th class="text-center">{{ __('app.actions') }}</th>

                    </tr>

                </thead>

                <tbody>

                    @foreach ($products as $product)
                        <tr>

                            <td>

                                @if ($product->image)
                                    <img src="{{ asset('storage/' . $product->image) }}" class="rounded-3" width="45"
                                        height="45" style="object-fit: cover;">
                                @else
                                    <div class="bg-light rounded-3 d-flex align-items-center justify-content-center text-muted"
                                        style="width: 45px; height: 45px; font-size: 12px;">{{ __('app.no_image') }}</div>
                                @endif

                            </td>

                            <td class="fw-semibold">{{ $product->name }}</td>

                            <td><code>{{ $product->code }}</code></td>

                            <td class="text-success fw-bold">{{ $product->price }} TMT</td>

                            <td><span class="badge bg-danger">{{ $product->discount }}%</span></td>

                            <td>

                                <div class="d-flex justify-content-center gap-2">

                                    <a href="{{ route('admin.products.edit', $product->id) }}"
                                        class="btn btn-outline-primary btn-sm">

                                        <i class="bi bi-pencil"></i>

                                    </a>



                                    <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST">

                                        @csrf @method('DELETE')

                                        <button class="btn btn-outline-danger btn-sm"
                                            onclick="return confirm('Hakykatdanam pozmakcymy?')">

                                            <i class="bi bi-trash"></i>

                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>
                    @endforeach

                </tbody>

            </table>

        </div>



        @if ($products->hasPages())
            <div class="p-3 border-top">

                {{ $products->links('pagination::bootstrap-5') }}

            </div>
        @endif

    </div>

@endsection
