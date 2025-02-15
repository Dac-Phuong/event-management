 <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="videoModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered modal-xl">
         <div class="modal-content">
             <div class="modal-header p-0">
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="z-index: 1"></button>
             </div>
             <div class="modal-body p-2">
                 <div class="ratio ratio-16x9">
                     <iframe id="videoFrame" src="https://www.youtube.com/embed/{{$data['project']->url}}?autoplay=1"
                         allowfullscreen></iframe>
                 </div>
             </div>
         </div>
     </div>
 </div>

 @push('scripts')
     <script>
         $(document).ready(function() {
             var videoSrc = $("#videoFrame").attr("src");
             $("#videoModal").on("hidden.bs.modal", function() {
                 $("#videoFrame").attr("src", "");
             });
             $("#videoModal").on("shown.bs.modal", function() {
                 $("#videoFrame").attr("src", videoSrc);
             });
         });
     </script>
 @endpush
