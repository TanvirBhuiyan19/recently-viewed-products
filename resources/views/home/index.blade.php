 @if ($session_products != null)
     <h5>Recently viewed products:</h5>
     <hr>
     <div class="row">
         @foreach ($session_products as $key => $pfdata)
             <div class="col-md-2 gap-3">
                 <a href="{{ route('front.product', $pfdata['slug']) }}">
                     <img src="{{ asset('upload/ecom_products/' . @$pfdata['p_image']) }}"
                         alt="{{ @$pfdata['product_name'] }}" width="100%" height="auto;" />
                     <p class="text-center" style="height: 55px; padding: 5px 0px;">{!! Illuminate\Support\Str::limit(strip_tags($pfdata['product_name'] ?? ''), 40) !!}</p>
                     <hr style="margin: 1px 0px">
                     <small class="text-center"
                         style="color:#ff7913">{{ \Carbon\Carbon::parse($pfdata['time'])->diffForHumans() }}</small>
                 </a>
             </div>
         @endforeach
     </div>
     <br>
 @endif
