<!-- Offcanvas to add new user -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasEdit" aria-labelledby="offcanvasEditUserLabel">
    <div class="offcanvas-header">
        <h5 id="offcanvasAddUserLabel" class="offcanvas-title">Sửa danh mục</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body h-100 mx-0 flex-grow-0 pt-0">
        <form class="add-new-user pt-0" id="edit-form">
            <input type="hidden" name="id" value="">
            <div class="mb-3">
                <label class="form-label" for="name">Tên danh mục</label>
                <input type="text" class="form-control" id="edit_name" placeholder="" name="name"
                    aria-label="" />
            </div>
            <div class="mb-3">
                <label class="form-label" for="slug">Slug</label>
                <input type="text" class="form-control" readonly id="edit_slug" placeholder="" name="slug"
                    aria-label="" />
            </div>

            <div class="mb-3">
                <label for="datetime" class="form-label">Trạng thái</label>
                <select class="form-select" name="status" id="status">
                    <option value="0">Ẩn</option>
                    <option value="1">Hiển thị</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary me-sm-3 data-submit me-1">Cập nhật</button>
            <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">Quay lại</button>
        </form>
    </div>
</div>
@push('scripts')
    <script>
        $("#edit-form").submit(function(e) {
            e.preventDefault();
            let formData = new FormData();
            $(this).find("input, select, textarea").each(function() {
                if ($(this).val() != "") {
                    if ($(this).is('select')) {
                        formData.append($(this).attr("name"), $(this).find('option:selected').val());
                    } else {
                        formData.append($(this).attr("name"), $(this).val());
                    }
                }
            })
            formData.append("_token", "{{ csrf_token() }}");
            $.ajax({
                url: "{{ route('project-category.update') }}",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function(res) {
                    if (res.error_code == -1) {
                        let error = res.data;
                        toastr.error(error, ' Lỗi');
                    } else if (res.error_code == 0) {
                        toastr.success("Cập nhật thành công");
                        $("#edit-form")[0].reset();
                        $('#offcanvasEdit').offcanvas('hide');
                    } else {
                        toastr.error("Sửa thất bại, thử lại sau");
                    }
                    $('#Datatable').DataTable().ajax.reload();
                }
            })
        });
        $("#edit-form input[name='name']").on("keyup", function() {
            let title = $(this).val();
            $("#edit_slug").val(toSlug(title));
        })
    </script>
@endpush
