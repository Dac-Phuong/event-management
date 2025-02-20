 <div class="container">
     <div class="container-introduce">
         <div class="card mb-3 p-3 mb-4 shadow card-introduce">
             <div class="row" data-aos="fade-up">
                 <div class="col-lg-6">
                     <div class="block-content">
                         <h2 class="text-primary fw-bold">Giới thiệu về chúng tôi!</h2>
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
 </div>
