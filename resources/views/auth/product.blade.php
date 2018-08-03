@extends('home')
@section('content')
    <div class="container">
        <div class="row">
            <h1>Создание магазина</h1>
        </div>
        <div class="row">
            <form action="/home/product/store" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{$product->id}}">
                <label for="">
                    Линк
                    <input type="text" name="link" value="{{$product->link}}">
                </label>
                <label for="">
                    Лого
                    <img src="/img/{{$product->photo}}" alt="">
                    <input type="file" name="photo">
                </label>
                <label for="">
                    Магазин
                    <input type="text" id="domainFinder" value="{{$shop->domain}}">
                    <span id="domainFinderResult"></span>
                    <input type="hidden" name="shop" value="{{$shop->id}}">
                </label>
                <button class="btn btn-primary">Сохранить</button>
            </form>
            <script src="/js/admin_app.js"></script>
        </div>
    </div>
@endsection