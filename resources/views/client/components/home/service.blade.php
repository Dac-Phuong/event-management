   <style>
       :root {
           --primary-color: #DD6325;
           --secondary-color: #1a1a1a;
           --text-color: #e0e0e0;
           --bg-color: #111;
       }

       .services-section {
           position: relative;
           overflow: hidden;
       }

       .services-section::before {
           content: '';
           position: absolute;
           top: 0;
           left: 0;
           width: 100%;
           height: 100%;
           background: radial-gradient(circle at 20% 50%, rgba(221, 99, 37, 0.1) 0%, transparent 40%);
           z-index: 0;
       }

       .section-title {
           position: relative;
           margin-bottom: 60px;
           text-align: center;
           z-index: 1;
       }

       .section-title h2 {
           font-weight: 700;
           color: #fff;
           font-size: 2.8rem;
           margin-bottom: 15px;
           text-transform: uppercase;
           letter-spacing: 1px;
       }


       .section-title p {
           font-size: 1.1rem;
           max-width: 700px;
           margin: 0 auto;
           opacity: 0.8;
       }

       .service-card {
           background: rgba(30, 30, 30, 0.7);
           border-radius: 12px;
           padding: 20px;
           box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
           transition: all 0.4s ease;
           height: 100%;
           border: 1px solid rgba(255, 255, 255, 0.05);
           position: relative;
           overflow: hidden;
           z-index: 1;
           backdrop-filter: blur(5px);
       }

       .service-card::before {
           content: '';
           position: absolute;
           top: 0;
           left: 0;
           width: 4px;
           height: 0;
           background: var(--primary-color);
           transition: all 0.6s cubic-bezier(0.19, 1, 0.22, 1);
           z-index: -1;
       }

       .service-card:hover {
           transform: translateY(-10px);
           box-shadow: 0 15px 30px rgba(0, 0, 0, 0.5);
           border-color: rgba(221, 99, 37, 0.2);
       }

       .service-card:hover::before {
           height: 100%;
       }

       .service-image {
           width: 100%;
           height: 200px;
           margin: 0 auto 25px;
           border-radius: 8px;
           overflow: hidden;
           position: relative;
           transition: all 0.4s ease;
           border: 1px solid rgba(221, 99, 37, 0.3);
       }

       .service-image img {
           width: 100%;
           height: 100%;
           object-fit: cover;
           transition: all 0.5s ease;
       }

       .service-card:hover .service-image img {
           transform: scale(1.05);
       }

       .service-image::after {
           content: '';
           position: absolute;
           top: 0;
           left: 0;
           width: 100%;
           height: 100%;
           background: linear-gradient(to bottom, rgba(221, 99, 37, 0.1), rgba(17, 17, 17, 0.5));
           transition: all 0.4s ease;
       }

       .service-card:hover .service-image::after {
           background: linear-gradient(to bottom, rgba(221, 99, 37, 0.2), rgba(17, 17, 17, 0.3));
       }

       .service-card h3 {
           font-weight: 700;
           margin-bottom: 20px;
           font-size: 1.5rem;
           position: relative;
           padding-bottom: 10px;
       }

       .service-card h3::after {
           content: '';
           position: absolute;
           bottom: 0;
           left: 0;
           width: 40px;
           height: 2px;
           background: var(--primary-color);
           transition: all 0.4s ease;
       }

       .service-card:hover h3::after {
           width: 80px;
       }

       .service-card p {
           color: rgba(255, 255, 255, 0.7);
           margin-bottom: 25px;
           line-height: 1.7;
           display: -webkit-box;
           -webkit-line-clamp: 3;
           -webkit-box-orient: vertical;
           overflow: hidden;
       }

       .read-more {
           color: var(--primary-color);
           font-weight: 600;
           text-decoration: none;
           display: inline-flex;
           align-items: center;
           transition: all 0.3s ease;
           font-size: 0.95rem !important;
       }

       .read-more i {
           margin-left: 8px;
           transition: all 0.3s ease;
       }

       .read-more:hover {
           color: #fff;
           text-shadow: 0 0 5px rgba(221, 99, 37, 0.5);
       }

       .read-more:hover i {
           transform: translateX(5px);
       }

       /* Animation */
       @keyframes fadeInUp {
           from {
               opacity: 0;
               transform: translateY(20px);
           }

           to {
               opacity: 1;
               transform: translateY(0);
           }
       }

       .service-card {
           animation: fadeInUp 0.6s ease forwards;
           opacity: 0;
       }

       .service-card:nth-child(1) {
           animation-delay: 0.1s;
       }

       .service-card:nth-child(2) {
           animation-delay: 0.2s;
       }

       .service-card:nth-child(3) {
           animation-delay: 0.3s;
       }

       .service-card:nth-child(4) {
           animation-delay: 0.4s;
       }

       .floating-element {
           position: absolute;
           background: rgba(221, 99, 37, 0.1);
           border-radius: 50%;
           filter: blur(30px);
       }
   </style>
   <div>
       <div class="scroll-text scroll-text2"
           style="
          --d: -3;
          --y: -25;
          background: linear-gradient(90deg, #111 20%, #DD6325, #111);
          opacity: 0.3;
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
       </div>
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
