@extends('layouts.reseller-dashboard')

@section('content')
<div class="page-body">
    <div class="container-xl">
        <form action="{{ route('reseller.createInvoice') }}" method="POST">
        @csrf     
            <div class="row row-cards">
                
                <div class="col-lg-7">
                    <div class="card">
                        <div class="card-header">
                            <div>
                                <h3 class="card-title">
                                    {{ __('My Cart') }}
                                </h3>
                            </div>
                            <div class="card-actions btn-actions">
                                <x-action.close route="{{ route('reseller.dashboard') }}"/>
                            </div>
                        </div>
                        
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered align-middle">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col">
                                                    {{ __('Product') }}
                                                </th>
                                                <th scope="col" class="text-center">{{ __('Quantity') }}</th>
                                                <th scope="col" class="text-center">{{ __('Price') }}</th>
                                                <th scope="col" class="text-center">{{ __('SubTotal') }}</th>
                                                <th scope="col" class="text-center">
                                                    {{ __('Action') }}
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($carts as $item)
                                            <tr>
                                                <td>
                                                    {{ $item->name }}
                                                </td>
                                                <td style="min-width: 170px;">
                                                        <div class="input-group">
                                                            <input type="number" class="form-control" name="qty[{{$loop->index}}]" required value="{{ old('qty['.$loop->index.']', $item->qty) }}">
                                                        </div>
                                                    </form>
                                                </td>
                                                <td class="text-center">
                                                    {{ $item->price }}
                                                </td>
                                                <td class="text-center">
                                                    {{ $item->subtotal }}
                                                </td>
                                                <td class="text-center">
                                                        <button type="submit" class="btn btn-icon btn-outline-danger " onclick="return confirm('Are you sure you want to delete this record? (not working)')">
                                                            <svg style="position: relative; top: -15px;" xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7l16 0" /><path d="M10 11l0 6" /><path d="M14 11l0 6" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
                                                        </button>
                                        
                                                </td>
                                            </tr>
                                            @empty
                                            <td colspan="5" class="text-center">
                                                {{ __('Add Products') }}
                                            </td>
                                            @endforelse

                                            <tr>
                                                <td colspan="4" class="text-end">
                                                    Total Product
                                                </td>
                                                <td class="text-center">
                                                    {{ Cart::count() }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="4" class="text-end">Subtotal</td>
                                                <td class="text-center">
                                                ₱ {{ Cart::subtotal() }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="4" class="text-end">Tax</td>
                                                <td class="text-center">
                                                ₱ {{ Cart::tax() }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="4" class="text-end">Total</td>
                                                <td class="text-center">
                                                ₱ {{ Cart::total() }}
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                            
                    </div>
                </div>

                <div class="col-lg-5">
                    <!-- Shipping Details -->
                    <div class="card mb-4">
                        <div class="card-header">
                            Shipping Details
                        </div>
                        <div class="card-body">

                            <!-- Form Group (name) -->
                            <div class="mb-3">
                                <label class="small mb-1" for="name">Full name</label>
                                <input class="form-control form-control-solid @error('name') is-invalid @enderror" id="name" name="name" type="text" placeholder="" value="{{ old('name') }}" autocomplete="off" />
                                @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                                
                            </div>
                            <div class="mb-3">
                                <label class="small mb-1" for="email">
                                    Street Address
                                </label>

                                <input class="form-control form-control-solid @error('address') is-invalid @enderror" id="address" name="address" type="text" placeholder="" value="{{ old('address') }}"  autocomplete="off" />
                                @error('address')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="small mb-1" for="email">
                                    Zip Code
                                </label>

                                <input class="form-control form-control-solid @error('zip') is-invalid @enderror" id="zip" name="zip" type="text" placeholder="" value="{{ old('zip') }}"  autocomplete="off" />
                                @error('zip')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="small mb-1" for="email">
                                    City
                                </label>

                                <input class="form-control form-control-solid @error('city') is-invalid @enderror" id="city" name="city" type="text" placeholder="" value="{{ old('city') }}"  autocomplete="off" />
                                @error('city')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="small mb-1" for="email">
                                    Phone Number
                                </label>

                                <input class="form-control form-control-solid @error('phone') is-invalid @enderror" id="phone" name="phone" type="text" placeholder="" value="{{ old('phone') }}"  autocomplete="off" />
                                @error('phone')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="card-footer text-end">
                                <button type="submit" class="btn btn-success add-list mx-1">
                                    {{ __('Check Out') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@pushonce('page-scripts')
    <script src="{{ asset('assets/js/img-preview.js') }}"></script>
@endpushonce
