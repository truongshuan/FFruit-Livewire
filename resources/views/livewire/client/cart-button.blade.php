<form wire:submit.prevent="submitQuantity({{$product}})">
    <input wire:model="quantity" type="number" placeholder="0" min="0" required>
    <br>
    <button class="custom-btn" type="submit" style="background-color: #f28123;">Thêm vào giỏ</button>
</form>