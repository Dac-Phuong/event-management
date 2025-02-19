<div class="row col-6">
    <form class="add-new-user pt-0" id="addIntroduce">
        <div class="mb-3">
            <label class="form-label" for="introduce_name">Tên công ty</label>
            <input class="form-control" id="introduce_name" type="text" name="introduce_name" />
        </div>
        <div class="mb-3">
            <label class="form-label" for="introduce_youtube_id">ID youtube (Video giới thiệu về công ty)</label>
            <input type="text" class="form-control" id="introduce_youtube_id" placeholder=""
                name="introduce_youtube_id" />
        </div>
        <div class="mb-3">
            <label class="form-label" for="introduce_content">Nội dung</label>
            <input type="text" class="form-control" id="introduce_content" name="introduce_content" />
        </div>
        <button type="submit" class="btn btn-primary me-sm-3 data-submit me-1">Cập nhật</button>
    </form>
</div>
@push('scripts')
    <script>
        $("#addIntroduce").submit(function(e) {
            e.preventDefault();
            let formData = new FormData($("#addIntroduce")[0]);
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
