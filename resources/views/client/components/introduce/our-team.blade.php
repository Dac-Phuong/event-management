 <div class="our-team">
     <div class="container py-5">
         <div class="block-title">
             <h2 class="text-primary fw-bold" data-aos="fade-up" style="font-size: 40px">
                 Ban lãnh đạo
             </h2>
             <p class="mb-3 text-content" data-aos="fade-up">
                 Ban lãnh đạo của chúng tôi là những chuyên gia hàng đầu, luôn sẵn sàng đáp ứng mọi nhu cầu của
                 khách hàng với sự tận tâm và chuyên nghiệp.
             </p>
         </div>
         <div class="row mt-5" id="profileContainer"></div>
     </div>
 </div>
 @push('scripts')
     <script>
         $(document).ready(function() {
             const profileData = [{
                     name: "Phạm Thị Hằng",
                     position: "Chủ tịch HĐQT",
                     image: "https://vccinews.vn/upload/photos/2022/9/large/vbf-20229139423lqh.jpg",
                     education: [
                         "Cử nhân quản trị kinh doanh – Đại học Thương Mại",
                         "Thạc sỹ quản trị kinh doanh – Đại học Griggs Hoa Kỳ",
                     ],
                     experience: [
                         "Có trên 20 năm kinh nghiệm trong việc định hướng chiến lược và điều hành các mảng việc: Du lịch, Dịch vụ, Tổ chức sự kiện.",
                         "Chỉ đạo điều hành chung các sự kiện lớn của Bộ ban ngành Chính phủ và các tập đoàn hàng đầu trong nước và Quốc tế.",
                     ],
                     philosophy: "Tôi luôn khát khao, nhiệt huyết đam mê công việc và sáng tạo, tôi vươn mình không ngừng nghỉ để tạo ra những điều tuyệt vời.",
                     social: {
                         linkedin: "#",
                         twitter: "#",
                         instagram: "#",
                     },
                 },
                 {
                     name: "Nguyễn Văn A",
                     position: "Phó Chủ tịch HĐQT",
                     image: "https://bizweb.dktcdn.net/100/175/849/files/chup-anh-profile-doanh-nhan-chan-dung-nghe-nghiep-dep-o-ha-noi-06.jpg?v=1556771717950",
                     education: [
                         "Cử nhân Tài chính - Ngân hàng, Đại học Kinh tế Quốc dân",
                         "Thạc sĩ Quản trị Kinh doanh, Đại học Harvard",
                     ],
                     experience: [
                         "15 năm kinh nghiệm trong lĩnh vực tài chính và ngân hàng",
                         "Từng giữ chức vụ Giám đốc Tài chính tại nhiều tập đoàn lớn",
                     ],
                     philosophy: "Đổi mới là chìa khóa của sự phát triển bền vững",
                     social: {
                         linkedin: "#",
                         twitter: "#",
                         instagram: "#",
                     },
                 },
                 {
                     name: "Trần Thị B",
                     position: "Thành viên HĐQT",
                     image: "https://hthaostudio.com/wp-content/uploads/2019/08/Doanh-nhan-nu-5.jpg",
                     education: [
                         "Cử nhân Luật, Đại học Luật Hà Nội",
                         "Thạc sĩ Luật Quốc tế, Đại học Oxford",
                     ],
                     experience: [
                         "10 năm kinh nghiệm trong lĩnh vực tư vấn pháp lý doanh nghiệp",
                         "Chuyên gia về luật thương mại quốc tế",
                     ],
                     philosophy: "Tuân thủ pháp luật là nền tảng của mọi sự phát triển",
                     social: {
                         linkedin: "#",
                         twitter: "#",
                         instagram: "#",
                     },
                 },
             ];

             function createProfileCard(profile) {
                 return `
                    <div class="col-md-6 col-lg-4" data-aos="fade-up">
                        <div class="profile-card">
                            <div class="card-content">
                                <img src="${profile.image}" alt="${ profile.name}" class="profile-picture">
                                <div class="card-overlay"></div>
                                <div class="card-front">
                                    <h2 class="text-white">${profile.name}</h2>
                                    <p class="text-muted">${profile.position}</p>
                                </div>
                                <div class="card-back">
                                    <div class="content">
                                        <div class="education mb-4">
                                            <h3 class="fs-4 text-white">Học vấn</h3>
                                            <ul class="list-unstyled fs-6">
                                                ${profile.education.map((edu) => `<li><i class="fas fa-graduation-cap me-2"></i>${edu}</li>`).join("")}
                                            </ul>
                                        </div>
                                        <div class="experience mb-4">
                                            <h3 class="fs-4 text-white">Kinh nghiệm</h3>
                                            <ul class="fs-6 " style="padding-left: 20px;">
                                                ${profile.experience.map((exp) => `<li>${exp}</li>`).join("")}
                                            </ul>
                                        </div>
                                        <div class="philosophy mb-4">
                                            <h3 class="fs-4 text-white">Triết lý cá nhân</h3>
                                            <blockquote class="blockquote">
                                                <p class="fs-6">"${profile.philosophy}"</p>
                                            </blockquote>
                                        </div>
                                        <div class="social-links">
                                            <a href="${profile.social.facebook}" class="btn btn-outline-light rounded-circle"><i class="fab fa-facebook"></i></a>
                                            <a href="${profile.social.zalo}" class="btn btn-outline-light rounded-circle"><i class="ti ti-message-chatbot"></i></a>
                                            <a href="${profile.social.phone }" class="btn btn-outline-light rounded-circle"><i class="ti ti-phone-call"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
             }

             $(document).ready(() => {
                 const profileContainer = $("#profileContainer");
                 profileData.forEach((profile) => {
                     profileContainer.append(createProfileCard(profile));
                 });
             });
         });
     </script>
 @endpush
