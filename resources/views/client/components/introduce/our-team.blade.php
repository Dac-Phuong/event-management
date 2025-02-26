 <div class="our-team">
     <div class="container py-5">
         @foreach ($our_team as $team)
             <div class="block-title">
                 <h2 class="text-primary fs-1 fw-bold" style="font-size: 40px">
                     {{ $team->name }}
                 </h2>
                 <p class="mb-3 text-content">
                     {!! $team->description !!}
                 </p>
             </div>
             <div class="row mt-5">
                 @foreach ($team->userProfile as $users)
                     <div class="col-md-6 col-lg-4">
                         <div class="profile-card">
                             <div class="card-content">
                                 <img src="{{ $users->avatar }}" alt="" class="profile-picture">
                                 <div class="card-overlay"></div>
                                 <div class="card-front">
                                     <h2 class="text-white text-uppercase">{{ $users->user->name }}</h2>
                                     <p class="text-secondary">{{ $users->position }}</p>
                                 </div>
                                 <div class="card-back">
                                     <div class="content">
                                         <div class="education mb-4">
                                             <h3 class="fs-4 text-white">Học vấn</h3>
                                             <ul class="list-unstyled fs-6">
                                                 <li><i class="fas fa-graduation-cap me-2"></i>
                                                     {{ $users->education }}</li>
                                             </ul>
                                         </div>
                                         <div class="experience mb-4">
                                             <h3 class="fs-4 text-white">Kinh nghiệm</h3>
                                             <ul class="fs-6 " style="padding-left: 20px;">
                                                 <li>{{ $users->experience }}</li>
                                             </ul>
                                         </div>
                                         <div class="philosophy mb-4">
                                             <h3 class="fs-4 text-white">Triết lý cá nhân</h3>
                                             <blockquote class="blockquote">
                                                 <p class="fs-6">{{ $users->philosophy }}</p>
                                             </blockquote>
                                         </div>
                                         <div class="w-100 d-flex justify-content-center">
                                             <a href="javascript:void(0)" data-avatar="{{ $users->avatar }}"
                                                 data-name="{{ $users->user->name }}"
                                                 data-position="{{ $users->position }}"
                                                 data-content="{{ htmlspecialchars_decode($users->content) }} "
                                                 class="btn-view-user py-2 px-4 text-white fw-bold text-center py-2"
                                                 style="background-color: #1a202c; border-radius: 8px; box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2); transition: 0.3s; transform: scale(1);"
                                                 onmouseover="this.style.transform='scale(1.05)';"
                                                 onmouseout="this.style.transform='scale(1)';">
                                                 Xem thêm
                                             </a>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 @endforeach
             </div>
         @endforeach
     </div>
     <div class="modal fade" id="show-user" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered modal-lg">
             <div class="modal-content p-0">
                 <div class="modal-header p-0">
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                         style="z-index: 1"></button>
                 </div>
                 <div class="modal-body">
                     <div class="row">
                         <div class="col-md-4 d-flex align-items-center justify-content-center">
                             <img id="data-avatar" src="" alt="Avatar" class="img-fluid m-auto"
                                 style="height: 200px; width: 200px; border-radius: 50% !important;">
                         </div>
                         <div class="col-md-8 mt-3">
                             <h2 class="text-primary mb-1 fs-4 text-uppercase text-center text-md-start" id="data-name"></h2>
                             <p class="fs-6 text-secondary text-center text-md-start" id="data-position"></p>
                             <div id="data-content"></div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>

 </div>
 @push('scripts')
     <script>
         $(document).ready(function() {
             $(".btn-view-user").on("click", function() {
                 let avatar = $(this).data("avatar");
                 $("#data-name").html($(this).data("name"));
                 $("#data-position").html($(this).data("position"));
                 $("#data-avatar").attr("src", avatar);
                 $("#data-content").html($(this).data("content"));
                 $("#show-user").modal("show");
             });
         });
     </script>
 @endpush
