@extends('home')
@section('content')
    <div class="container">
        <div class="row">
            <h1>Создание магазина</h1>
        </div>
        <div class="row">
            <form action="/home/shop/store/" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <label for="">
                    Линк
                    <input type="text" name="link" value="">
                </label>
                <label for="">
                    Лого
                    <img src="/img/" alt="">
                    <input type="file" name="photo">
                </label>
                <label for="">
                    Магазин
                    <input type="text" id="domainFinder">
                    <span id="domainFinderResult"></span>
                    <input type="hiddem" name="shop" value="">
                </label>
                <button class="btn btn-primary">Сохранить</button>
            </form>
            <script>
                $(document).ready(function(){
                    $("#domainFinder").onkeyup(function(){
                        alert("lol");
                    });
                });
            </script>
        </div>
    </div>
@endsection