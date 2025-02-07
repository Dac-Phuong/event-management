<div class="modal fade" id="modal-edit" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="edit-new-user pt-0" id="editRecruitment">
                <input type="hidden" name="id" value="">
                <div class="modal-body">
                   <div class="mb-3">
                        <label class="form-label" for="recruitment-title">Tiêu đề</label>
                        <input type="text" class="form-control" name="title" id="recruitment-title1">
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Ảnh</label>
                        <input type="file" id="image" class="form-control" name="thumbnail">
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Mô tả ngắn</label>
                        <textarea id="basic-default-message" rows="3" class="form-control" name="description"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="recruitment-number">Số lượng nhân viên</label>
                        <input class="form-control" type="number" name="number" id="recruitment-number">
                    </div>
                    <div class="mb-3">
                        <label for="url" class="form-label">Link google form</label>
                        <input type="text" id="url" class="form-control" name="url">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="recruitment-date">Thời gian kết thúc</label>
                        <input type="datetime-local" class="form-control" name="expired_at" id="recruitment-date">
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Trạng thái</label>
                        <select name="status" id="status" class="form-select" required>
                            <option value="1">Mở</option>
                            <option value="0">Đóng</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Lưu</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                </div>
            </form>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        $("#editRecruitment").submit(function(e) {
            e.preventDefault();
            let formData = new FormData($("#editRecruitment")[0]);
            const slug = $("#recruitment-title1").val();
            formData.append("slug", toSlug(slug));
            formData.append("_token", "{{ csrf_token() }}");
            $.ajax({
                url: "{{ route('recruitment.update') }}",
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
                        $("#editRecruitment")[0].reset();
                        $('#modal-edit').modal('hide');
                        $('#Datatable').DataTable().ajax.reload();
                    } else {
                        toastr.error("Sửa thông tin thất bại, thử lại sau");
                    }
                }
            })
        });
    </script>
@endpush
