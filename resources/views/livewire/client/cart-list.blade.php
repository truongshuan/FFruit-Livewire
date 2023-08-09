<div class="cart-section mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="cart-table-wrap">
                    <table class="cart-table">
                        <thead class="cart-table-head">
                            <tr class="table-head-row">
                                <th class="product-image">
                                    <div class="form-check">
                                        <input wire:model="selectAll" class="form-check-input" type="checkbox" value=""
                                            id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                        </label>
                                    </div>
                                </th>
                                <th class="product-image">Ảnh sản phẩm</th>
                                <th class="product-name">Tên sản phẩm</th>
                                <th class="product-price">Đơn giá</th>
                                <th class="product-quantity">Số lượng</th>
                                <th class="product-total">Tổng tiền</th>
                                <th class="product-remove"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($cart as $productId => $product)
                            <tr class="table-body-row">
                                <td>
                                    <input class="form-check-input" wire:model="selectedRow" type="checkbox"
                                        value="{{$product['product']->id}}" id="{{$product['product']->id}}">
                                </td>
                                <td class="product-image"><img
                                        src="{{ Storage::disk('s3')->url($product['product']->path_image) }}"
                                        alt="{{$product['product']->name}}" width="50px">
                                </td>
                                <td class="product-name">{{$product['product']->name}}</td>
                                <td class="product-price">
                                    @if ($product['product']->sale_price > 0)
                                    {{number_format($product['product']->sale_price, 0,
                                    ',','.') . '
                                    VND' }}
                                    @else
                                    {{number_format($product['product']->price, 0,
                                    ',','.') . '
                                    VND' }}
                                    @endif
                                </td>
                                <td class="product-quantity">
                                    <input value="{{ $quantities[$product['product']->id] }}" type="number"
                                        wire:model.defer="quantities.{{ $product['product']->id }}"
                                        wire:change="updateQuantity({{ $product['product']->id }})">
                                </td>
                                <td class="product-total">{{number_format($product['subtotal'], 0,',','.') .'VND' }}
                                </td>
                                <td class="product-remove">
                                    @php
                                    $id = $product['product']->id;
                                    @endphp
                                    <a wire:click='remove({{ $id }})'><i class="far fa-window-close"></i></a>
                                </td>
                            </tr>
                            @empty
                            <tr class="table-body-row">
                                <td colspan="7" class="text-center h5">Chưa có sản phẩm nào trong giỏ hàng!</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="total-section">
                    <table class="total-table">
                        <thead class="total-table-head">
                            <tr class="table-total-row">
                                <th>Tổng tiền</th>
                                <th>Đơn giá</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="total-data">
                                <td><strong>Tổng: </strong></td>
                                <td>
                                    @if ($selectedRow)
                                    {{ number_format($totalbill, 0,',','.') . ' VND' }}
                                    @else
                                    0 VND
                                    @endif
                                </td>
                            </tr>
                            <tr class="total-data">
                                <td><strong>Phí vận chuyển: </strong></td>
                                <td>0 VND</td>
                            </tr>
                            <tr class="total-data">
                                <td><strong>Tổng đơn hàng: </strong></td>
                                <td>
                                    @if ($selectedRow)
                                    {{ number_format($totalbill, 0,',','.') . ' VND' }}
                                    @else
                                    0 VND
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="cart-buttons">
                        <a wire:click='clearAllCart()' class="boxed-btn">Xóa tất cả</a>
                        @if($selectedRow)
                        <a wire:click='deleteRow()' class="boxed-btn">Xóa sản phẩm đã chọn</a>
                        @endif
                        <a wire:click='checkout()' class="boxed-btn black mt-sm-2">Đặt hàng</a>
                    </div>
                </div>
                <div class="coupon-section">
                    <h3>Áp dụng mã khuyến mãi</h3>
                    <div class="coupon-form-wrap">
                        <form action="index.html">
                            <p><input type="text" placeholder="Coupon"></p>
                            <p><input type="submit" value="Áp dụng"></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>