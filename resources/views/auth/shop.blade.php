@extends('home')
@section('content')
    <div class="container">
       <div class="row">
           <h1>Создание магазина</h1>
       </div>
        <div class="row">
            <form action="/home/shop/store/{{$shop->id}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <label for="">
                    Название магазина
                    <input type="text" name="title" value="{{$shop->title}}">
                </label>
                <label for="">
                    Домен магазина
                    <input type="text" name="domain" value="{{$shop->domain}}">
                </label>
                <label for="">
                    Описание магазина
                    <textarea name="description" id="" cols="30" rows="10">
                        {{$shop->description}}
                    </textarea>
                </label>
                <label for="">
                    Мануал магазина
                    <textarea name="manual" id="" cols="30" rows="10">
                        {{$shop->manual}}
                    </textarea>
                </label>
                <label for="">
                    Лого
                    <img src="/img/{{$shop->logo}}" alt="">
                    <input type="file" name="logo">
                </label>
                <label for="">
                    Партнерский код
                    <input type="text" name="code" value="{{$shop->code}}">
                </label>
                <button class="btn btn-primary">Сохранить</button>
            </form>
        </div>
    </div>
@endsection