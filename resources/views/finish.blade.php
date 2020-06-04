@extends('master')
@section('title', 'Информация о вашем заказа')
@section('content')
    <div class="breadcrumb">
        <h2>Информация о вашем заказа</h2>
    </div>
    <p>Заказ № {{ $order->id }} на сумму {{ $order->get_total_price() }} руб. <b>принят в обработку.</b></p>
    <p>Наш менеджер свяжется с вами по указанному вами телефону.</p>
    Состав заказа:
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Название</th>
            <th>Кол-во</th>
            <th>Цена</th>
            <th>Стоимость</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($order->products as $product)
            <tr>
                <td>
                    <a href="{{ route('product', [$product->category->code, $product->code]) }}">
                        <img height="56px" src="
                                    @if($product->img)
                        {{ Storage::url($product->img) }}
                        @else
                        {{ asset('img/placeholder.jpg') }}
                        @endif">
                        {{ $product->name }}
                    </a>
                </td>
                <td><span class="badge"> {{ $product->pivot->count }}</span></td>
                <td>{{ $product->price }} руб.</td>
                <td>{{ $product->get_sum_price() }} руб.</td>
            </tr>
        @endforeach
        </tbody>
    </table>


@endsection
