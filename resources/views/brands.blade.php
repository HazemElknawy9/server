@extends('layouts.front.app')
@section('title','Brands')


@section('content')

  <article>
     <div class="component-brands">
      <div id="post_brand_data" class="card-deck">
        <div class="row" style="display: contents;">
        {{ csrf_field() }}

        </div>
      </div>
      <!-- <div class="component-link-product">
        <button type="button" class="btn btn-link
        "data-toggle="modal">Load More</button>

      </div> -->
    </div>
</article>
@endsection
