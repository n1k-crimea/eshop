@extends('master')
@section('title', 'Заказ')
@section('content')
    <div class="breadcrumb">
        <h2>Заказ</h2>
    </div>
        <h2>На сумму: <b>{{ $order->get_total_price() }} руб.</b></h2>
        <p>Для оформления заказа заполните форму. Мы свяжемся с вами по указанным данным.</p>
        <div class="row justify-content-center">
            <form action="{{ route('cart_confirm') }}" method="POST">
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
                    <input type="submit" class="btn btn-success" value="Подтвердить заказ">
                </div>
            </form>
        </div>
    </div>
@endsection
