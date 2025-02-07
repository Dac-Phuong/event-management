<div class="row col-6">
    <form class="add-new-user pt-0" id="addNewBase" enctype="multipart/form-data">
        <div class="mb-3">
            <label class="form-label" for="base_name">Tên trang</label>
            <input type="text" class="form-control" id="base_name" placeholder="" name="base_name" aria-label="" />
        </div>
        <div class="mb-3">
            <label class="form-label" for="base_short_name">Tên viết tắt</label>
            <input class="form-control edit-numeral-mask" id="base_short_name" type="text" placeholder=""
                name="base_short_name" />
        </div>
        <div class="mb-3">
            <label for="base_description" class="form-label">Mô tả</label>
            <textarea class="form-control" id="base_description" name="base_description" rows="3"></textarea>
        </div>
        <div class="mb-3">
            <label for="base_logo" class="form-label">Ảnh Logo</label>
            <input class="form-control" type="file" id="base_logo" name="base_logo" />
        </div>
        <div class="mb-3">
            <label for="base_banner" class="form-label">Banner</label>
            <input class="form-control" type="file" id="base_banner" name="base_banner" />
        </div>
        <button type="submit" class="btn btn-primary me-sm-3 data-submit me-1">Cập nhật</button>
    </form>
</div>
@push('scripts')
    <script>
        $("#addNewBase").submit(function(e) {
            e.preventDefault();
            let formData = new FormData($("#addNewBase")[0]);
            formData.append("_token", "{{ csrf_token() }}");
            $.ajax({
                url: "{{ route('setting.update_setting') }}",
                type: "POST",
                data: formData,
                dataType: 'json',
                processData: false,
                contentType: false,
                success: function(res) {
                    if (res.error_code == -1) {
                        let error = res.data;
                        toastr.error(error, ' Lỗi');
                    } else if (res.error_code == 0) {
                        getSettings();
                        toastr.success("Cập nhật thành công");
                    } else {
                        toastr.error("Cập nhật thất bại, thử lại sau");
                    }
                }
            })
        });
    </script>
@endpush
