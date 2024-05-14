@extends('layouts.tabler')

@section('content')
<div class="page-body">
    <div class="container-xl">
        <div class="card">
            <div class="card-header">
                <div>
                    <h3 class="card-title">
                        {{ __('Order Details') }}
                    </h3>
                </div>

                <div class="card-actions btn-actions">
                    <!-- Download SVG icon from http://tabler-icons.io/i/dots-vertical -->
                    <!-- dropdown approval not available for now
                    <div class="dropdown">
                        <a href="#" class="btn-action dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path>
                                <path d="M12 19m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path>
                                <path d="M12 5m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path>
                            </svg>
                        </a>

                        
                        <div class="dropdown-menu dropdown-menu-end" style="">
                            @if ($order->order_status === \App\Enums\OrderStatus::PENDING)
                            <form action="{{ route('orders.update', $order) }}" method="POST">
                                @csrf
                                @method('put')

                                <button type="submit" class="dropdown-item text-success" onclick="return confirm('Are you sure you want to approve this order?')">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-check" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M5 12l5 5l10 -10" />
                                    </svg>

                                    {{ __('Approve Order') }}
                                </button>
                            </form>
                            @endif
                        </div>
                        
                    </div>
                    -->
                    <x-action.close route="{{ route('orders.index') }}" />
                </div>
            </div>
            <div class="card-body">
                <div class="row row-cards mb-3">
                    <div class="col">
                        <label for="order_date" class="form-label required">
                            {{ __('Order Date') }}
                        </label>
                        <input type="text" id="order_date" class="form-control" value="{{ $order->order_date->format('d-m-Y') }}" disabled>
                    </div>

                    <div class="col">
                        <label for="invoice_no" class="form-label required">
                            {{ __('Invoice No.') }}
                        </label>
                        <input type="text" id="invoice_no" class="form-control" value="{{ $order->invoice_no }}" disabled>
                    </div>

                    <div class="col">
                        <label for="customer" class="form-label required">
                            {{ __('Customer Name') }}
                        </label>
                        <input type="text" id="customer" class="form-control" value="{{ $order->user->name }}" disabled>
                    </div>

                    <div class="col">
                        <label for="customer" class="form-label">
                            {{ __('Order Status') }}
                        </label>
                        <x-status dot color="{{ $order->order_status === \App\Enums\OrderStatus::COMPLETE ? 'green' : 'orange' }}" class="text-uppercase">
                            {{ $order->order_status->label() }}
                        </x-status>
                    </div>



                </div>
            </div>
            <div class="card-header">
                <div>
                    <h3 class="card-title">
                        {{ __('Payment Details') }}
                    </h3>
                </div>
            </div>
            <div class="card-body">
                <div class="row row-cards mb-3">
                    <div class="col">
                        <label for="payment_type" class="form-label required">
                            {{ __('Payment Type') }}
                        </label>

                        <input type="text" id="payment_type" class="form-control" value="{{ $order->payment_type }}" disabled>
                    </div>

                    <div class="col">
                        <label for="reference_number" class="form-label required">
                            {{ __('Reference Number') }}
                        </label>
                        <input type="text" id="reference_number" class="form-control" value="{{ $order->reference_number }}" disabled>
                    </div>

                    <div class="col">
                        <label for="account_number" class="form-label required">
                            {{ __('Account Number') }}
                        </label>
                        <input type="text" id="account_number" class="form-control" value="{{ $order->account_number }}" disabled>
                    </div>
                    
                    <div class="col">
                        <label for="account_name" class="form-label required">
                            {{ __('Account Name') }}
                        </label>
                        <input type="text" id="account_name" class="form-control" value="{{ $order->account_name }}" disabled>
                    </div>

                    <div class="col">
                        <label for="pay Paid" class="form-label required">
                            {{ __('Amount Transferred') }}
                        </label>
                        <input type="text" id="pay" class="form-control" value="{{ $order->pay }}" disabled>
                    </div>

                </div>
            </div>
            
            <div class="card-header">
                <div>
                    <h3 class="card-title">
                        {{ __('Delivery Details') }}
                    </h3>
                </div>
            </div>
            
            <form action="{{ route('orders.delivery', $order) }}" method="POST">
                <div class="card-body">
                    <div class="row row-cards mb-3">
                        <div class="col">
                            <label for="payment_type" class="form-label required">
                                {{ __('Courier') }}
                            </label>
    
                            <input type="text" id="payment_type" class="form-control" value="J&T Express" disabled>
                        </div>
                        
                        <div class="col">
                            <label for="tracking_no" class="form-label required">
                                {{ __('Tracking Number') }}
                            </label>
    
                            <input type="text" id="tracking_no" name="tracking_no" class="form-control @error('tracking_no') is-invalid @enderror" value="{{ $order->tracking_no }}" {{ auth()->user()->id < 1000 ? "" : "disabled" }}>
                            @error('tracking_no')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered align-middle">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" class="align-middle text-center">No.</th>
                                    <th scope="col" class="align-middle text-center">Photo</th>
                                    <th scope="col" class="align-middle text-center">Product Name</th>
                                    <th scope="col" class="align-middle text-center">Product Code</th>
                                    <th scope="col" class="align-middle text-center">Size</th>
                                    <th scope="col" class="align-middle text-center">Quantity</th>
                                    <th scope="col" class="align-middle text-center">Price</th>
                                    <th scope="col" class="align-middle text-center">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order->details as $item)
                                <tr>
                                    <td class="align-middle text-center">
                                        {{ $loop->iteration  }}
                                    </td>
                                    <td class="align-middle text-center">
                                        <div style="max-height: 80px; max-width: 80px;">
                                            <img class="img-fluid" src="{{ $item->product->product_image ? asset('storage/products/'.$item->product->product_image) : asset('assets/img/products/default.webp') }}">
                                        </div>
                                    </td>
                                    <td class="align-middle text-center">
                                        {{ $item->product->name }}
                                    </td>
                                    <td class="align-middle text-center">
                                        {{ $item->product->code }}
                                    </td>
                                    <td class="align-middle text-center">
                                        {{ $item->size }}
                                    </td>
                                    <td class="align-middle text-center">
                                        {{ $item->quantity }}
                                    </td>
                                    <td class="align-middle text-center">
                                        {{ number_format($item->unitcost, 2) }}
                                    </td>
                                    <td class="align-middle text-center">
                                        {{ number_format($item->total, 2) }}
                                    </td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td colspan="7" class="text-end">
                                        Paid amount
                                    </td>
                                    <td class="text-center">{{ number_format($order->pay, 2) }}</td>
                                </tr>
                                <tr>
                                    <td colspan="7" class="text-end">Due</td>
                                    <td class="text-center">{{ number_format($order->due, 2) }}</td>
                                </tr>
                                
                                <tr>
                                    <td colspan="7" class="text-end">-</td>
                                    <td class="text-center">-</td>
                                </tr>
                                
                                <tr>
                                    <td colspan="7" class="text-end">Subtotal</td>
                                    <td class="text-center">{{ number_format($order->total, 2) }}</td>
                                </tr>
                                <tr>
                                    <td colspan="7" class="text-end">VAT</td>
                                    <td class="text-center">{{ number_format($order->vat, 2) }}</td>
                                </tr>
                                <tr>
                                    <td colspan="7" class="text-end">Shipping Fee</td>
                                    <td class="text-center">{{ number_format($order->shipping_fee, 2) }}</td>
                                </tr>
                                <tr>
                                    <td colspan="7" class="text-end">Total</td>
                                    <td class="text-center">{{ number_format($order->total + $order->shipping_fee, 2) }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                
                @if (auth()->user()->id < 1000)
                <div class="card-footer text-end">
                    @if ($order->order_status === \App\Enums\OrderStatus::PENDING)
                    
                        @method('put')
                        @csrf
    
                        <button type="submit" class="btn btn-success" onclick="return confirm('Are you sure you want to set this order for delivery?')">
                            {{ __('On Delivery') }}
                        </button>
      
                    @endif
                </div>
                @endif
            </form>
            
            @if (auth()->user()->id < 1000)
            <div class="card-footer text-end">
                @if ($order->order_status === \App\Enums\OrderStatus::ON_DELIVERY)
                <form action="{{ route('orders.update', $order) }}" method="POST">
                    @method('put')
                    @csrf

                    <button type="submit" class="btn btn-success" onclick="return confirm('Are you sure you want to complete this order?')">
                        {{ __('Complete Order') }}
                    </button>
                </form>
                @endif
            </div>
            @endif
            
            @if (auth()->user()->id >= 1000 && $order->order_status === \App\Enums\OrderStatus::PENDING)
                @php
                  $now = Carbon\Carbon::now();
                  $minutesUntilNextHour = 60 - $now->minute;
                
                  // If $created_at is a Carbon instance already (common in relationships)
                  if (method_exists($order->created_at, 'diffInMinutes')) {
                    $minutesSinceCreated = $order->created_at->diffInMinutes($now);
                  } else {
                    // If $created_at is a string format (from database)
                    $minutesSinceCreated = Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $order->created_at)->diffInMinutes($now);
                  }
                
                  $remainingMinutes = 120 - $minutesSinceCreated;
                  
                    $remainingHours = floor($remainingMinutes / 60);
                    $remainingMinutes = $remainingMinutes % 60;
                @endphp
            <div class="card-footer text-end">
                Note: You can only cancel within 2 hours after you placed your order. <br>
                
                @if ($remainingHours > 0)
                      {{ $remainingHours }} hour and {{ $remainingMinutes }} minutes remaining
                @else
                  {{ $remainingMinutes }} minutes remaining
                @endif


                <br><br>
               
                <form action="{{ route('orders.cancel', $order) }}" method="POST">
                    @method('put')
                    @csrf

                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to cancel this order?')">
                        {{ __('Cancel Order') }}
                    </button>
                </form>
               
            </div>
            @endif
        </div>

    </div>
</div>
@endsection