@extends('layouts.app')

@section('content')
<div class="container">
    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif
    @if(Session::has('flash_message_error'))
      <div style="color: white;background: red;" class="alert alert-error alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{!! session('flash_message_error') !!}</strong>
     </div>
    @endif

    @if(Session::has('flash_message_success'))
      <div style="color: white;background: green;" class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{!! session('flash_message_success') !!}</strong>
     </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div style="text-align: center; font-weight: bold;font-size: 20px;" class="card-header">{{ __('Customer') }}</div>
                <div class="card-body">
                    <form action="{{ route('affiliates.orders.store', $user->id) }}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('post') }}
                        <div class="form-group row">

                            <div class="col-md-12">
                                <label for="full_name" class="col-form-label text-md-right">{{ __('Full Name (Required)') }}</label>
                                <input id="full_name" type="text" class="form-control{{ $errors->has('full_name') ? ' is-invalid' : '' }}" name="full_name"  placeholder="Full Name" required autofocus>

                                @if ($errors->has('full_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('full_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-12">
                                <label for="phone" class="col-form-label text-md-right">{{ __('Phone (Required)') }}</label>
                                <input id="phone" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone"  placeholder="Phone" required autofocus>

                                @if ($errors->has('phone'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-12">
                                <label for="governrate" class="col-form-label text-md-right">{{ __('Governrate (Required)') }}</label>
                                <select name="governrate" class="form-control" required autofocus>
                                    <option value="Gharbia">Gharbia</option>
                                    <option value="Dakahlia" >Dakahlia</option>
                                    <option value="Sharqiya">Sharqiya</option>
                                    <option value="Cairo">Cairo</option>
                                    <option value="Alexandria">Alexandria</option>
                                </select>

                                @if ($errors->has('governrate'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('governrate') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-12">
                                <label for="city" class="col-form-label text-md-right">{{ __('City (Required)') }}</label>
                                <select name="city" class="form-control" required autofocus>
                                    <option value="tanta">tanta</option>
                                    <option value="Aga" >Aga</option>
                                    <option value="Elmenia">Elmenia</option>
                                    <option value="Mansoura">Mansoura</option>
                                </select>

                                @if ($errors->has('city'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-12">
                                <label for="address" class="col-form-label text-md-right">{{ __('Address (Required)') }}</label>
                                <input id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address"  placeholder="address" required autofocus>

                                @if ($errors->has('address'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>

                        </div>
                        <div class="card">
                            <div style="text-align: center; font-weight: bold;font-size: 20px;" class="card-header">{{ __('Order') }}</div>
                            <div class="card-body">
                            <h2>Add Items</h2>
                                    <div class="form-group row">
                                        <div class="col-md-2">
                                            <label for="full_name" class="col-form-label text-md-right">{{ __('Product') }}</label>
                                            <select name="product[]" class="form-control" required autofocus>
                                                <option value="">اختر المنتج</option>
                                                @foreach($products as $product)
                                                    <option value="{{$product->id}}">{{$product->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="price" class="col-form-label text-md-right">{{ __('Price') }}</label>
                                            <input id="price" type="text" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" name="price[]"  placeholder="Price" required autofocus>

                                            @if ($errors->has('full_name'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('full_name') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="col-md-2">
                                            <label for="quantity" class="col-form-label text-md-right">{{ __('Quantity') }}</label>
                                            <input id="quantity" type="text" class="form-control{{ $errors->has('quantity') ? ' is-invalid' : '' }}" name="products[1][quantity]"  placeholder="Quantity" required autofocus>

                                            @if ($errors->has('full_name'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('full_name') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="col-md-2">
                                            <label for="total" class="col-form-label text-md-right">{{ __('Total') }}</label>
                                            <input id="total" type="text" class="form-control{{ $errors->has('total') ? ' is-invalid' : '' }}" name="total[]"  placeholder="Total" required autofocus>

                                            @if ($errors->has('total'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('total') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="col-md-2">
                                            <label for="commission" class="col-form-label text-md-right">{{ __('Commission') }}</label>
                                            <input id="commission" type="text" class="form-control{{ $errors->has('commission') ? ' is-invalid' : '' }}" name="commission[]"  placeholder="Commission" required autofocus>

                                            @if ($errors->has('commission'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('commission') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="col-md-2">
                                            <label for="full_name" class="col-form-label text-md-right">{{ __('Size') }}</label>
                                            <select name="size[]" class="form-control" required autofocus>
                                                <option value="">اختر المقاس</option>
                                                <option value="40">41</option>
                                                <option value="42">42</option>
                                                <option value="43">43</option>
                                                
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-2">
                                            <label for="full_name" class="col-form-label text-md-right">{{ __('Product') }}</label>
                                            <select name="product[]" class="form-control" required autofocus>
                                                <option value="">اختر المنتج</option>
                                                @foreach($products as $product)
                                                    <option value="{{$product->id}}">{{$product->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="price" class="col-form-label text-md-right">{{ __('Price') }}</label>
                                            <input id="price" type="text" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" name="price[]"  placeholder="Price" required autofocus>

                                            @if ($errors->has('full_name'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('full_name') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="col-md-2">
                                            <label for="quantity" class="col-form-label text-md-right">{{ __('Quantity') }}</label>
                                            <input id="quantity" type="text" class="form-control{{ $errors->has('quantity') ? ' is-invalid' : '' }}"  name="products[4][quantity]"  placeholder="Quantity" required autofocus>

                                            @if ($errors->has('full_name'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('full_name') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="col-md-2">
                                            <label for="total" class="col-form-label text-md-right">{{ __('Total') }}</label>
                                            <input id="total" type="text" class="form-control{{ $errors->has('total') ? ' is-invalid' : '' }}" name="total[]"  placeholder="Total" required autofocus>

                                            @if ($errors->has('total'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('total') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="col-md-2">
                                            <label for="commission" class="col-form-label text-md-right">{{ __('Commission') }}</label>
                                            <input id="commission" type="text" class="form-control{{ $errors->has('commission') ? ' is-invalid' : '' }}" name="commission[]"  placeholder="Commission" required autofocus>

                                            @if ($errors->has('commission'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('commission') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="col-md-2">
                                            <label for="full_name" class="col-form-label text-md-right">{{ __('Size') }}</label>
                                            <select name="size[]" class="form-control" required autofocus>
                                                <option value="">اختر المقاس</option>
                                                <option value="40">41</option>
                                                <option value="42">42</option>
                                                <option value="43">43</option>
                                                
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-2">
                                            <label for="full_name" class="col-form-label text-md-right">{{ __('Product') }}</label>
                                            <select name="product[]" class="form-control" required autofocus>
                                                <option value="">اختر المنتج</option>
                                                @foreach($products as $product)
                                                    <option value="{{$product->id}}">{{$product->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="price" class="col-form-label text-md-right">{{ __('Price') }}</label>
                                            <input id="price" type="text" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" name="price[]"  placeholder="Price" required autofocus>

                                            @if ($errors->has('full_name'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('full_name') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="col-md-2">
                                            <label for="quantity" class="col-form-label text-md-right">{{ __('Quantity') }}</label>
                                            <input id="quantity" type="text" class="form-control{{ $errors->has('quantity') ? ' is-invalid' : '' }}" name="products[3][quantity]"  placeholder="Quantity" required autofocus>

                                            @if ($errors->has('full_name'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('full_name') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="col-md-2">
                                            <label for="total" class="col-form-label text-md-right">{{ __('Total') }}</label>
                                            <input id="total" type="text" class="form-control{{ $errors->has('total') ? ' is-invalid' : '' }}" name="total[]"  placeholder="Total" required autofocus>

                                            @if ($errors->has('total'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('total') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="col-md-2">
                                            <label for="commission" class="col-form-label text-md-right">{{ __('Commission') }}</label>
                                            <input id="commission" type="text" class="form-control{{ $errors->has('commission') ? ' is-invalid' : '' }}" name="commission[]"  placeholder="Commission" required autofocus>

                                            @if ($errors->has('commission'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('commission') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="col-md-2">
                                            <label for="full_name" class="col-form-label text-md-right">{{ __('Size') }}</label>
                                            <select name="size[]" class="form-control" required autofocus>
                                                <option value="">اختر المقاس</option>
                                                <option value="40">41</option>
                                                <option value="42">42</option>
                                                <option value="43">43</option>
                                                
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <label for="total" class="col-form-label text-md-right">{{ __('Total') }}</label>
                                            <input id="total" type="text" class="form-control{{ $errors->has('total') ? ' is-invalid' : '' }}" name="grand_total"  placeholder="total" required autofocus>

                                            @if ($errors->has('total'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('total') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Add Order') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
