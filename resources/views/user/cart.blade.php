@extends("user.layout")
@section("content")
    <div class="row">
        <div class="col-lg-12">
            <div class="shoping__cart__table">
                <table>
                    <thead>
                    <tr>
                        <th class="shoping__product">Products</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($cart as $item)
                    <tr>
                        <td class="shoping__cart__item">
                            <img src="{{$item->thumbnail}}" width="100" alt="">
                            <h5>Vegetable’s Package</h5>
                            @if($item->qty <= 0)
                            <p class="text-danger">Sản phẩm đã hết hàng</p>
                            @endif
                        </td>
                        <td class="shoping__cart__price">
                            ${{$item->price}}
                        </td>
                        <td class="shoping__cart__quantity">
                            <div class="quantity">
                                <div class="pro-qty">
                                    <input type="text" value="{{$item->buy_qty}}">
                                </div>
                            </div>
                        </td>
                        <td class="shoping__cart__total">
                            ${{$item->buy_qty * $item->price}}
                        </td>
                        <td class="shoping__cart__item__close">
                            <a href="{{url("/remove-cart",["product"=>$item->id])}}"> <span class="icon_close"></span></a>
                        </td>
                    </tr>
                    @empty
                        <tr>
                        <td colspan="5">No item in the cart</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @if($grand_total > 0)
    <div class="row">
        <div class="col-lg-12">
            <div class="shoping__cart__btns">
                <a href="#" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                <a href="#" class="primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>
                    Upadate Cart</a>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="shoping__continue">
                <div class="shoping__discount">
                    <h5>Discount Codes</h5>
                    <form action="#">
                        <input type="text" placeholder="Enter your coupon code">
                        <button type="submit" class="site-btn">APPLY COUPON</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="shoping__checkout">
                <h5>Cart Total</h5>
                <ul>
                    <li>Subtotal <span>${{$grand_total}}</span></li>
                    <li>Total <span>${{$grand_total}}</span></li>
                </ul>
                @if($can_checkout)
                <a href="{{url("checkout")}}" class="primary-btn">PROCEED TO CHECKOUT</a>
                @else
                    <a href="javascript:void(0);" style="background-color: gray;" class="primary-btn disabled">PROCEED TO CHECKOUT</a>
                @endif
            </div>
        </div>
    </div>
    @endif

@endsection
