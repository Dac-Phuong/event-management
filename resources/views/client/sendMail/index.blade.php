<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-0">
                    <h4 class="mb-0">{{ __('Thông tin liên hệ') }}</h4>
                </div>
                <div class="card-body p-4">
                    <p class="mb-2"><strong>Tên:</strong> <span class="text-secondary">{{ $data['fullname'] }}</span></p>
                    <p class="mb-2"><strong>Số điện thoại:</strong> <span class="text-secondary">{{ $data['phone'] }}</span></p>
                    <p class="mb-2"><strong>Địa chỉ Email:</strong> <span class="text-secondary">{{ $data['email'] }}</span></p>
                    <p class="mb-2"><strong>Dịch vụ:</strong> <span class="text-secondary">{{ $data['service_name'] }}</span></p>
                    <p class="mb-2"><strong>Nội dung:</strong> <span class="text-secondary">{!! $data['message'] !!}</span></p>
                </div>
            </div>
        </div>
    </div>
</div>

