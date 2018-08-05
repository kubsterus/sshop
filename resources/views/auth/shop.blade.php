@extends('home')
@section('content')
    <div class="container">
       <div class="row">
           <h1>Создание магазина</h1>
       </div>
        <div class="row">
            <form action="/admin/shop/store/{{$shop->id}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div>
                    Название магазина
                    <input type="text" name="title" class="form-control" value="{{$shop->title}}">
                </div>
                <div >
                    Домен магазина
                    <input type="text" name="domain" class="form-control" value="{{$shop->domain}}">
                </div>
                <div>
                    Описание магазина
                    <textarea name="description" id="" class="form-control" cols="30" rows="10">
                        {{$shop->description}}
                    </textarea>
                </div>
                <div for="">
                    Мануал магазина
                    <textarea name="manual" id="" class="form-control" cols="30" rows="10">
                        {{$shop->manual}}
                    </textarea>
                </div>
                <div for="">
                    Лого
                    <img src="/img/{{$shop->logo}}" alt="" style="width: 250px; display: block">
                    <input type="file" name="logo" class="form-control">
                </div>
                <div for="">
                    Партнерский код
                    <input type="text" name="code" value="{{$shop->code}}" class="form-control">
                </div>
                <button class="btn btn-primary">Сохранить</button>
            </form>
        </div>
    </div>
@endsection