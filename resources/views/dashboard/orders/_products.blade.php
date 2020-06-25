<link href="{{asset('dashboard_files/theme_rtl')}}/assets/pages/css/invoice-rtl.min.css" rel="stylesheet" type="text/css" />
<div style="background-color: white;border-radius: 15px !important;padding: 13px;" class="invoice">
    <div class="row invoice-logo">
        <div class="col-xs-6 invoice-logo-space">
            <img src="{{asset('dashboard_files/theme_rtl')}}/walmart.png" class="img-responsive" alt="" /> </div>
        <div class="col-xs-6">
            <p> #{{$order->id}} / {{$order->created_at->toFormattedDateString()}}
          </p>
        </div>
    </div>
    <hr/>
    <div class="row">
        <div class="col-xs-12">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                      <th> # </th>
                      <th> اسم الصنف </th>
                      <th> الكمية </th>
                      <th> السعر </th>
                      <th> الإجمالي </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $index=> $product)
                      <tr>
                          <td> {{ $index + 1 }} </td>
                          <td> {{ $product->name }} </td>
                          <td> {{ $product->pivot->quantity }}</td>
                          <td> {{ $product->price }}</td>
                          <td> {{ $product->pivot->quantity * $product->price}} </td>
                      </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-4">
            <div class="well">
                <ul class="list-unstyled amounts">
                  @if(!empty($order->discount))
                  <li>
                      <strong>الإجالي:</strong> {{$order->total_price + $order->discount}} 
                  </li>
                  <li>
                      <strong>الخصم:</strong> {{$order->discount}}
                  </li>
                  <li>
                      <strong></strong> ------------------ 
                  </li>
                  <li>
                      <strong>الإجمالي بعد الخصم:</strong> {{$order->total_price - $order->discount}} 
                  </li>
                  @else
                  <li>
                      <strong>الإجالي:</strong> {{$order->total_price}} 
                  </li>
                  <li>
                      <strong>الخصم:</strong> 0
                  </li>
                   <li>
                      <strong></strong> ------------------ 
                  </li>
                  <li>
                      <strong>الإجمالي بعد الخصم:</strong> {{$order->total_price}} 
                  </li>
                  @endif
                 
              </ul>
            </div>
        </div>
        <div class="col-xs-8 invoice-block">
            <ul class="list-unstyled amounts">
                <li>
                <li>
                <li>
                <li>
            </ul>
            <br/>
            <a class="btn btn-lg blue hidden-print margin-bottom-5" onclick="javascript:window.print();"> طباعة
                <i class="fa fa-print"></i>
            </a>
        </div>
    </div>
</div>
