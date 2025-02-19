<div class="modal fade" id="modal-update-profile" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-lg">
        <style>
            .ck-editor__editable{
                min-height: 300px !important;
            }
        </style>
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header" id="kt_modal_add_user_header">
                <!--begin::Modal title-->
                <div class="card-header mt-2 d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Cập nhật thông tin chi tiết</h4>
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
                <form id="kt_modal_update_profile" class="form" enctype="multipart/form-data">
                    <!--begin::Scroll-->
                    <input type="text" name="user_id" hidden class="form-control">
                    <!--begin::Input group-->
                    <div class="mb-4">
                        <div class="card-body">
                            <div class="mb-2 user_plan w-100">
                                <label class="form-label" for="multicol-password">Ban/bộ phận</label>
                                <select name="category_id" class="form-select text-capitalize">
                                    @foreach ($category as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-2">
                                <label for="basic-default-education" class="form-label">Học vấn</label>
                                <input id="basic-default-education" class="form-control" placeholder=""
                                    name="education"></input>
                            </div>
                            <div class="mb-2">
                                <label for="basic-default-experience" class="form-label">Kinh nghiệm</label>
                                <textarea id="basic-default-experience" class="form-control" placeholder="" name="experience"></textarea>
                            </div>
                            <div class="mb-2">
                                <label for="basic-default-philosophy" class="form-label">Triết lý</label>
                                <textarea id="basic-default-philosophy" class="form-control" placeholder="" name="philosophy"></textarea>
                            </div>
                            <div class="mb-2">
                                <label class="form-label" for="basic-icon-default-avatar">Ảnh</label>
                                <input type="file" id="basic-icon-default-avatar" name="avatar"
                                    class="form-control">
                            </div>

                            <div class="mb-2">
                                <label class="form-label" for="basic-icon-default-avatar">Nội dung (cậu truyện khởi nghiệp, ... )</label>
                                <textarea id="user-content" name="content" class="form-control"></textarea>
                            </div>
                        </div>
                        <!--end::Input group-->
                    </div>
                    <!--end::Scroll-->
                    <!--begin::Actions-->
                    <div class="pt-15 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary me-3" id="btn-update-profile">
                            <span class="indicator-label">Lưu</span>
                        </button>
                        <button type="reset" class="btn btn-light " data-bs-dismiss="modal" aria-label="Close"
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
        ClassicEditor
            .create(document.querySelector('#user-content'), {
                ckfinder: {
                    uploadUrl: '{{ route('upload.image', ['_token' => csrf_token()]) }}',
                },
            })
            .then(editor => {
                window.editor = editor;
            })
            .catch(error => {
                console.error(error);
            });

        $("#btn-update-profile").click(function(e) {
            e.preventDefault();
            let formData = new FormData($("#kt_modal_update_profile")[0]);
            let editorData = window.editor.getData();
            formData.append('content', editorData);
            formData.append("_token", "{{ csrf_token() }}");
            $.ajax({
                url: "{{ route('user.update.profile') }}",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function(res) {
                    if (res.error_code == -1) {
                        let error = res.data;
                        toastr.error(error);
                    } else if (res.error_code == 0) {
                        toastr.success("Cập nhật thành công!");
                        $('#modal-update-profile').modal('hide');
                        $('#userDatatable').DataTable().ajax.reload();
                    } else if (res.error_code == 1) {
                        toastr.error(res.error);
                    } else {
                        toastr.error("Cập nhật thất bại, thử lại sau");
                    }
                },
                error: function(err) {
                    console.log(err);
                }
            })
        });
    </script>
@endpush
