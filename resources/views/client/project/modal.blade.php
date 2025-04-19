 <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="videoModalLabel" aria-hidden="true">
     <div style="position: absolute; top: 20px; right: 20px; cursor: pointer;" data-bs-dismiss="modal" aria-label="Close">
         <i class="ti ti-x text-white fs-3" ></i>
     </div>
     <div class="modal-dialog modal-dialog-centered modal-xl">
         <div class="modal-content bg-transparent">

             <div class="modal-body p-0">
                 <div class="ratio ratio-16x9">
                     <iframe id="videoFrame" src="https://www.youtube.com/embed/{{ $data['project']->url }}?autoplay=1"
                         allowfullscreen></iframe>
                 </div>
             </div>
         </div>
     </div>
 </div>


