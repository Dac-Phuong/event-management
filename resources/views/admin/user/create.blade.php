<div class="modal fade" id="kt_modal_add" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header" id="kt_modal_add_user_header">
                <!--begin::Modal title-->
                <div class="card-header mt-2 d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Thêm thành viên</h4>
                </div>
                <!--end::Modal title-->
                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal" aria-label="Close">
                    <i class="ti ti-x"></i>
                </div>
            </div>
            <!--end::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body mb-2">
                <!--begin::Form-->
                <form id="kt_modal_add_user" class="form" enctype="multipart/form-data">
                    <!--begin::Scroll-->
                    <!--begin::Input group-->
                    <div class="mb-4">
                        <div class="card-body">
                            <div class="mb-2">
                                <label class="form-label" for="basic-icon-default-user">Họ và tên</label>
                                <input type="text" id="basic-icon-default-user" name="name" class="form-control"
                                    placeholder="">
                            </div>
                            <div class="mb-2">
                                <label class="form-label" for="basic-icon-default-email">Địa chỉ Email</label>
                                <input type="email" id="basic-icon-default-email" name="email" class="form-control"
                                    placeholder="">
                            </div>
                            <div class="mb-2">
                                <label class="form-label" for="basic-icon-default-phone">Số điện thoại</label>
                                <input type="text" id="basic-icon-default-phone" name="phone" class="form-control"
                                    placeholder="">
                            </div>
                            <div class="mb-2">
                                <div class="form-password-toggle">
                                    <label class="form-label" for="multicol-password">Mật khẩu</label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="multicol-password" name="password"
                                            class="form-control" placeholder="············"
                                            aria-describedby="multicol-password2" fdprocessedid="vb9bj">
                                        <span class="input-group-text cursor-pointer" id="multicol-password2"><i
                                                class="ti ti-eye-off"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-2">
                                <label class="form-label" for="basic-icon-default-facebook">Facebook</label>
                                <input type="text" id="basic-icon-default-facebook" name="facebook"
                                    class="form-control" placeholder="">
                            </div>
                            <div class="mb-2">
                                <label class="form-label" for="basic-icon-default-zalo">Zalo</label>
                                <input type="text" id="basic-icon-default-zalo" name="zalo" class="form-control"
                                    placeholder="">
                            </div>
                            <div class="col-md-4 user_plan w-100">
                                <label class="form-label" for="multicol-password">Cho phép đăng nhập</label>
                                <select id="UserPlan" name="status" class="form-select text-capitalize">
                                    <option value="1">Có</option>
                                    <option value="0">Không</option>
                                </select>
                            </div>
                        </div>
                        <!--end::Input group-->
                    </div>
                    <!--end::Scroll-->
                    <!--begin::Actions-->
                    <div class="pt-15 d-flex justify-content-end">
                        <button type="button" class="btn btn-primary me-3">
                            <span class="indicator-label" id="btn-submit">Lưu</span>
                        </button>
                        <button type="reset" class="btn btn-light" data-bs-dismiss="modal" aria-label="Close"
                            wire:loading.attr="disabled">Hủy</button>
                    </div>
                    <!--end::Actions-->
                </form>
                <!--end::Form-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
@push('scripts')
    <script>
        $("#btn-submit").click(function(e) {
            e.preventDefault();
            let formData = new FormData($("#kt_modal_add_user")[0]);
            formData.append("_token", "{{ csrf_token() }}");
            $.ajax({
                url: "{{ route('user.create') }}",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function(res) {
                    console.log(res);
                    if (res.error_code == -1) {
                        let error = res.data;
                        toastr.error(error);
                    } else if (res.error_code == 0) {
                        toastr.success("Thêm thành công!");
                        $('#kt_modal_add').modal('hide');
                        $('#userDatatable').DataTable().ajax.reload();
                    } else if (res.error_code == 1) {
                        toastr.error(res.error);
                    } else {
                        toastr.error("Thêm thất bại, thử lại sau");
                    }
                },
                error: function(err) {
                    console.log(err);
                }
            })
        });
    </script>
@endpush
