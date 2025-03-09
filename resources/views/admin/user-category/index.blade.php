@extends('admin.layouts.master')

@section('main')
    <div class="content-header row">
        <h4 class="mb-0 pb-2">Departments and divisions</h4>
        <p class="font-size-base">Quản lý Các ban và bộ phận trong công ty</p>
        <div class="card">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="card-header">Danh sách</h5>
                <button class="dt-button add-new btn btn-primary ms-2 waves-effect waves-light" style="margin-right:24px"
                    type="button" data-bs-toggle="modal" data-bs-target="#kt_modal_add">
                    <span>
                        <i class="ti ti-plus ti-xs me-0 me-sm-2"></i>
                        <span class="d-none d-sm-inline-block">Thêm mới</span>
                    </span>
                </button>
            </div>
            <div class="card-datatable table-responsive pt-0">
                <table class="table dataTable" id="Datatable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên ban/bộ phận</th>
                            <th>Số lượng</th>
                            <th>Ghim</th>
                            <th>Trạng thái</th>
                            <th>Ngày tạo</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
        @include('admin.user-category.create')
        @include('admin.user-category.update')
        @include('admin.user-category.show')

    </div>
@endsection
@push('scripts')
    <script>
        $(document).on("DOMContentLoaded", function() {
            var dt_basic_table = $('#Datatable');
            var dt_basic = null;
            if (dt_basic_table.length) {
                const initAction = () => {
                    // Variable declaration
                    let roles = [];
                    // Show update
                    $(document).on('click', '.btn-view', function() {
                        const data = getRowData($(this).closest('tr'));
                        $('#kt_modal_update input[name="id"]').val(data.id);
                        $('#kt_modal_update input[name="name"]').val(data.name);
                        $('#kt_modal_update input[name="is_pin"]').prop('checked', data.is_pin == 1);
                        $('#kt_modal_update textarea[name="description"]').val(data.description);
                        $('#kt_modal_update select[name="status"]').val(data.status);
                        $('#kt_modal_update').modal('show');
                    })
                    $(document).on('click', '.btn-show', function() {
                        $("#show-user").empty();
                        const data = getRowData($(this).closest('tr'));
                        if (data.user_profile.length > 0) {
                            data.user_profile.map((item, index) => {
                                $("#show-user").append(`
                                <tr>
                                    <td>${item.user.name}</td>
                                    <td>${item.user.phone}</td>
                                    <td>${item.user.email}</td>
                                    <td>${formatDateTime(item.user.created_at)}</td>
                                </tr>
                            `);
                            })
                        } else {
                            $("#show-user").append(`
                                <tr>
                                    <td colspan="4" class="text-center">Chưa có thành viên</td>
                                </tr>
                            `);
                        }

                        $('#kt_modal_show').modal('show');
                    })
                    $(document).on('click', '.btn-delete', function() {
                        const data = getRowData($(this).closest('tr'));
                        Swal.fire({
                            title: 'Bạn có muốn xóa không?',
                            text: "Bạn sẽ không thể hoàn tác việc này!",
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
                                    url: '{{ route('users-category.delete') }}',
                                    type: 'POST',
                                    data: {
                                        id: data.id,
                                        _token: '{{ csrf_token() }}'
                                    },
                                    success: function(res) {
                                        if (res.error_code == 0) {
                                            dt_basic.ajax.reload();
                                            Swal.fire({
                                                icon: 'success',
                                                title: 'Thành công!',
                                                text: 'Xóa thành viên thành công.',
                                            })
                                        } else {
                                            Swal.fire({
                                                icon: 'error',
                                                title: 'Lỗi!',
                                                text: 'Không thể xóa thành viên này!',
                                            })
                                        }
                                    }
                                });

                            }
                        });
                    })
                    const getRowData = (row) => {
                        return dt_basic.row(row).data();
                    }
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
                            url: '{{ route('users-category.datatable') }}',
                            type: "POST",
                            data: function(data) {
                                data._token = "{{ csrf_token() }}";
                            },
                        },
                        columns: [{
                                data: 'id'
                            },
                            {
                                data: 'name'
                            },
                            {
                                data: 'user_profile'
                            },
                            {
                                data: 'is_pin'
                            },
                            {
                                data: 'status'
                            },
                            {
                                data: 'created_at'
                            },
                            {
                                data: ''
                            }
                        ],
                        columnDefs: [{
                                targets: 0,
                                render: function(data, type, row) {
                                    return `<a href="#" class="text-primary text-hover-primary">  ${data ?? ""}  </a>`;
                                }
                            },
                            {
                                targets: 2,
                                orderable: false,
                                render: function(data, type, row) {
                                    return `<div>${data.length}</div>`;
                                }
                            },
                            {
                                targets: 3,
                                orderable: false,
                                render: function(data, type, row) {
                                    return `<badge class="bg-label-${data ==  '1' ? 'primary' : 'danger'} badge">${data ==  '1' ? 'có' : 'Không'} </badge>`;
                                }
                            },
                            {
                                targets: 4,
                                orderable: false,
                                render: function(data, type, row) {
                                    return `<badge class="bg-label-${data ==  '1' ? 'success' : 'danger'} badge">${data ==  '1' ? 'Hiển thị' : 'Ẩn'} </badge>`;
                                }
                            },
                            {
                                targets: 5,
                                render: function(data, type, row) {
                                    return `<span>${formatDateTime(data)} </span>`;
                                }
                            },
                            {
                                targets: -1,
                                data: null,
                                orderable: false,
                                className: "text-end",
                                render: function(data, type, row) {
                                    return ` <div class="dropdown">
                                       <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                           <i class="ti ti-dots-vertical"></i>
                                       </button>
                                       <div class="dropdown-menu">
                                           <button class="dropdown-item btn-view"><i class="ti ti-edit-circle me-2"></i>Sửa thông tin</button>
                                           <button class="dropdown-item btn-show"><i class="ti ti-eye me-2"></i>Xem thành viên</button>
                                           <button class="dropdown-item btn-delete"><i class="ti ti-trash me-2"></i>Xóa ban/bộ phận</button>
                                       </div>
                                   </div>`;
                                },
                            }
                        ],
                    });
                }
                initAction();
            }
        });
    </script>
@endpush
