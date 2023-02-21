@extends("user.layout")
@section("content")
    <div class="row">
        <div class="col-lg-12">
            <h6><span class="icon_tag_alt"></span> Have a coupon? <a href="#">Click here</a> to enter your code
            </h6>
        </div>
    </div>
    <div class="checkout__form">
        <h4>Billing Details</h4>
        <form action="{{url("checkout")}}" method="post">
            @csrf
            <div class="row">
                <div class="col-lg-8 col-md-6">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="checkout__input">
                                <p>Fist Name<span>*</span></p>
                                <input name="firstname" type="text">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="checkout__input">
                                <p>Last Name<span>*</span></p>
                                <input name="lastname" type="text">
                            </div>
                        </div>
                    </div>
                    <div class="checkout__input">
                        <p>Country<span>*</span></p>
                        <input name="country" type="text">
                    </div>
                    <div class="checkout__input">
                        <p>Address<span>*</span></p>
                        <input type="text" name="address" placeholder="Street Address" class="checkout__input__add">
                    </div>
                    <div class="checkout__input">
                        <p>Town/City<span>*</span></p>
                        <input name="city" type="text">
                    </div>
                    <div class="checkout__input">
                        <p>Postcode / ZIP<span>*</span></p>
                        <input name="zip" type="text">
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="checkout__input">
                                <p>Phone<span>*</span></p>
                                <input name="phone" type="text">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="checkout__input">
                                <p>Email<span>*</span></p>
                                <input name="email" type="text">
                            </div>
                        </div>
                    </div>
                    <div class="checkout__input__checkbox">
                        <label for="acc">
                            Create an account?
                            <input type="checkbox" id="acc">
                            <span class="checkmark"></span>
                        </label>
                    </div>
                    <p>Create an account by entering the information below. If you are a returning customer
                        please login at the top of the page</p>
                    <div class="checkout__input">
                        <p>Account Password<span>*</span></p>
                        <input type="text">
                    </div>
                    <div class="checkout__input__checkbox">
                        <label for="diff-acc">
                            Ship to a different address?
                            <input type="checkbox" id="diff-acc">
                            <span class="checkmark"></span>
                        </label>
                    </div>
                    <div class="checkout__input">
                        <p>Order notes<span>*</span></p>
                        <input type="text"
                               placeholder="Notes about your order, e.g. special notes for delivery.">
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="checkout__order">
                        <h4>Your Order</h4>
                        <div class="checkout__order__products">Products <span>Total</span></div>
                        <ul>
                            @foreach($cart as $item)
                                <li>{{$item->name}} <span>${{$item->price * $item->buy_qty}}</span></li>
                            @endforeach
                        </ul>
                        <div class="checkout__order__subtotal">Subtotal <span>${{$grand_total}}</span></div>
                        <div class="checkout__order__total">Total <span>${{$grand_total}}</span></div>
                        <div class="checkout__input__checkbox">
                            <label for="acc-or">
                                Create an account?
                                <input type="checkbox" id="acc-or">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adip elit, sed do eiusmod tempor incididunt
                            ut labore et dolore magna aliqua.</p>
                        <div class="checkout__input__checkbox">
                            <label for="payment">
                                Check Payment
                                <input type="checkbox" id="payment">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="checkout__input__checkbox">
                            <label for="paypal">
                                Paypal
                                <input type="checkbox" id="paypal">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <button type="submit" class="site-btn">PLACE ORDER</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
