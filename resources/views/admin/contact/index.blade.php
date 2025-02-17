@extends('admin.layouts.master')

@section('main')
    <div class="content-header row">
        <h4 class="mb-0 pb-2">Contact Form</h4>
        <p class="font-size-base">Quản lý các thông tin liên hệ từ khách hàng</p>
        <div class="card">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="card-header">Danh sách liên hệ</h5>
            </div>
            <div class="card-datatable table-responsive pt-0">
                <table class="table dataTable" id="Datatable">
                    <thead>
                        <tr>
                            <th>Họ và tên</th>
                            <th>Địa chỉ Email</th>
                            <th>Số điện thoại</th>
                            <th>Tên doanh nghiệp</th>
                            <th>Ngày gửi</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    @include('admin.contact.show')
@endsection
@push('scripts')
    <script>
        $(document).on("DOMContentLoaded", function() {
            var dt_basic_table = $('#Datatable');
            var dt_basic = null;
            if (dt_basic_table.length) {
                const initAction = () => {
                    // Variable declaration
                    $(document).on('click', '.btn-show', function() {
                        const data = getRowData($(this).closest('tr'));
                        console.log(data,'saa');
                        $('#show-fullname').text(data.fullname);
                        $('#show-email').text(data.email);
                        $('#show-message').text(data.message ?? "Không có nội dung");
                        $('#show-date').text(formatDateTime(data.created_at));
                        $('#modal_show').modal('show');
                    })
                    const getRowData = (row) => {
                        return dt_basic.row(row).data();
                    }
                    // Show update
                    dt_basic = dt_basic_table.DataTable({
                        searchDelay: 500,
                        serverSide: true,
                        processing: true,
                        stateSave: true,
                        order: [
                            [4, 'desc']
                        ],
                        displayLength: 10,
                        lengthMenu: [10, 25, 50, 75, 100],
                        ajax: {
                            url: '{{ route('contact.datatable') }}',
                            type: "POST",
                            data: function(data) {
                                data._token = "{{ csrf_token() }}";
                            },
                        },
                        columns: [{
                                data: 'fullname'
                            },
                            {
                                data: 'email'
                            },
                            {
                                data: 'phone'
                            },
                            {
                                data: 'business_name'
                            },
                            {
                                data: 'created_at'
                            },

                        ],
                        columnDefs: [{
                                targets: 0,
                                render: function(data, type, row) {
                                    return `<a href="#" class="text-primary text-hover-primary btn-show" data-bs-toggle="tooltip" data-bs-placement="top" title="Xem chi tiết"> ${data  ?? ""}  </a>`;
                                }
                            },
                            {
                                targets: 4,
                                render: function(data, type, row) {
                                    return `<span>${formatDateTime(data)} </span>`;
                                }
                            },
                        ],
                    });
                }
                initAction();
            }
        });
    </script>
@endpush
