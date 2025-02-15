<div class="modal fade modal-lg" id="modal-content" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="edit-new-user pt-0" id="editContent">
                <input type="hidden" name="id" value="">
                <div class="modal-body">
                    <textarea id="news-content" name="content" class="form-control"></textarea>
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
            .create(document.querySelector('#news-content'), {
                ckfinder: {
                    uploadUrl: '{{ route('upload.image', ['_token' => csrf_token()]) }}',
                },
                })
            .then(editor => {
                window.editor = editor;
            })
            .catch(error => {
                console.error(error);
            });

        $("#editContent").submit(function(e) {
            e.preventDefault();
            // Tạo FormData từ form ban đầu
            let formData = new FormData($("#editContent")[0]);
            // Lấy nội dung từ CKEditor và append vào FormData
            let editorData = window.editor.getData();
            formData.append('content', editorData);
            formData.append("_token", "{{ csrf_token() }}");
            $.ajax({
                url: "{{ route('project.update.content') }}",
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
                        toastr.success("Sửa nội dung thành công");
                        $("#editContent")[0].reset();
                        $('#modal-content').modal('hide');
                        $('#Datatable').DataTable().ajax.reload();
                    } else {
                        toastr.error("Sửa nội dung thất bại, thử lại sau");
                    }
                }
            });
        });
    </script>
@endpush
