<div class="modal fade modal-lg" id="modal-edit" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="edit-new-user pt-0" id="editService">
                <input type="hidden" name="id" value="">
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label" for="service-name">Tên dịch vụ</label>
                        <input type="text" class="form-control" name="name" id="service-name1" placeholder=""
                            autofocus name="name">
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Mô tả ngắn</label>
                        <textarea id="basic-default-message" class="form-control" placeholder="" name="description"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="service-youtube">ID Youtube</label>
                        <input type="text" class="form-control" name="url" id="service-youtube" name="url">
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Ảnh</label>
                        <input type="file" id="image" class="form-control" name="thumbnail">
                    </div>
                    <div class="mb-3">
                        <label for="datetime" class="form-label">Trạng thái</label>
                        <select class="form-select" name="status" id="status">
                            <option value="0">Ẩn</option>
                            <option value="1" selected>Hiển thị</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="edit-content">Nội dung</label>
                        <textarea id="edit-content" name="content" class="form-control"></textarea>
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
        ClassicEditor
            .create(document.querySelector('#edit-content'), {
                ckfinder: {
                    uploadUrl: '{{ route('upload.image', ['_token' => csrf_token()]) }}',
                },
            })
            .then(editor => {
                window.edit_editor = editor;
            })
            .catch(error => {
                console.error(error);
            });

        $("#editService").submit(function(e) {
            e.preventDefault();
            let formData = new FormData($("#editService")[0]);
            const slug = $("#service-name1").val();
            formData.append("slug", toSlug(slug));
            formData.append("_token", "{{ csrf_token() }}");
            $.ajax({
                url: "{{ route('service.update') }}",
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
                        $("#editService")[0].reset();
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
