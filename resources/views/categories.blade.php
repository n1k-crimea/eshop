@extends('master')
@section('title', 'Все категории')
@section('content')
    <div class="breadcrumb">
        <h2>Все категории</h2>
    </div>
    <div class="row">
            @foreach($categories as $category)
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <img class="card-img-top img_card" alt="Card image cap" src="
                            @if($category->img)
                                {{ Storage::url($category->img) }}
                            @else
                                {{ asset('img/placeholder.jpg') }}
                            @endif
                        ">
                        <div class="card-body">
                            <h5 class="card-title"><a href="/{{ $category->code }}">{{ $category->name }}</a></h5>
                            <p class="card-text">{{ $category->desc }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
    </div>
@endsection
