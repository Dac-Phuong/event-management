@extends('admin.layouts.master')
@section('main')
    <h4 class="mb-0 pb-2">Settings</h4>
    <p class="font-size-base">Quản lý các thông tin cài đặt của trang </p>
    <div class="row">
        <div class="col-xl-12">
            <div class="nav-align-top nav-tabs-shadow mb-6">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button type="button" class="nav-link waves-effect active text-primary" role="tab" data-bs-toggle="tab"
                            data-bs-target="#navs-top-base" aria-controls="navs-top-base" aria-selected="true">Cơ
                            bản</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button type="button" class="nav-link waves-effect text-primary" role="tab" data-bs-toggle="tab"
                            data-bs-target="#navs-top-contact" aria-controls="navs-top-contact" aria-selected="false"
                            tabindex="-1">Liên hệ</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button type="button" class="nav-link waves-effect text-primary" role="tab" data-bs-toggle="tab"
                            data-bs-target="#navs-top-social" aria-controls="navs-top-social" aria-selected="false"
                            tabindex="-1">Mạng xã hội</button>
                    </li>

                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade active show" id="navs-top-base" role="tabpanel">
                        @include('admin.settings.base')
                    </div>
                    <div class="tab-pane fade" id="navs-top-contact" role="tabpanel">
                        @include('admin.settings.contact')
                    </div>
                    <div class="tab-pane fade" id="navs-top-social" role="tabpanel">
                        @include('admin.settings.social')
                    </div>
                </div>
            </div>
            @include('admin.settings.modal.add')
            @include('admin.settings.modal.edit')
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        function getSettings() {
            $.ajax({
                url: "{{ route('setting.get_setting') }}",
                type: "GET",
                dataType: 'json',
                success: function(res) {
                    if (res.data && res.error_code == 0) {
                        let data = res.data;
                        $("#base_name").val(data.base_name);
                        $("#base_short_name").val(data.base_short_name);
                        $("#base_description").val(data.base_description);
                        let html = '';
                        if (data.base_banner && data.base_banner.length > 0) {
                            data.base_banner.forEach(function(item) {
                                html += `<div class="position-relative mb-2 banner-item" style="display: inline-block; width: 100px; height: 100px" >
                                <img width="100%" height="100%" class="me-2 thumbnail" style="object-fit: cover; border-radius: 10px" src="${item.thumbnail}" alt="Banner" />
                                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center banner-overlay">
                                    <a href="javascript:void(0)" class="text-white me-2" onclick='editBanner(${JSON.stringify(item)})' data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                                        <i class="ti ti-edit fs-5"></i>
                                    </a>
                                    <a href="javascript:void(0)" class="text-white" onclick="deleteBanner(${item.id})" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
                                        <i class="ti ti-trash fs-5"></i>
                                    </a>
                                </div>
                            </div>
                            `
                            })
                        }else{
                            html += `<p class="d-flex align-items-center justify-content-center m-0" style="color: red; height: 100px;">Chưa có banner</p>`
                        }
                        $("#base_banner").html(html)
                        $("#contact_name").val(data.contact_name);
                        $("#contact_short_name").val(data.contact_short_name);
                        $("#contact_phone").val(data.contact_phone);
                        $("#contact_email").val(data.contact_email);
                        $("#contact_address").val(data.contact_address);
                        // social
                        $("#social_fanpage").val(data.social_fanpage);
                        $("#social_group").val(data.social_group);
                        $("#social_messenger").val(data.social_messenger);
                        $("#social_zalo").val(data.social_zalo);
                        $("#social_tiktok").val(data.social_tiktok);
                        $("#social_telegram").val(data.social_telegram);
                    } else {
                        toastr.error("Đã có lỗi xảy ra, thử lại sau");
                    }
                }
            })
        };

        function editBanner(data) {
            if (typeof data === 'string') {
                data = JSON.parse(data);
            }
            $('#editBanner input[name="id"]').val(data.id);
            $('#editBanner input[name="title"]').val(data.title);
            $('#editBanner textarea[name="description"]').val(data.description);
            $('#modal-edit').modal('show');
        }

        function deleteBanner(_id) {
            Swal.fire({
                title: 'Bạn có muốn xóa không?',
                text: "Xóa banner nãy sẽ không hiển thị nữa!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Xóa ngay!',
                customClass: {
                    confirmButton: 'btn btn-primary me-1',
                    cancelButton: 'btn btn-label-secondary'
                },
                buttonsStyling: false
            }).then(function(result) {
                if (result.value) {
                    $.ajax({
                        url: '{{ route('settings.banner.delete') }}',
                        type: 'POST',
                        data: {
                            id: _id,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Đã xóa!',
                                text: 'Đã xóa thành công.',
                            });
                            getSettings();
                        }
                    });

                }
            });
        }

        $(document).ready(function() {
            getSettings();
        })
    </script>
@endpush
