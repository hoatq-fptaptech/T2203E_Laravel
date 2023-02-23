@extends('user.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="section-title">
                <h2>Featured Product</h2>
            </div>
            <div class="featured__controls">
                <ul>
                    <li class="active" data-filter="*">All</li>
                    <li data-filter=".oranges">Oranges</li>
                    <li data-filter=".fresh-meat">Fresh Meat</li>
                    <li data-filter=".vegetables">Vegetables</li>
                    <li data-filter=".fastfood">Fastfood</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="row featured__filter">
        @foreach($products as $p)
        <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
            <div class="featured__item">
                <div class="featured__item__pic set-bg" data-setbg="{{$p->thumbnail}}">
                    <ul class="featured__item__pic__hover">
                        <li><a href="#"><i class="fa fa-heart"></i></a></li>
                        <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                        <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                    </ul>
                </div>
                <div class="featured__item__text">
                    <h6><a href="{{route("product_detail",["product"=>$p->id])}}">{{$p->name}}</a></h6>
                    <h5>{{format_money($p->price)}}</h5>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection
