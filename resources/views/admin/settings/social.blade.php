<div class="row col-12 col-md-6">
    <form class="add-new-user pt-0" id="addNewSocail">
        <div class="mb-3">
            <label class="form-label" for="social_fanpage">Fanpage</label>
            <input type="text" class="form-control" id="social_fanpage" placeholder="" name="social_fanpage"
                aria-label="" />
        </div>
        <div class="mb-3">
            <label class="form-label" for="social_youtube">Youtube</label>
            <input class="form-control edit-numeral-mask" id="social_youtube" type="text" placeholder=""
                name="social_youtube" />
        </div>
        <div class="mb-3">
            <label for="social_zalo" class="form-label">Zalo</label>
            <input class="form-control" type="text" id="social_zalo" name="social_zalo" />
        </div>
        <div class="mb-3">
            <label for="social_tiktok" class="form-label">Tiktok</label>
            <input class="form-control" type="text" id="social_tiktok" name="social_tiktok" />
        </div>
        <div class="mb-3">
            <label for="social_telegram" class="form-label">Telegram</label>
            <input class="form-control" type="text" id="social_telegram" name="social_telegram" />
        </div>
        <button type="submit" class="btn btn-primary me-sm-3 data-submit me-1">Cập nhật</button>
    </form>
</div>
@push('scripts')
    <script>
        $("#addNewSocail").submit(function(e) {
            e.preventDefault();
            let formData = new FormData($("#addNewSocail")[0]);
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
                        toastr.success("Cập nhật thành công");
                        getSettings();
                    } else {
                        toastr.error("Cập nhật thất bại, thử lại sau");
                    }
                }
            })
        });
    </script>
@endpush
