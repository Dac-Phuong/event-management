@extends('admin.layouts.master')

@section('main')
    <div class="content-header row">
        <h4 class="mb-0 pb-2">Member</h4>
        <p class="font-size-base">Quản lý các Thành viên </p>
        <div class="card">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="card-header">Danh sách thành viên</h5>
                <button class="dt-button add-new btn btn-primary ms-2 waves-effect waves-light" style="margin-right:24px"
                    type="button" data-bs-toggle="modal" data-bs-target="#kt_modal_add">
                    <span>
                        <i class="ti ti-plus ti-xs me-0 me-sm-2"></i>
                        <span class="d-none d-sm-inline-block">Thêm mới</span>
                    </span>
                </button>
            </div>
            <div class="card-datatable table-responsive pt-0">
                <table class="table dataTable" id="userDatatable">
                    <thead>
                        <tr>
                            <th>Họ và tên</th>
                            <th>Địa chỉ Email</th>
                            <th>Vai trò</th>
                            <th>Đăng nhập</th>
                            <th>Ngày tạo</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
        @include('admin.user.create')
        @include('admin.user.update')
        @include('admin.user.update-profile')
    </div>
@endsection
@push('scripts')
    <script>
        $(document).on("DOMContentLoaded", function() {
            var dt_basic_table = $('#userDatatable');
            var dt_basic = null;
            if (dt_basic_table.length) {
                const initAction = () => {
                    // Variable declaration
                    let roles = [];
                    // Show update
                    $(document).on('click', '.btn-show', function() {
                        const data = getRowData($(this).closest('tr'));
                        $('#kt_modal_update_user input[name="id"]').val(data.id);
                        $('#kt_modal_update_user input[name="name"]').val(data.name);
                        $('#kt_modal_update_user input[name="email"]').val(data.email);
                        $('#kt_modal_update_user input[name="phone"]').val(data.phone);
                        $('#kt_modal_update_user input[name="facebook"]').val(data.facebook);
                        $('#kt_modal_update_user input[name="zalo"]').val(data.zalo);
                        $('#kt_modal_update_user select[name="role"]').val(data.role);
                        $('#kt_modal_update_user select[name="status"]').val(data.status);
                        $('#kt_modal_update').modal('show');
                    })
                    $(document).on('click', '.btn-profile', function() {
                        const data = getRowData($(this).closest('tr'));
                        $('#kt_modal_update_profile input[name="user_id"]').val(data.id);
                        $('#kt_modal_update_profile input[name="education"]').val(data.user_profile[0]?.education);
                        $('#kt_modal_update_profile input[name="position"]').val(data.user_profile[0]?.position);
                        $('#kt_modal_update_profile textarea[name="experience"]').val(data.user_profile[0]?.experience);
                        $('#kt_modal_update_profile textarea[name="philosophy"]').val(data.user_profile[0]?.philosophy);
                        editor.setData(data.user_profile[0]?.content || "")
                        $('#modal-update-profile').modal('show');
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
                                    url: '{{ route('user.delete') }}',
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
                            url: '{{ route('user.datatable') }}',
                            type: "POST",
                            data: function(data) {
                                data._token = "{{ csrf_token() }}";
                            },
                        },
                        columns: [{
                                data: 'name'
                            },
                            {
                                data: 'email'
                            },
                            {
                                data: 'role'
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
                                render: function(data, type, row) {
                                    return `<badge class="bg-label-${data ==  '100' ? 'primary' : 'secondary'} badge">${data ==  '100' ? 'Admin' : 'Member'} </bad>`;
                                }
                            },
                            {
                                targets: 3,
                                render: function(data, type, row) {
                                    return `<badge class="bg-label-${data ==  '1' ? 'primary' : 'danger'} badge">${data ==  '1' ? 'Có' : 'Không'} </bad>`;
                                }
                            },
                            {
                                targets: 4,
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
                                           <button class="dropdown-item btn-show"><i class="ti ti-pencil me-2"></i>Sửa thành viên</button>
                                           <button class="dropdown-item btn-profile"><i class="ti ti-edit-circle me-2"></i>Cập nhật thành viên</button>
                                           <button class="dropdown-item btn-delete"><i class="ti ti-trash me-2"></i>Xóa thành viên</button>
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
