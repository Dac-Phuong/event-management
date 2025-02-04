@extends('admin.layouts.master')

@section('main')
    <h4 class="mb-0 pb-2">News</h4>
    <p class="font-size-base">Quản lý các bài viết </p>

    <div class="card">
        <div class="card-header">
            <div class="justify-between d-flex align-items-center w-full flex-wrap">
                <h5 class="card-title mb-0">Danh sách bài viết</h5>
                <a class="btn btn-label-secondary btn-primary rounded-2" tabindex="0" type="button"
                    href="{{ route('news.create') }}"><span><i class="ti ti-plus me-sm-1 ti-xs me-0"></i><span
                            class="d-none d-sm-inline-block">Thêm mới</span>
                    </span>
                </a>
            </div>

        </div>
        <div class="card-datatable table-responsive">
            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                <div class="card-datatable table-responsive pt-0">
                    <table class="datatables-ajax dataTable table" id="DatatableNews">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên bài viết</th>
                                <th>Thể loại</th>
                                <th>Lượt xem</th>
                                <th>Trạng thái</th>
                                <th>Ngày đăng</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        var dt_basic_table = $('#DatatableNews');
        var dt_basic = null;
        if (dt_basic_table.length) {
            const initAction = () => {
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
                                url: '{{ route('news.delete') }}',
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
                    url: '{{ route('news.datatable') }}',
                    type: "POST",
                    data: function(data) {
                        data._token = "{{ csrf_token() }}";
                    },
                },

                columns: [{
                        data: 'id'
                    },
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
                columnDefs: [{
                        targets: 0,
                        render: function(data, type, row) {
                            return `<span class="fw-semibold">${data}</span>`;
                        },
                    },
                    {
                        targets: 1,
                        render: function(data, type, row) {
                            return `<a href="javascript:void(0);"
                                        class="text-primary text-hover-primary">${data ?? ""} </a>
                                        ${row.is_pin ? '<span class="text-danger"><i class="ti ti-pin"></i></span>' : ''}
                                    <p>${row.author.account}</p>`;
                        },
                    },
                    {
                        targets: 2,
                        render: function(data, type, row) {
                            return data;
                        },
                    },
                    {
                        targets: 3,
                        orderable: false,
                        render: function(data, type, row) {
                            return data;
                        },
                    },
                    {
                        targets: 4,
                        orderable: false,
                        render: function(data, type, row) {
                            return data == 1 ? '<span class="badge bg-success">Hiển thị</span>' :
                                '<span class="badge bg-danger">Ẩn</span>';
                        },
                    },

                    {
                        targets: 5,
                        orderable: false,
                        render: function(data, type, row) {
                            var date = new Date(data);
                            var options = {
                                year: 'numeric',
                                month: '2-digit',
                                day: '2-digit',
                                hour: '2-digit',
                                minute: '2-digit'
                            };
                            return date.toLocaleDateString('en-GB', options);
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
                                    <a class="dropdown-item " href="{{ route('news.edit', '') }}/${row.id}"><i class="ti ti-pencil me-2"></i>Sửa</a>
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
                // dom: '<"card-header flex-column flex-md-row"<"head-label text-center"><"dt-action-buttons text-end pt-3 pt-md-0"B>><"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6 d-flex justify-content-center justify-content-md-end"f>>t<"row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
                displayLength: 10,
                lengthMenu: [10, 25, 50, 75, 100],
            });
            initAction();
        }
    </script>
@endpush
