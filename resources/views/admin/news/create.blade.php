<div class="modal fade" id="modal-news" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="add-new-user pt-0" id="addNews">
                <div class="modal-body pb-0">
                    <div class="mb-3">
                        <label for="name" class="form-label">Danh mục</label>
                        <select class="form-select select2" id="news-category" name="new_category_id">
                            <option disabled selected>Chọn danh mục</option>
                            @foreach ($catgegories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="news-title">Tiêu đề</label>
                        <input type="text" class="form-control" name="title" id="news-title"
                            placeholder="Tiêu đề bài viết" autofocus name="title">
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Mô tả ngắn</label>
                        <textarea id="basic-default-message" class="form-control" placeholder="" name="content"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="TagifyCustomInlineSuggestion" class="form-label">Tag (mỗi thẻ tag cách nhau bằng dấu
                            phẩy ",")</label>
                        <input id="TagifyCustomInlineSuggestion" name="tags" class="form-control"
                            placeholder="Thẻ tags">
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Ảnh</label>
                        <input type="file" id="image" class="form-control" name="thumbnail">
                    </div>
                    <div class="mb-3">
                        <label for="is_show" class="form-label">Hiển thị</label>
                        <select name="is_show" id="is_show" class="form-select">
                            <option value="1">Hiện thị</option>
                            <option value="0">Ẩn</option>
                        </select>
                    </div>
                    <label class="switch">
                        <input type="checkbox" class="switch-input" name="is_pin">
                        <span class="switch-toggle-slider">
                            <span class="switch-on"></span>
                            <span class="switch-off"></span>
                        </span>
                        <span class="switch-label">Ghim</span>
                    </label>
                    <div class="switches-stacked mt-2">
                        <label class="switch mb-2">
                            <input type="radio" class="switch-input" id="gallery" name="switches-stacked-radio">
                            <span class="switch-toggle-slider">
                                <span class="switch-on"></span>
                                <span class="switch-off"></span>
                            </span>
                            <span class="switch-label">Thiết kế ấn tượng</span>
                        </label>
                        <label class="switch">
                            <input type="radio" class="switch-input" id="certification" name="switches-stacked-radio">
                            <span class="switch-toggle-slider">
                                <span class="switch-on"></span>
                                <span class="switch-off"></span>
                            </span>
                            <span class="switch-label">Bằng khen & xác lập kỷ lục</span>
                        </label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Thêm</button>
                    <button type="button" class="btn btn-secondary close-modal">Đóng</button>
                </div>
            </form>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        $(document).ready(function () {
            const TagifyCustomInlineSuggestionEl = document.querySelector("#TagifyCustomInlineSuggestion");
            let TagifyBasic;
            function getTags() {
                $.ajax({
                    url: "{{ route('news.get.tags') }}?t=" + new Date().getTime(), 
                    type: "GET",
                    dataType: 'json',
                    success: function (res) {
                        if (res.error_code == -1) {
                            toastr.error(res.data);
                        } else if (res.error_code == 0) {
                            if (TagifyBasic) {
                                TagifyBasic.destroy();
                            }
                            TagifyBasic = new Tagify(TagifyCustomInlineSuggestionEl, {
                                whitelist: res.data,
                                maxTags: 5,
                                dropdown: {
                                    maxItems: 20,
                                    classname: "tags-inline",
                                    enabled: 0,
                                    closeOnSelect: false
                                }
                            });
                            TagifyBasic.removeAllTags();
                        } else {
                            console.log(res);
                        }
                    }
                });
            }

            getTags();

            $(".close-modal").click(function () {
                $('input[name="switches-stacked-radio"]').prop('checked', false);
                $('#modal-news').modal('hide');
            });

            $("#addNews").submit(function (e) {
                e.preventDefault();
                let formData = new FormData($("#addNews")[0]);
                const slug = $("#news-title").val();
                const is_gallery = $("#gallery").is(':checked') ? 1 : 0;
                const is_certification = $("#certification").is(':checked') ? 1 : 0;
                formData.append("is_gallery", is_gallery);
                formData.append("is_certification", is_certification);
                formData.append("slug", toSlug(slug));
                formData.append("_token", "{{ csrf_token() }}");
                $.ajax({
                    url: "{{ route('news.store') }}",
                    type: "POST",
                    data: formData,
                    dataType: 'json',
                    processData: false,
                    contentType: false,
                    success: function (res) {
                        if (res.error_code == -1) {
                            toastr.error(res.data);
                        } else if (res.error_code == 0) {
                            toastr.success("Thêm thành công");
                            $("#addNews")[0].reset();
                            $('#modal-news').modal('hide');
                            $('#DatatableNews').DataTable().ajax.reload();
                            setTimeout(() => {
                                getTags(); 
                            }, 500);
                        } else {
                            toastr.error("Thêm thất bại, thử lại sau");
                        }
                    }
                });
            });

        });
    </script>
@endpush
