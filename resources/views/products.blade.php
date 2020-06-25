@extends('layouts.front.app')
@section('title','Products')


@section('content')

<article>
             <div class="component-brands">
              <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                <?php $count=1; ?>
                @foreach($vendors->chunk(5) as $vendor)
                  <div <?php if($count==1){ ?> class="carousel-item active" <?php } else { ?> class="carousel-item" <?php } ?>>
                    <div class="card-deck">
                    @foreach($vendor as $item)
                      <div class="card mb-3">
                        <div class="card-brands-img">
                          <img src="{{ URL::to('/') }}/storage/vendor_profile/{{$item->image}}" class="card-img-top" alt="Adidas">
      
                        </div>
                        <div class="card-body">
                          <h5 class="card-title">{{$item->first_name}}</h5>
                         
                        </div>
                      </div>  
                      @endforeach
                    </div>
                   
                    </div>
                    <?php $count++; ?>
                    @endforeach
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                  <span class="" aria-hidden="true">
                    <i class="fas fa-chevron-left"></i>
                  </span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                  <span class="" aria-hidden="true">
                    <i class="fas fa-chevron-right"></i>
                  </span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
              <form action="{{ url('products') }}" method="get">
                <div class="form-row">
                  <div class="form-group col-md-4">
                    <input style="height: 42px;" type="search" class="form-control" value="{{ request()->search }}" placeholder="Search">

                  </div>
                  <div class="form-group col-md-3">
                    <select id="inputState" name="category_id" class="form-control fom-inpt">
                      <option class="option-s" value="">Category </option>
                      @foreach($categories as $category)
                        <option value="{{$category->id}}" class="option-s" {{ request()->category_id == $category->id ? 'selected' : '' }}>{{$category->name}}</option>
                      @endforeach 
                    </select>                     
                  </div>
                  <div class="form-group col-md-3">
                    <select name="commission" class="form-control fom-inpt">
                      <option class="option-s">Commission</option>
                      @foreach($commissions as $commission)
                        <option class="option-s" value="{{$commission->commission}}" {{ request()->commission == $commission->commission ? 'selected' : '' }}>{{$commission->commission}}</option>
                      @endforeach 
                    </select>                     
                  </div>
                  <div class="form-group col-md-1">
                    <button style="height: 43px; width: 81px;background: red;color: white;" type="submit" class="btn"><i class="fa fa-search"></i> بحث</button>                    
                  </div>
                  <div class="form-group col-md-1">
                    <a style="height: 43px; width: 81px;background: red;color: white;" class="btn" href="{{asset('/products')}}"><i class="fa fa-back"></i> Back</a>
                  </div>
                  
                </div>
              </from>
              <table style="width: 100%;"
               id="example" class="table table-hover table-striped 
               table-bordered dataTable dtr-inline" role="grid" aria-describedby="example_info">
                <thead class="table-thead">
                <tr role="row">
                  <th class="sorting_asc" tabindex="0">PRODUCT</th>
                  <th class="sorting_asc" tabindex="0">Brand</th>
                  <th class="sorting_asc" tabindex="0">PRICE</th>
                  <th class="sorting_asc" tabindex="0">COMMISSION</th>
                  <th class="sorting_asc" tabindex="0">Rate</th>
                  <th class="sorting_asc" tabindex="0">AVAILABILITY</th>
                  <th class="sorting_asc" tabindex="0">Catalog</th>
                  <th class="sorting_asc" tabindex="0">Order</th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                <tr role="row" class="">
                    <td class="td-img">
                      <img src="{{ URL::to('/') }}/storage/products_image/{{$product->image}}">
                      <span>{{$product->name}}</span>
                    </td>
                    <td>{{vendor_name($product->vendor_id)}}</td>
                    <td>{{$product->price}} LE</td>
                    <td>{{$product->commission}} LE</td>
                    <td><div class="rating-stars text-right">
                      <ul id="stars">
                        <li class="star" title="Poor" data-value="1">
                          <i class="fa fa-star fa-fw" aria-hidden="true"></i>
                        </li>
                        <li class="star" title="Fair" data-value="2">
                          <i class="fa fa-star fa-fw" aria-hidden="true"></i>
                        </li>
                        <li class="star" title="Good" data-value="3">
                          <i class="fa fa-star fa-fw" aria-hidden="true"></i>
                        </li>
                        <li class="star" title="Excellent" data-value="4">
                          <i class="fa fa-star fa-fw" aria-hidden="true"></i>
                        </li>
                        <li class="star" title="WOW!!!" data-value="5">
                          <i class="fa fa-star fa-fw" aria-hidden="true"></i>
                        </li>
                      </ul>
                    </div></td>
                    <td>{{$product->stock}} In Stock</td>
                    <td>@if(isset($product->catalog))<a href="{{ Storage::disk('public')->url('products_image/'.$product->catalog) }}" download><img style="background-color: red;border: 1px solid red;" src="{{asset('front_files')}}/file/pdf.png"></a>@endif</td>
                    <td>2</td>
                </tr>
               @endforeach
              </tbody>
               
              </table>
              
            </div>
        </article>

@endsection
