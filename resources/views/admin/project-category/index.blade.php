@extends('admin.layouts.master')

@section('main')
    <h4 class="mb-0 pb-2">Category</h4>
    <p class="font-size-base">Quản lý danh mục dự án</p>
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center w-100">
                <h5 class="card-title mb-0">Danh sách danh mục</h5>
                <button class="btn btn-primary btn-label-secondary rounded-2" tabindex="0" aria-controls="DataTables_Table_0"
                    type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasAdd"><span><i
                            class="ti ti-plus me-sm-1 ti-xs me-0"></i><span class="d-none d-sm-inline-block">Thêm mới</span>
                    </span>
                </button>
            </div>
        </div>
        <div class="card-datatable table-responsive">
            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                <div class="card-datatable table-responsive pt-0">
                    <table class="datatables-ajax dataTable table" id="Datatable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên danh mục</th>
                                <th>Slug</th>
                                <th>Trạng thái</th>
                                <th>Ngày tạo</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
            @include('admin.project-category.add')
            @include('admin.project-category.edit')
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        var dt_basic_table = $('#Datatable');
        var dt_basic = null;
        var role = [];
        if (dt_basic_table.length) {
            const initAction = () => {
                $(document).on('click', '.btn-edit', function() {
                    const data = getRowData($(this).closest('tr'));
                    $("#edit-form").find("input, select, textarea").each(function() {
                        let name = $(this).attr('name');
                        if ($(this).is(':checkbox')) {
                            $(this).prop('checked', data[name] == 1);
                        } else {
                            $(this).val(data[name]);
                        }
                    })
                    $('#offcanvasEdit').offcanvas('show');
                })
                $(document).on('click', '.btn-delete', function() {
                    const data = getRowData($(this).closest('tr'));
                    Swal.fire({
                        title: 'Bạn có muốn xóa không?',
                        text: "Xóa danh mục sẽ đồng thời xóa các bài viết trong danh mục!",
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
                                url: '{{ route('project-category.delete') }}',
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
            }
            const getRowData = (row) => {
                return dt_basic.row(row).data();
            }
            $.fn.dataTableExt.sErrMode = 'none';
            dt_basic = dt_basic_table.DataTable({
                // Thời gian trì hoãn tìm kiếm (ms)
                searchDelay: 500,
                // Bật chế độ xử lý từ máy chủ
                serverSide: true,
                // Loại bỏ hiệu ứng hiển thị trạng thái xử lý
                processing: true,
                // Lưu trạng thái tìm kiếm
                stateSave: true,
                select: {
                    style: "multi",
                    selector: 'td:first-child input[type="checkbox"]',
                    className: "row-selected",
                },
                ajax: {
                    url: "{{ route('project-category.datatable') }}",
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
                        data: 'slug'
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

                        render: function(data) {
                            return data;
                        },
                    },
                    {
                        targets: 1,
                        render: function(data, type, row) {
                            return `<a href="javascript:void(0);"
                                        class="text-primary text-hover-primary">${data ?? ""} </a>`;
                        },
                    },
                    {
                        targets: 2,
                        orderable: false,
                        render: function(data, type, row) {
                            return data;
                        },
                    },
                    {
                        targets: 3,
                        orderable: false,
                        render: function(data, type, row) {
                            return data == 1 ? '<span class="badge bg-label-success">Hiển thị</span>' :
                                '<span class="badge bg-label-danger">Ẩn</span>';
                        },
                    },
                    {
                        targets: 4,
                        orderable: false,
                        render: function(data, type, row) {
                            return formatDateTime(data);;
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
                                   <a class="dropdown-item btn-edit" href="javascript:void(0);"><i class="ti ti-pencil me-2"></i>Sửa</a>
                                  <a class="dropdown-item btn-delete" href="javascript:void(0);"><i class="ti ti-trash me-2"></i>Xóa</a>
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
    </script>
@endpush
