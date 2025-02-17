<div class="row col-6">
    <form class="add-new-user pt-0" id="addNewBase" enctype="multipart/form-data">
        <div class="mb-3">
            <label class="form-label" for="base_name">Tên công ty</label>
            <input type="text" class="form-control" id="base_name" placeholder="" name="base_name" aria-label="" />
        </div>
        <div class="mb-3">
            <label class="form-label" for="base_map_id">ID google map (<a href="https://support.google.com/mymaps/answer/3024454?hl=en&amp%3Bref_topic=3188329" target="_blank">Tạo google map</a>)</label>
            <input type="text" class="form-control" id="base_map_id" placeholder="VD: 16N0_4Geap6ARcVAAqINcxKMMN68xLEY&ll" name="base_map_id" aria-label="" />
        </div>
        <div class="mb-3">
            <label for="base_logo" class="form-label">Ảnh Logo</label>
            <input class="form-control" type="file" id="base_logo" name="base_logo" />
        </div>
        <div class="mb-3">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <label for="base_banner" class="form-label">Banner</label>
                <button type="button" class="btn btn-icon btn-primary waves-effect waves-light" data-bs-toggle="modal"
                    data-bs-target="#modal-add">
                    <span class="ti ti-plus"></span>
                </button>
            </div>
            <div class="p-3" style="border: 2px dashed #dbdade; border-radius: 10px;" id="base_banner">
                <span class="placeholder" style="height: 100px"></span>
            </div>
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
