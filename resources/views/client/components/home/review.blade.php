 <style>
     /* Testimonials section */
     .testimonials {
         margin: 50px 0;
         padding-bottom: 50px;
         position: relative;
         overflow: hidden;
         background: linear-gradient(135deg, var(--primary-color) 0%, #2D8BD6 100%);
     }

     .testimonials .section-title p , .testimonials .section-title h2{
         color: var(--text-white) !important;
     }

     .testimonials::before {
         content: '';
         position: absolute;
         top: -100px;
         right: -100px;
         width: 300px;
         height: 300px;
         background-color: rgba(255, 255, 255, 0.05);
         border-radius: 50%;
     }

     .testimonials::after {
         content: '';
         position: absolute;
         bottom: -150px;
         left: -150px;
         width: 400px;
         height: 400px;
         background-color: rgba(255, 255, 255, 0.05);
         border-radius: 50%;
     }

     .testimonials-grid {
         display: grid;
         grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
         gap: 1rem;
         margin-top: 3rem;
     }

     .testimonial-card {
         border-radius: 12px;
         padding: 2.5rem;
         box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
         transition: all 0.3s ease;
         position: relative;
         background: rgba(255, 255, 255, 0.1)
     }

     .testimonial-card:hover {
         transform: translateY(-10px);
         box-shadow: 0 20px 30px rgba(0, 0, 0, 0.15);
     }

     .quote-icon {
         position: absolute;
         top: 20px;
         right: 20px;
         color: var(--text-white);
         font-size: 4rem;
         line-height: 1;
         font-family: Georgia, serif;
     }

     .testimonial-text {
         font-style: italic;
         margin-bottom: 1.5rem;
         color: var(--text-white);
         line-height: 1.8;
         position: relative;
         z-index: 1;
     }

     .testimonial-author {
         display: flex;
         align-items: center;
     }

     .author-image {
         width: 60px;
         height: 60px;
         border-radius: 50%;
         overflow: hidden;
         margin-right: 1rem;
         border: 3px solid var(--primary);
     }

     .author-image img {
         width: 100%;
         height: 100%;
         object-fit: cover;
     }

     .author-info h4 {
         font-size: 1.2rem;
         margin-bottom: 0.3rem;
         color: var(--text-white) !important;
     }

     .author-info p {
         font-size: 0.9rem;
         color: var(--text-white);
         margin-bottom: 0;
     }
 </style>
 <section class="testimonials section-padding" data-aos="fade-up" data-aos-delay="100">
     <div class="container">
         <div class="center-content section-title my-5" data-aos="zoom-in" data-aos-delay="200">
             <h2 class="text-gradient middle-content stroke-text text-white">
                 Đánh Giá Từ Khách Hàng</h2>
             <div class="divider"></div>
             <p data-aos="fade-left text-white" data-aos-delay="300">Những đánh giá từ khách hàng là minh chứng cho chất
                 lượng dịch
                 vụ
                 và
                 sự hài lòng mà Tập đoàn Anh Son mang lại</p>
         </div>
         <div class="testimonials-grid">
             <div class="testimonial-card" data-aos="flip-left" data-aos-delay="400">
                 <div class="quote-icon">"</div>
                 <p class="testimonial-text">Dịch vụ tổ chức sự kiện của Anh Sơn Group thực sự chuyên nghiệp! Từ khâu
                     lên
                     ý tưởng đến triển khai đều rất chỉn chu, giúp sự kiện của chúng tôi thành
                     công ngoài mong đợi.</p>
                 <div class="testimonial-author">
                     <div class="author-image" data-aos="zoom-in" data-aos-delay="500">
                         <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRiW3JsxgeGyDrQheSeJC9ainyRZ4ESt94OkllTHpTBTA&s&ec=72940543"
                             alt="Nguyễn Văn A">
                     </div>
                     <div class="author-info" data-aos="fade-right" data-aos-delay="600">
                         <h4>Nguyễn Văn A</h4>
                         <p>Giám đốc Marketing, Công ty XYZ</p>
                     </div>
                 </div>
             </div>
             <div class="testimonial-card" data-aos="flip-right" data-aos-delay="700">
                 <div class="quote-icon">"</div>
                 <p class="testimonial-text">Tôi rất ấn tượng với chiến lược quảng cáo mà Anh Son Group mang lại. Chiến
                     dịch truyền thông sáng tạo giúp thương hiệu của chúng tôi tiếp cận đúng
                     khách hàng mục tiêu và tăng trưởng mạnh mẽ.</p>
                 <div class="testimonial-author">
                     <div class="author-image" data-aos="zoom-in" data-aos-delay="800">
                         <img src="https://htmediagroup.vn/wp-content/uploads/2022/11/Anh-giam-doc-nam-01-min.jpg"
                             alt="Trần Thị B">
                     </div>
                     <div class="author-info" data-aos="fade-left" data-aos-delay="900">
                         <h4>Trần Thị B</h4>
                         <p>CEO, Công ty ABC</p>
                     </div>
                 </div>
             </div>
             <div class="testimonial-card" data-aos="flip-left" data-aos-delay="1000">
                 <div class="quote-icon">"</div>
                 <p class="testimonial-text">Tôi đã làm việc với nhiều đơn vị tổ chức triển lãm, nhưng Anh Sơn Group
                     thực sự
                     khác biệt. Sự hỗ trợ tận tâm và giải pháp sáng tạo giúp gian hàng của chúng tôi
                     thu hút đông đảo khách tham quan.</p>
                 <div class="testimonial-author">
                     <div class="author-image" data-aos="zoom-in" data-aos-delay="1100">
                         <img src="https://studiovietnam.com/wp-content/uploads/2023/05/chup-anh-ca-nhan-07-scaled.jpg"
                             alt="Lê Văn C">
                     </div>
                     <div class="author-info" data-aos="fade-right" data-aos-delay="1200">
                         <h4>Lê Văn C</h4>
                         <p>Giám đốc Sản phẩm, Công ty DEF</p>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </section>
 {{-- <div class="scroll-text scroll-text2"
     style="
           top:20px;
           z-index: 1;
        --d: 3; --y: 40; background: linear-gradient(90deg, #111 20%, #1E64A5, #111); opacity: 1;">
     <div><span>ANH SON GROUP  ANH SON GROUP  ANH SON GROUP  ANH SON GROUP  ANH SON GROUP
             ANH SON GROUP  ANH SON GROUP  ANH SON GROUP  ANH SON GROUP</span></div>
     <div><span>ANH SON GROUP  ANH SON GROUP  ANH SON GROUP  ANH SON GROUP  ANH SON GROUP
             ANH SON GROUP  ANH SON GROUP  ANH SON GROUP  ANH SON GROUP</span></div>
 </div> --}}
