@extends('master')
@section('title', 'Заказ')
@section('content')
    <div class="breadcrumb">
        <h2>Оплата</h2>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>1{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(session()->has('error'))
        <div class="alert alert-danger">2
            {{ session()->get('error') }}
        </div>
    @endif

    @if(session()->has('success'))
        <div class="alert alert-success">3
            {{ session()->get('success') }}
        </div>
    @endif
    <div class="row">
        <div class="col-lg-6">
            <form  action="{{route('cart_payment')}}"  data-cc-on-file="false" data-stripe-publishable-key="pk_test_HcyH11lWYd22SNAvYmY9Yjdd00alWQeFXR" name="frmStripe" id="frmstripe" method="post">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-lg-12 form-group">
                        <label>Card Number</label>
                        <input autocomplete="off" class="form-control" size="20" type="text" name="card_no">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 form-group">
                        <label>CVC</label>
                        <input autocomplete="off" class="form-control" placeholder="ex. 311" size="3" type="text" name="cvv">
                    </div>
                    <div class="col-lg-4 form-group">
                        <label>Expiration</label>
                        <input class="form-control" placeholder="MM" size="2" type="text" name="expiry_month">
                    </div>
                    <div class="col-lg-4 form-group">
                        <label> </label>
                        <input class="form-control" placeholder="YYYY" size="4" type="text" name="expiry_year">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-control total btn btn-primary">
                            К оплате: <span class="amount">{{ $order->get_total_price() }}</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 form-group">
                        <button class="form-control btn btn-success submit-button" type="submit" style="margin-top: 10px;">Оплатить</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    </div>
@endsection
