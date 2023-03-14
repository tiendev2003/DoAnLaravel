@extends('layouts.client')
@section('title', 'Laptop Shop')
@section('content')
  
    @include('client.include.banner')
    <div class="product">
      
        <div class="product-m">
            @foreach ($sanpham as $sp)
                <div class="item">
                    <div class="imgBox">
                        <a href="{{ route('shoplaptop.chitiet', ['id' => $sp->id]) }}">
                            <img src="/sanpham/{{ $sp->anh }}" class="mouse">
                        </a>
                    </div>

                    <div class="contentBox text-center">
                        <a href="{{ route('shoplaptop.chitiet', ['id' => $sp->id]) }}"
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
        </div>

    </div>
    <section>
        <div class="d-flex justify-content-end">
            {{ $sanpham->withQueryString()->links() }}
        </div>
    </section>
    <!-- Product -->
<script>
$(document).ready(function(){
  $('.toast').toast('show');
});
</script>



@endsection
