 <div class="container introduce">
     <div class="container-introduce">
         <div class="card mb-3 p-3 mb-4 shadow card-introduce">
             <div class="row" data-aos="fade-up">
                 <div class="col-lg-6">
                     <div class="block-content">
                         <h2 class="text-primary fs-1 fw-bold">Giới thiệu về chúng tôi!</h2>
                         <div class="">
                             <p class="mb-2">
                                 {!! isset($settings['introduce_content']) ? $settings['introduce_content'] : '' !!}
                             </p>
                         </div>
                     </div>
                 </div>
                 <div class="col-lg-6 block-image d-lg-block d-none">
                     <img src="{{ asset(isset($settings['introduce_image_2']) ? $settings['introduce_image_2'] : 'assets/files/img/img-model.png') }}"
                         style=""
                         data-src="{{ asset(isset($settings['introduce_image_2']) ? $settings['introduce_image_2'] : 'assets/files/img/img-model.png') }}"
                         alt="Về chúng tôi" class="fade show">
                 </div>
             </div>
         </div>
     </div>
     <div class="row">
         <div class="col-xs-12">
             <div class="_df_book" webgl="true" source="{{isset($settings['introduce_pdf']) ? asset($settings['introduce_pdf']) : 'assets/books/test.pdf'}}" id="df_manual_book"
                 backgroundcolor="transparent">
             </div>
         </div>
     </div>
 </div>
 @push('scripts')
     <script>
         $(document).ready(function() {
             $(".df-container").on("wheel", function(event) {
                 try {
                     let flipBook = $(this).data("fb3d-instance");
                     if (event.ctrlKey) {
                         event.preventDefault();
                     } else {
                         if (flipBook) {
                             if (event.originalEvent.deltaY > 0) {
                                 flipBook.nextPage();
                             } else {
                                 flipBook.prevPage();
                             }
                             event.preventDefault();
                         }
                     }
                 } catch (error) {
                     console.warn("Lỗi bị ẩn:", error.message);
                 }
             });
         });
     </script>
 @endpush
