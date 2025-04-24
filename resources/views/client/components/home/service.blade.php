
   <div>
       {{-- <div class="scroll-text scroll-text2"
           style="
          --d: -3;
          --y: -25;
          background: linear-gradient(90deg, #111 20%, #1E64A5, #111);
          opacity: 1;
        ">
           <div>
               <span>ANH SON GROUP  ANH SON GROUP  ANH SON GROUP  ANH SON GROUP  ANH SON
                   GROUP  ANH SON GROUP  ANH SON GROUP  ANH SON GROUP  ANH SON
                   GROUP  ANH SON GROUP  </span>
           </div>
           <div>
               <span>ANH SON GROUP  ANH SON GROUP  ANH SON GROUP  ANH SON GROUP  ANH SON
                   GROUP  ANH SON GROUP  ANH SON GROUP  ANH SON GROUP  ANH SON
                   GROUP  ANH SON GROUP  </span>
           </div>
       </div> --}}
       
       <div class="services-section pb-5" data-aos="fade-up" data-aos-duration="800">
           <div class="container">
               <div class="center-content section-title my-5" data-aos="zoom-in" data-aos-delay="200">
                   <h2 class="text-gradient middle-content stroke-text">
                       Dịch vụ của chúng tôi </h2>
                   <div class="divider"></div>
                   <p>Tìm hiểu các dịch vụ của chúng tôi, được tối ưu hóa để mang đến những trải nghiệm xuất sắc nhất cho cả doanh nghiệp và cá nhân</p>
               </div>
               <div class="row g-2">
                   @foreach ($services as $index => $service)
                       <div class="col-lg-4 md-p-0 p-2" data-aos="fade-up" data-aos-delay="{{ 300 + $index * 100 }}">
                           <div class="service-card">
                               <div class="service-image" data-aos="zoom-in" data-aos-delay="{{ 400 + $index * 100 }}">
                                   <img src="{{ $service->thumbnail }}" alt="Tour du lịch văn hoá">
                               </div>
                               <h3>{{ $service->name }}</h3>
                               <p>{{ $service->description }}.</p>
                               <a href="{{ url('/dich-vu/' . $service->slug) }}" class="read-more">Khám phá ngay <i
                                       class="fas fa-arrow-right"></i></a>
                           </div>
                       </div>
                   @endforeach
               </div>
           </div>
       </div>
   </div>
