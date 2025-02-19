<div class="modal fade" id="kt_modal_update" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header" id="kt_modal_update_header">
                <!--begin::Modal title-->
                <div class="card-header mt-2 d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Thêm ban/bộ phận trong công ty </h4>
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
                <form id="modal_update" class="form" enctype="multipart/form-data">
                    <!--begin::Scroll-->
                    <input type="text" name="id" hidden>
                    <!--begin::Input group-->
                    <div class="mb-4">
                        <div class="card-body">
                            <div class="mb-2">
                                <label class="form-label" for="contact-form-name">Tên ban/bộ phận</label>
                                <input type="text" class="form-control" id="contact-form-name" name="name">
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Mô tả ngắn</label>
                                <textarea id="basic-default-message" rows="3" class="form-control" placeholder="" name="description"></textarea>
                            </div>
                            <div class="mb-3 w-100">
                                <label class="form-label" for="multicol-password">Trạng thái</label>
                                <select id="UserPlan" name="status" class="form-select text-capitalize">
                                    <option value="1">Hiển thị</option>
                                    <option value="0">Ẩn</option>
                                </select>
                            </div>
                            <label class="switch cursor-pointer">
                                <input type="checkbox" class="switch-input" name="is_pin">
                                <span class="switch-toggle-slider">
                                    <span class="switch-on"></span>
                                    <span class="switch-off"></span>
                                </span>
                                <span class="switch-label">Ghim</span>
                            </label>
                        </div>
                        <!--end::Input group-->
                    </div>
                    <!--end::Scroll-->
                    <!--begin::Actions-->
                    <div class="pt-15 d-flex justify-content-end">
                        <button type="button" class="btn btn-primary me-3" id="btn-submit-update">
                            <span class="indicator-label">Lưu</span>
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
        $("#btn-submit-update").click(function(e) {
            e.preventDefault();
            let formData = new FormData($("#modal_update")[0]);
            formData.append("_token", "{{ csrf_token() }}");
            $.ajax({
                url: "{{ route('users-category.update') }}",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function(res) {
                    if (res.error_code == -1) {
                        let error = res.data;
                        toastr.error(error);
                    } else if (res.error_code == 0) {
                        toastr.success("Sửa thành công!");
                        $('#kt_modal_update').modal('hide');
                        $('#Datatable').DataTable().ajax.reload();
                    } else if (res.error_code == 1) {
                        toastr.error(res.error);
                    } else {
                        toastr.error("Sửa thất bại, thử lại sau");
                    }
                },
                error: function(err) {
                    console.log(err);
                }
            })
        });
    </script>
@endpush
