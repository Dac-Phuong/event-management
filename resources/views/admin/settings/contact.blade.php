<div class="row col-6">
    <form class="add-new-user pt-0" id="addNewContact">
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
        <div class="mb-3">
            <label class="form-label">Form liên hệ (Cấu hình gửi email dựa trên dịch vụ)</label>
            <div class="input-group">
                <input type="text" class="form-control" disabled placeholder="Tên dịch vụ">
                <input type="text" class="form-control" disabled placeholder="Email gửi về theo dịch vụ">
                <button class="btn btn-primary" type="button" id="add-service"><i class="ti ti-plus"></i></button>
            </div>
            <div class="service-container mt-2">
            </div>
        </div>
        <button type="submit" class="btn btn-primary me-sm-3 data-submit me-1">Cập nhật</button>
    </form>
</div>
@push('scripts')
    <script>
        $("#add-service").click(function() {
            $(".service-container").append(`
                <div class="input-group my-2 service-item">
                    <input type="text" class="form-control service-name" name="contact_service_name[]" placeholder="Nhập tên dịch vụ">
                    <input type="text" class="form-control service-email" name="contact_service_email[]" placeholder="Nhập email dịch vụ">
                    <button class="btn btn-danger remove-service" type="button"><i class="ti ti-trash"></i></button>
                </div>
            `);
        });
        $(document).on("click", ".remove-service", function() {
            $(this).closest(".service-item").remove();
        });
        $("#addNewContact").submit(function(e) {
            e.preventDefault();
            var services = [];
            $(".service-item").each(function() {
                var serviceName = $(this).find(".service-name").val().trim(); 
                var serviceEmail =  $(this).find(".service-email").val().trim();
                if (serviceName !== "" && serviceEmail !== "") {
                    services.push({
                        name: serviceName,
                        email: serviceEmail
                    });
                }
            });
            let formData = new FormData($("#addNewContact")[0]);
            formData.append("contact_services", JSON.stringify(services));
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
