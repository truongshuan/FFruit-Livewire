<div class="checkout-section mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="checkout-accordion-wrap">
                    <div class="accordion" id="accordionExample">
                        <div class="card single-accordion">
                            <div class="card-header" id="headingOne">
                                <h5 class="mb-0">
                                    <button class="btn btn-link" type="button" data-toggle="collapse"
                                        data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Thông tin về địa chỉ
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                data-parent="#accordionExample">
                                <div class="card-body">
                                    <div class="billing-address-form">
                                        <form action="#" wire:submit.prevent='store'>
                                            <p>
                                                <input wire:model='customer_name' type="text" placeholder="Họ và tên" />
                                            </p>
                                            @error('customer_name')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            <p>
                                                <input wire:model='customer_email' type="email" placeholder="Email" />
                                            </p>
                                            @error('customer_email')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            <p>
                                                <input wire:model='shipping_address' type="text"
                                                    placeholder="Địa chỉ " />
                                            </p>
                                            @error('shipping_address')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            <p>
                                                <input wire:model='customer_phone' type="tel"
                                                    placeholder="Số điện thoại" />
                                            </p>
                                            @error('customer_phone')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            <p>
                                                <textarea wire:model='note' name="bill" id="bill" cols="30" rows="10"
                                                    placeholder="Ghi chú"></textarea>
                                            </p>
                                            @error('note')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card single-accordion">
                            <div class="card-header" id="headingTwo">
                                <h5 class="mb-0">
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                        data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Shipping Address
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                data-parent="#accordionExample">
                                <div class="card-body">
                                    <div class="shipping-address-form">
                                        <p>
                                            Your shipping address form
                                            is here.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card single-accordion">
                            <div class="card-header" id="headingThree">
                                <h5 class="mb-0">
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                        data-target="#collapseThree" aria-expanded="false"
                                        aria-controls="collapseThree">
                                        Card Details
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                data-parent="#accordionExample">
                                <div class="card-body">
                                    <div class="card-details">
                                        <p>
                                            Your card details goes here.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="order-details-wrap">
                    <table class="order-details">
                        <thead>
                            <tr>
                                <th>Chi tiết đơn hàng!</th>
                                <th>Đơn giá</th>
                            </tr>
                        </thead>
                        <tbody class="order-details-body">
                            <tr>
                                <td>Sản phẩm</td>
                                <td>Tổng tiền</td>
                            </tr>
                            @forelse ($carts as $cart => $item)
                            <tr>
                                <td>{{ $item['product']['name']}} - ({{ $item['quantity'] }})</td>
                                <td>
                                    {{number_format($item['subtotal'], 0,
                                    ',','.') . '
                                    VND' }}
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="2">Trống</td>
                            </tr>
                            @endforelse
                        </tbody>
                        <tbody class="checkout-details">
                            <tr>
                                <td>Tổng đơn hàng</td>
                                <td>{{number_format($total, 0,',','.') . ' VND' }}</td>
                            </tr>
                            <tr>
                                <td>Phí vận chuyển</td>
                                <td>0</td>
                            </tr>
                            <tr>
                                <td>Tổng tiền</td>
                                <td>{{number_format($total, 0,',','.') . ' VND' }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <a wire:click='store()' class="boxed-btn">Đặt hàng</a>
                </div>
            </div>
        </div>
    </div>
</div>