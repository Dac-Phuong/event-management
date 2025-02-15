@extends('admin.layouts.master')

@section('main')
    <h4 class="mb-0 pb-2">Project</h4>
    <p class="font-size-base">Quản lý các dự án </p>

    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center w-100">
                <h5 class="card-title mb-0">Danh sách bài viết</h5>
                <a href="javascript:void(0)" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-add">
                    <i class="ti ti-plus f-18"></i>
                    Thêm mới
                </a>
            </div>

        </div>
        <div class="card-datatable table-responsive">
            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                <div class="card-datatable table-responsive pt-0">
                    <table class="datatables-ajax dataTable table" id="Datatable">
                        <thead>
                            <tr>
                                <th>Tiêu đề</th>
                                <th>Thể loại</th>
                                <th>Lượt xem</th>
                                <th>Trạng thái</th>
                                <th>Ngày đăng</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
        @include('admin.project.create')
        @include('admin.project.edit-content')
        @include('admin.project.edit')
    </div>
@endsection

@push('scripts')
    <script>
        $(document).on("DOMContentLoaded", function() {
            var dt_basic_table = $('#Datatable');
            var dt_basic = null;
            if (dt_basic_table.length) {
                const initAction = () => {
                    $(document).on('click', '.btn-delete', function() {
                        const data = getRowData($(this).closest('tr'));
                        Swal.fire({
                            title: 'Bạn có muốn xóa không?',
                            text: "Xóa danh mục sẽ đồng thới xóa các bài viết trong danh mục!",
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
                                    url: '{{ route('project.delete') }}',
                                    type: 'POST',
                                    data: {
                                        id: data.id,
                                        _token: '{{ csrf_token() }}'
                                    },
                                    success: function(response) {
                                        dt_basic.ajax.reload();
                                        Swal.fire({
                                            icon: 'success',
                                            title: 'Đã xóa!',
                                            text: 'Đã xóa thành công.',
                                            customClass: {
                                                confirmButton: 'btn btn-success'
                                            }
                                        });
                                    }
                                });

                            }
                        });
                    })
                    $(document).on('click', '.btn-edit', function() {
                        const data = getRowData($(this).closest('tr'));
                        $('#editForm input[name="id"]').val(data.id);
                        $('#editForm input[name="title"]').val(data.title);
                        $('#editForm input[name="url"]').val(data.url);
                        $('#editForm select[name="status"]').val(data.status);
                        $('#editForm input[name="is_pin"]').prop('checked', data.is_pin == 1);
                        $('#editForm select[name="category_id"]').val(data.category_id);
                        $('#editForm textarea[name="content"]').html(data.content);
                        $('#modal-edit').modal('show');
                    })
                    $(document).on('click', '.btn-content', function() {
                        const data = getRowData($(this).closest('tr'));
                        $('#editContent input[name="id"]').val(data.id);
                        $.ajax({
                            url: '{{ route('project.get.content') }}',
                            type: 'POST',
                            data: {
                                id: data.id,
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(response) {
                                editor.setData(response.data || "")
                                $('#modal-content').modal('show');
                            }
                        })
                    })
                }
                const getRowData = (row) => {
                    return dt_basic.row(row).data();
                }
                $.fn.dataTableExt.sErrMode = 'none';
                if (dt_basic == null) {
                    dt_basic = dt_basic_table.DataTable({
                        // Thời gian trì hoãn tìm kiếm (ms)
                        searchDelay: 500,
                        // Bật chế độ xử lý từ máy chủ
                        serverSide: true,
                        // Loại bỏ hiệu ứng hiển thị trạng thái xử lý
                        processing: true,
                        // Lưu trạng thái tìm kiếm
                        stateSave: true,
                        ajax: {
                            url: '{{ route('project.datatable') }}',
                            type: "POST",
                            data: function(data) {
                                data._token = "{{ csrf_token() }}";
                            },
                        },
                        columns: [
                            {
                                data: 'title'
                            },
                            {
                                data: 'category.name'
                            },
                            {
                                data: 'views'
                            },
                            {
                                data: 'is_show'
                            },
                            {
                                data: 'created_at'
                            },
                            {
                                data: ''
                            }
                        ],
                        columnDefs: [
                            {
                                targets: 0,
                                render: function(data, type, row) {
                                    return `<a href="javascript:void(0);"
                                        class="text-primary text-hover-primary">${data ?? ""} </a>
                                        ${row.is_pin ? '<span class="text-danger"><i class="ti ti-pin"></i></span>' : ''}
                                    <p class="text-muted text-sm">Tác giả: ${row.author.name ?? ""}</p>`;
                                },
                            },
                            {
                                targets: 1,
                                render: function(data, type, row) {
                                    return `<span class="badge bg-label-primary">${data}</span>`
                                },
                            },
                            {
                                targets: 2,
                                orderable: true,
                                render: function(data, type, row) {
                                    return data;
                                },
                            },
                            {
                                targets: 3,
                                orderable: false,
                                render: function(data, type, row) {
                                    return data == 1 ?
                                        '<span class="badge bg-label-success">Hiển thị</span>' :
                                        '<span class="badge bg-label-danger">Ẩn</span>';
                                },
                            },

                            {
                                targets: 4,
                                orderable: true,
                                render: function(data, type, row) {
                                    return formatDateTime(data);
                                },
                            },
                            {
                                targets: -1,
                                data: null,
                                orderable: false,
                                render: function(data, type, row) {
                                    return `
                                <div class="dropdown">
                                  <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical"></i></button>
                                  <div class="dropdown-menu">
                                    <a class="dropdown-item btn-edit" href="javascript:void(0);"><i class="ti ti-pencil me-2"></i>Sửa thông tin</a>
                                    <a class="dropdown-item btn-content" href="javascript:void(0);"><i class="ti ti-notes me-2"></i></i>Sửa nội dung</a>
                                    <a class="dropdown-item btn-delete" href="javascript:void(0);"><i class="ti ti-trash me-2"></i>Xóa tin tức</a>
                                  </div>
                                </div>
                            `;
                                },
                            },
                        ],
                        order: [
                            [4, 'desc']
                        ],
                        displayLength: 10,
                        lengthMenu: [10, 25, 50, 75, 100],
                    });
                    initAction();
                }
            }
        })
    </script>
@endpush
