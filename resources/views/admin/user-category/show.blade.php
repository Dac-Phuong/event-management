<div class="modal fade" id="kt_modal_show" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-lg">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header" id="kt_modal_update_header">
                <!--begin::Modal title-->
                <div class="card-header mt-2 d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Danh sách thành viên</h4>
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
                          
                        </div>
                        <!--end::Input group-->
                    </div>
                    <!--end::Scroll-->
                    <!--begin::Actions-->
                    <div class="pt-15 d-flex justify-content-end">
                        <button type="reset" class="btn btn-light" data-bs-dismiss="modal" aria-label="Close"
                            wire:loading.attr="disabled">Đóng</button>
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
