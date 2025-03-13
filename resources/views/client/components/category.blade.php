 <div class="card mt-4">
     <div class="card-header pb-2">
         <div class="position-relative">
             <input type="text" id="search-input" class="form-control" placeholder="Tìm kiếm">
             <div class="invalid-feedback"></div>
         </div>
     </div>
     <ul id="search-results" class="list-group list-group-flush" style="display: none;"></ul>
     <div class="card-body pt-2">
         <ul class="list-group list-group-flush border-bottom">
             @foreach ($categories as $item)
                 <li class="list-group-item">
                     <a href="{{ url('blog/' . $item->slug) }}" class="text-list text-hover">{{ $item->name }}</a>
                 </li>
             @endforeach
         </ul>
     </div>
 </div>
 @push('scripts')
     <script>
         $(document).ready(function() {
             var timeout = null;
             var resultsContainer = $("#search-results");
             $("#search-input").on("input", function() {
                 clearTimeout(timeout);
                 var query = $(this).val().trim();
                 if (!query.length) return resultsContainer.hide().empty();
                 $("#search-input").removeClass("is-invalid").parent().find(".invalid-feedback").text("");
                 resultsContainer.empty().show().append(`
                    <li class="list-group-item result-item d-flex justify-content-center">
                        <div class="spinner-border spinner-border-sm text-primary" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </li>
                `);
                 timeout = setTimeout(function() {
                     $.ajax({
                         url: "{{ route('news.search') }}",
                         method: "POST",
                         data: {
                             _token: "{{ csrf_token() }}",
                             keyword: query
                         },
                         success: function(res) {
                             resultsContainer.empty();
                             if (res.error_code == -1) {
                                 $("#search-input").addClass("is-invalid");
                                 $("#search-input").parent().find(".invalid-feedback")
                                     .text(res.data);
                             } else if (res.error_code == 0) {
                                 if (res.data.length == 0) {
                                     resultsContainer.append(
                                         `<li class="list-group-item result-item">Không tìm thấy kết quả</li>`
                                     );
                                 } else {
                                     res.data.forEach(item => {
                                         resultsContainer.append(
                                             `<li class="list-group-item result-item p-2"> 
                                                <a href="${item.category.slug}/${item.slug}" class="text-decoration-none d-flex align-items-center">
                                                    <div class="avatar me-2">
                                                        <img src="${item.thumbnail}" style="width: 30px; height: 30px;" alt="Avatar" class="rounded-circle">
                                                    </div>
                                                    <span class="text-uppercase text-list text-hover">${item.title}</span>
                                                </a>
                                            </li>`
                                         );
                                     });
                                 }
                                 resultsContainer.show();
                             }
                         },
                         error: function() {
                             console.error("Lỗi khi gọi API tìm kiếm");
                             resultsContainer.empty().append(
                                 `<li class="list-group-item result-item">Lỗi khi tải dữ liệu</li>`
                             );
                         }
                     });
                 }, 500);
             });
         });
     </script>
 @endpush
