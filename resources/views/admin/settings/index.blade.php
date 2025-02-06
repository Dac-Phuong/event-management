@extends('admin.layouts.master')
@section('main')
     <h4 class="mb-0 pb-2">Settings</h4>
    <p class="font-size-base">Quản lý các thông tin cài đặt của trang </p>
    <div class="row">
        <div class="col-xl-12">
            <div class="nav-align-top nav-tabs-shadow mb-6">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button type="button" class="nav-link waves-effect active" role="tab" data-bs-toggle="tab"
                            data-bs-target="#navs-top-base" aria-controls="navs-top-base" aria-selected="true">Cơ
                            bản</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button type="button" class="nav-link waves-effect" role="tab" data-bs-toggle="tab"
                            data-bs-target="#navs-top-contact" aria-controls="navs-top-contact" aria-selected="false"
                            tabindex="-1">Liên hệ</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button type="button" class="nav-link waves-effect" role="tab" data-bs-toggle="tab"
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
                        // $("#base_logo").val(data.base_logo);
                        // $("#base_icon").val(data.base_icon);
                        // $("#base_banner").val(data.base_banner);
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
        }
        $(document).ready(function() {
            getSettings();
        })
    </script>
@endpush
