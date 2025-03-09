 <div class="card mt-4">
     <div class="card-header pb-0">
         <h5 class="card-title text-uppercase">Bài viết nổi bật</h5>
     </div>
     <div class="card-body">
         <div class="list-group">
             @if (isset($feature) && count($feature) > 0)
                 @foreach ($feature as $item)
                     <a href="{{ 'blog/' . $item->category->slug . '/' . $item->slug }}"
                         class="text-decoration-none mb-2">
                         <div class="d-flex w-100">
                             <img class="card-img " height="70" width="50" src="{{ asset($item->thumbnail) }}"
                                 alt="Card image" style="width: 80px; ">
                             <div style="margin-left: 10px">
                                 <h5 class="card-title fs-6 text-hover text-uppercase m-0"
                                     style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                                     {{ $item->title }}</h5>
                                 <p class="card-text"><small class="text-muted"><i
                                             class="ti ti-calendar-stats me-2"></i>
                                         {{ $item->created_at }}</small></p>
                             </div>
                         </div>
                     </a>
                 @endforeach
             @else
                 <p class="text-primary">Chưa có tin nổi bật</p>
             @endif
         </div>
     </div>
 </div>
