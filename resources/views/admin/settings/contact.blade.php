<div class="row col-6">
    <form class="add-new-user pt-0" id="addNewContact">
        <div class="mb-3">
            <label class="form-label" for="contact_name">Tên tổ chức</label>
            <input type="text" class="form-control" id="contact_name" placeholder="" name="contact_name" />
        </div>
        <div class="mb-3">
            <label class="form-label" for="contact_short_name">Tên viết tắt</label>
            <input class="form-control edit-numeral-mask" id="contact_short_name" type="text" placeholder=""
                name="contact_short_name" />
        </div>
        <div class="mb-3">
            <label class="form-label" for="contact_phone">Số điện thoại</label>
            <input class="form-control edit-numeral-mask" id="contact_phone" maxlength="11" type="number"
                placeholder="" name="contact_phone" />
        </div>
        <div class="mb-3">
            <label for="contact_email" class="form-label">Hòm thư (Email)</label>
            <input class="form-control" type="email" id="contact_email" name="contact_email" />
        </div>
        <div class="mb-3">
            <label for="contact_address" class="form-label">Địa chỉ</label>
            <input class="form-control" type="text" id="contact_address" name="contact_address" />
        </div>
        <button type="submit" class="btn btn-primary me-sm-3 data-submit me-1">Cập nhật</button>
    </form>
</div>
@push('scripts')
    <script>
        $("#addNewContact").submit(function(e) {
            e.preventDefault();
            let formData = new FormData($("#addNewContact")[0]);
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
