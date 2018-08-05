@extends('home')

@section('content')
<section class="container">
    <div class="row">
        <h1>Магазины</h1>
    </div>
    <div class="row">
        <a href="/admin/shop" class="btn btn-success">Создать магазин</a>
    </div>
    <div class="row">
        <table class="table table-stripped">
            <thead>
                <tr>
                    <td>Лого</td>
                    <td>Название магазина</td>
                    <td>Описание</td>
                    <td>Действия</td>
                </tr>
            </thead>
            <tbody>
                @foreach($shops as $shop)
                <tr>
                    <td style="width: 20%;">
                        <img style="width: 100%;" src="/img/{{$shop->logo}}" alt="">
                    </td>
                    <td>{{$shop->title}} (ID: {{$shop->id}})</td>
                    <td>{{$shop->description}}</td>
                    <td>
                        <a href="/admin/shop/{{$shop->id}}" class="btn btn-primary">Изменить</a>
                        <a href="/admin/shop/destroy/{{$shop->id}}" class="btn btn-danger">Удалить</a>
                    </td>
                </tr>
                    @endforeach
            </tbody>
        </table>
    </div>
</section>
<section class="container">
    {{ $shops->links() }}
</section>
@endsection