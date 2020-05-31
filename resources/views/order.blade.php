@extends('master')
@section('title', 'Заказ')
@section('content')
    <div class="breadcrumb">
        <h2>Заказ</h2>
    </div>
        <h2>На сумму: <b>{{ $order->get_total_price() }} руб.</b></h2>
        <p>Для оформления заказа заполните форму. Мы свяжемся с вами по указанным данным. Следующим шагом будет оплата заказа.</p>
        <div class="col-lg-6">
            <form action="{{ route('cart_confirm') }}" method="POST" id="payment-form">
                @csrf
                <div>
                        <div class="form-group">
                            <label for="name" class="control-label col-lg-offset-3 col-lg-2">Имя*</label>
                            <div>
                                <input type="text" name="name" id="name" value="" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="phone" class="control-label col-lg-offset-3 col-lg-2">Телефон</label>
                            <div>
                                <input type="number" name="phone" id="phone" value="" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="phone" class="control-label col-lg-offset-3 col-lg-2">E-mail*</label>
                            <div>
                                <input type="email" name="email" id="email" value="" class="form-control" required>
                            </div>
                        </div>
                </div>
                <div>
                    <label for="card-element">
                        Данные карты для оплаты
                    </label>

                    <div id="card-element" >
                        <!-- A Stripe Element will be inserted here. -->
                    </div>

                    <!-- Used to display form errors. -->
                    <div id="card-errors" role="alert"></div>
                </div>

                <button class="btn btn-success my_btn">Завершить заказ</button>
            </form>
        </div>

    </div>
@endsection
