@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body" style="text-align: center;">
                    <a href="/" class="btn btn-primary">Перейти на сайт</a>
                    <a href="/admin/shop" class="btn btn-dark">Создать магазин</a>
                    <a href="/admin/product" class="btn btn-success">Создать товар</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
