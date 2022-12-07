@extends('layouts.client')
@section('title')
    {{ $data->name }}
@endsection

@section('content')
    @include('client.include.banner')
    <div class="product">
        <div class="product-m">
            @if (count($sanpham) > 0)
                @foreach ($sanpham as $sp)
                    <div class="item">
                        <div class="imgBox">
                            <a href="{{ route('shoplaptop.details', ['id' => $sp->id]) }}">
                                <img src="/sanpham/{{ $sp->anh }}" class="mouse">
                            </a>
                        </div>

                        <div class="contentBox text-center">
                            <a href="{{ route('shoplaptop.details', ['id' => $sp->id]) }}"
                                class="product-name">{{ $sp->name }}</a>
                            <span class="price" name="price">
                                {{ $sp->dongia }} VND
                            </span>
                            <form action="{{ route('shoplaptop.addcart', ['id' => $sp->id]) }}" method="GET">
                                @csrf
                                <input type="hidden" name="quantity" id="" value="1">
                                <input type="hidden" name="price" value="{{ $sp->dongia }}">
                                <button class="btn btn-outline-success buy" type="submit">
                                    <i class="fas fa-cart-plus me-2"></i>Add to cart</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="text-center text-red-100">
                    <h3> Không có sản phẩm nào thuộc danh muc {{ $data->name }}</h3>
                </div>
            @endif
        </div>
    </div>
@endsection
