<div class="col-md-4">
    <div class="card mb-4 box-shadow">
        <img class="card-img-top img_card"  alt="Card image cap" src="
            @if($product->img)
                {{ Storage::url($product->img) }}
            @else
                {{ asset('img/placeholder.jpg') }}
            @endif
        ">
        <div class="card-body">
            <text class="text-muted">{{ $product->category->name }}</text>
            <h3 class="card-title">{{ $product->name }}</h3>
            <p class="card-text">{{ $product->desc }}</p>
            <div class="d-flex justify-content-between align-items-center">
                <div class="btn-toolbar">
                    <a href="{{ route('product', [$product->category->code, $product->code]) }}" class="btn btn-sm btn-outline-primary">Просмотр</a>
                    <form action="{{route('cart_add', $product)}}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-outline-success">В корзину</button>
                    </form>
                </div>
                <text class="text-muted">{{ $product->price }} руб.</text>
            </div>
        </div>
    </div>
</div>
