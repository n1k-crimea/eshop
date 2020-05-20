@extends('master')
@section('title', 'Товары из категории '.$category->name)
@section('content')
    <div class="breadcrumb">
        <h2>{{ $category->name }}</h2>
    </div>
    <div class="row">
        @foreach($category->products as $product)
            @include('card')
        @endforeach
    </div>
@endsection
