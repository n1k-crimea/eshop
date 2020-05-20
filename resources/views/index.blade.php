@extends('master')
@section('title', 'Главная страница')
@section('content')
    <div class="breadcrumb">
        <h2>Главная</h2>
    </div>
    <div class="row">
        @foreach($products as $product)
            @include('card', compact('product'))
        @endforeach
    </div>
@endsection
