@extends('home')
@section('content')
    <div class="container">
        <div class="row">
            <h1>Создание магазина</h1>
        </div>
        <div class="row">
            <form action="/admin/product/store" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{$product->id}}">
                <div for="">
                    Линк
                    <input type="text" name="link" class="form-control" value="{{$product->link}}">
                </div>
                <div for="">
                    Лого
                    <img src="/img/{{$product->photo}}" alt="" style="width: 250px; display: block;">
                    <input type="file" name="photo" class="form-control">
                </div>
                <div for="">
                    Магазин
                    <input type="text" id="domainFinder" value="{{$shop->domain}}" class="form-control">
                    <span id="domainFinderResult"></span>
                    <input type="hidden" name="shop" value="{{$shop->id}}">
                </div>
                <button class="btn btn-primary">Сохранить</button>
            </form>
            <script src="/js/admin_app.js"></script>
        </div>
    </div>
@endsection