@extends('master')
@section('title', 'Корзина')
@section('content')
    <div class="breadcrumb">
        <h2>Корзина</h2>
    </div>
    <div class="row">
            <table class="table">
                <thead>
                <tr>
                    <th>название</th>
                    <th>количество</th>
                    <th>цена</th>
                    <th>всего</th>
                </tr>
                </thead>
                <tbody>
                @foreach($order->products as $product)
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
                        <td><span class="badge">{{ $product->pivot->count }}</span>
                            <div class="btn-group form-inline">
                                <form action="{{ route('cart_del', $product->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-danger" href="">
                                        <span class="glyphicon glyphicon-minus" aria-hidden="true">-</span>
                                    </button>
                                </form>
                                <form action="{{ route('cart_add', $product->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-success" href="">
                                        <span class="glyphicon glyphicon-plus" aria-hidden="true">+</span></button>
                                </form>
                            </div>
                        </td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->get_sum_price() }}</td>
                    </tr>
                @endforeach

                <tr>
                    <td colspan="3">всего</td>
                    <td>{{ $order->get_total_price() }}</td>
                </tr>
                </tbody>
            </table>
            <br>
            <div class="btn-group pull-right" role="group">
                <a type="button" class="btn btn-success" href="{{ route('cart_order') }}">заказать</a>
            </div>
    </div>
@endsection
