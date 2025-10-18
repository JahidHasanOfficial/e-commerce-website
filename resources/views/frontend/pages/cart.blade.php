@extends('frontend.layouts.master')
@section('title', 'Cart Page')
@section('content')

<!-- Breadcrumb -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-12">
            <nav class="breadcrumb bg-light mb-30">
                <a class="breadcrumb-item text-dark" href="{{ url('/') }}">Home</a>
                <a class="breadcrumb-item text-dark" href="#">Shop</a>
                <span class="breadcrumb-item active">Shopping Cart</span>
            </nav>
        </div>
    </div>
</div>

<!-- Cart Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-lg-8 table-responsive mb-5">
            <table class="table table-light table-borderless table-hover text-center mb-0">
                <thead class="thead-dark">
                    <tr>
                        <th>Products</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Remove</th>
                    </tr>
                </thead>
                <tbody class="align-middle" id="cart-items">
                    @forelse ($cart as $id => $item)
                        <tr data-id="{{ $id }}">
                            <td class="align-middle">
                                <img src="{{ asset('storage/'.$item['image']) }}" alt="" style="width: 50px;">
                                {{ $item['name'] }}
                                @if(isset($item['size']) || isset($item['color']))
                                <br>
                                <small>
                                    @if(isset($item['size'])) Size: {{ $item['size'] }} @endif
                                    @if(isset($item['color'])) Color: {{ $item['color'] }} @endif
                                </small>
                                @endif
                            </td>
                            <td class="align-middle item-price">${{ number_format($item['price'], 2) }}</td>
                            <td class="align-middle">
                                <div class="input-group quantity mx-auto" style="width: 100px;">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-minus"><i class="fa fa-minus"></i></button>
                                    </div>
                                    <input type="text" class="form-control form-control-sm bg-secondary border-0 text-center quantity-input" value="{{ $item['qty'] }}">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-plus"><i class="fa fa-plus"></i></button>
                                    </div>
                                </div>
                            </td>
                            <td class="align-middle item-total">${{ number_format($item['price'] * $item['qty'], 2) }}</td>
                            <td class="align-middle">
                                <button type="button" class="btn btn-sm btn-danger remove-item" data-id="{{ $id }}"><i class="fa fa-times"></i></button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">Your cart is empty</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="col-lg-4">
            <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Cart Summary</span></h5>
            <div class="bg-light p-30 mb-5">
                <div class="border-bottom pb-2">
                    <div class="d-flex justify-content-between mb-3">
                        <h6>Subtotal</h6>
                        <h6 id="cart-subtotal">${{ number_format($subtotal, 2) }}</h6>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h6 class="font-weight-medium">Shipping</h6>
                        <h6 class="font-weight-medium" id="cart-shipping">${{ number_format($shipping, 2) }}</h6>
                    </div>
                </div>
                <div class="pt-2">
                    <div class="d-flex justify-content-between mt-2">
                        <h5>Total</h5>
                        <h5 id="cart-total">${{ number_format($total, 2) }}</h5>
                    </div>
                    <a href="{{ url('/checkout') }}" class="btn btn-block btn-primary font-weight-bold my-3 py-3">Proceed To Checkout</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
$(document).ready(function() {
    // Use event delegation for dynamic elements
    $(document).on('click', '.btn-plus, .btn-minus', function(e) {
        e.preventDefault();
        
        var row = $(this).closest('tr');
        var input = row.find('.quantity-input');
        var current = parseInt(input.val());
        var newQty = $(this).hasClass('btn-plus') ? current + 1 : (current > 1 ? current - 1 : 1);
        
        if (newQty !== current) {
            updateCartItem(row.data('id'), newQty, row);
        }
    });

    // Direct input change
    $(document).on('change', '.quantity-input', function() {
        var row = $(this).closest('tr');
        var newQty = parseInt($(this).val()) || 1;
        
        if (newQty < 1) newQty = 1;
        $(this).val(newQty);
        
        updateCartItem(row.data('id'), newQty, row);
    });

    // Remove item
    $(document).on('click', '.remove-item', function(e) {
        e.preventDefault();
        
        var id = $(this).data('id');
        var row = $(this).closest('tr');
        
        removeCartItem(id, row);
    });

    function updateCartItem(id, quantity, row) {
        $.ajax({
            url: "{{ route('cart.update') }}",
            method: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                id: id,
                quantity: quantity
            },
            success: function(res) {
                if(res.success){
                    // Update item total
                    row.find('.item-total').text('$' + res.item_total.toFixed(2));
                    
                    // Update cart summary
                    $('#cart-subtotal').text('$' + res.subtotal.toFixed(2));
                    $('#cart-total').text('$' + res.total.toFixed(2));
                    
                    // Show success message
                    showToast('Quantity updated successfully', 'success');
                } else {
                    showToast('Failed to update quantity', 'error');
                }
            },
            error: function() {
                showToast('Error updating quantity', 'error');
            }
        });
    }

    function removeCartItem(id, row) {
        if (!confirm('Are you sure you want to remove this item from cart?')) {
            return;
        }

        $.ajax({
            url: "{{ route('cart.remove') }}",
            method: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                id: id
            },
            success: function(res) {
                if(res.success){
                    // Remove row with animation
                    row.fadeOut(300, function() {
                        $(this).remove();
                        
                        // Check if cart is empty
                        if ($('#cart-items tr').length === 0) {
                            $('#cart-items').html('<tr><td colspan="5" class="text-center">Your cart is empty</td></tr>');
                        }
                        
                        // Update cart summary
                        $('#cart-subtotal').text('$' + res.subtotal.toFixed(2));
                        $('#cart-total').text('$' + res.total.toFixed(2));
                        
                        // Show success message
                        showToast('Item removed from cart', 'success');
                    });
                } else {
                    showToast('Failed to remove item', 'error');
                }
            },
            error: function() {
                showToast('Error removing item', 'error');
            }
        });
    }

    function showToast(message, type = 'info') {
        // Simple toast notification
        const toast = document.createElement('div');
        toast.className = `alert alert-${type === 'success' ? 'success' : type === 'error' ? 'danger' : 'info'} alert-dismissible fade show`;
        toast.innerHTML = `
            ${message}
            <button type="button" class="close" data-dismiss="alert">&times;</button>
        `;
        
        document.body.appendChild(toast);
        
        setTimeout(() => {
            $(toast).alert('close');
        }, 3000);
    }
});
</script>
@endpush