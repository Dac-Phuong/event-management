<div class="modal fade" id="modal-add" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="add-new-user pt-0" id="addBanner">
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label" for="title">Tiêu đề</label>
                        <input type="text" class="form-control" name="title" id="title">
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Mô tả ngắn</label>
                        <textarea id="basic-default-message" rows="3" class="form-control" placeholder="" name="description"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Ảnh</label>
                        <input type="file" id="image" class="form-control" name="thumbnail">
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Thêm</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                </div>
            </form>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        $("#addBanner").submit(function(e) {
            e.preventDefault();
            let formData = new FormData($("#addBanner")[0]);
            formData.append("_token", "{{ csrf_token() }}");
            $.ajax({
                url: "{{ route('settings.banner.store') }}",
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
                        toastr.success("Thêm thành công");
                        $("#addBanner")[0].reset();
                        $('#modal-add').modal('hide');
                        getSettings();
                    } else {
                        toastr.error("Thêm thất bại, thử lại sau");
                    }
                }
            })
        });
    </script>
@endpush
