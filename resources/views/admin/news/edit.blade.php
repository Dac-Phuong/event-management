<div class="modal fade" id="modal-news-edit" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="edit-new-user pt-0" id="editNews">
                <input type="hidden" name="id" value="">
                <div class="modal-body pb-0">
                    <div class="mb-3">
                        <label for="name" class="form-label">Danh mục</label>
                        <select class="form-select select3" id="news-category" name="new_category_id">
                            <option disabled selected>Chọn danh mục</option>
                            @foreach ($catgegories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="news-title">Tiêu đề</label>
                        <input type="text" class="form-control" name="title" id="news-title1"
                            placeholder="Tiêu đề bài viết" autofocus>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Mô tả ngắn</label>
                        <textarea id="basic-default-message" class="form-control" placeholder="" name="content"></textarea>
                    </div>
                    <div class="mb-3" id="tags">
                        <label for="TagifyCustomInlineSuggestion1" class="form-label">Tag (mỗi thẻ tag cách nhau bằng
                            dấu phẩy ",")</label>
                        <input id="TagifyCustomInlineSuggestion1" name="tags" class="form-control"
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
                            <input type="radio" id="gallery1" class="switch-input" name="switches-stacked-radio">
                            <span class="switch-toggle-slider">
                                <span class="switch-on"></span>
                                <span class="switch-off"></span>
                            </span>
                            <span class="switch-label">Thiết kế ấn tượng</span>
                        </label>

                        <label class="switch">
                            <input type="radio" id="certification1" class="switch-input"
                                name="switches-stacked-radio">
                            <span class="switch-toggle-slider">
                                <span class="switch-on"></span>
                                <span class="switch-off"></span>
                            </span>
                            <span class="switch-label">Bằng khen & xác lập kỷ lục</span>
                        </label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Lưu</button>
                    <button type="button" class="btn btn-secondary close-modal" data-bs-dismiss="modal">Đóng</button>
                </div>
            </form>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        $('#modal-news-edit').on('shown.bs.modal', function() {
            $(".close-modal").click(function() {
                $('#modal-news-edit').modal('hide');
                $('#editNews input[name="switches-stacked-radio"]').prop('checked', false);
            });
            $("#editNews").off("submit").on("submit", function(e) {
                e.preventDefault();
                let formData = new FormData($("#editNews")[0]);
                const slug = $("#news-title1").val();
                const is_gallery = $("#gallery1").is(':checked') ? 1 : 0;
                const is_certification = $("#certification1").is(':checked') ? 1 : 0;
                formData.append("is_gallery", is_gallery);
                formData.append("is_certification", is_certification);
                formData.append("slug", toSlug(slug));
                formData.append("_token", "{{ csrf_token() }}");

                $.ajax({
                    url: "{{ route('news.update') }}",
                    type: "POST",
                    data: formData,
                    dataType: 'json',
                    processData: false,
                    contentType: false,
                    success: function(res) {
                        if (res.error_code == -1) {
                            let error = res.data;
                            toastr.error(error);
                        } else if (res.error_code == 0) {
                            toastr.success("Sửa thông tin thành công");
                            $("#editNews")[0].reset();
                            $('#modal-news-edit').modal('hide');
                            $('#DatatableNews').DataTable().ajax.reload();
                        } else {
                            toastr.error("Sửa thông tin thất bại, thử lại sau");
                        }
                    }
                });
            });
        });
    </script>
@endpush
