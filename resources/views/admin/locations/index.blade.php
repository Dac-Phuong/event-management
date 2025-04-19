@extends('admin.layouts.master')
@section('main')
    <h4 class="mb-0 pb-2">Province information</h4>
    <p class="font-size-base">Quản lý các thông tin tỉnh thành</p>
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center w-100">
                <h5 class="card-title mb-0">Danh sách các tỉnh thành đã đến</h5>
                <a href="javascript:void(0)" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#modal-add-location">
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
                                <th>ID</th>
                                <th>Tên tỉnh thành</th>
                                <th>Ngày tạo</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
        @include('admin.locations.create')
        @include('admin.locations.update')
    </div>
@endsection
@push('scripts')
    <script>
        var dt_basic_table = $('#Datatable');
        var dt_basic = null;
        if (dt_basic_table.length) {
            const initAction = () => {
                $(document).on('click', '.btn-delete', function() {
                    const data = getRowData($(this).closest('tr'));
                    Swal.fire({
                        title: 'Bạn có muốn xóa không?',
                        text: "Xóa bài viết sẽ không hiển thị nữa!",
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
                                url: '{{ route('locations.delete') }}',
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
                    $('#editLocation input[name="id"]').val(data.id);
                    $('#editLocation input[name="name"]').val(data.name);
                    $('#modal-update-location').one('shown.bs.modal', function() {
                        let $select = $('#select2Multiple');
                        $select.val(null).trigger('change');
                        if (Array.isArray(data?.location_news)) {
                            let selectedNewsIds = data.location_news.map(item => item.news_id);
                            $select.val(selectedNewsIds).trigger('change');
                        }
                    }).modal('show');
                });

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
                        url: '{{ route('locations.datatable') }}',
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
                                        class="text-primary text-hover-primary">${data ?? ""} </a>`;
                            },
                        },
                        {
                            targets: 2,
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
                                    <a class="dropdown-item btn-delete" href="javascript:void(0);"><i class="ti ti-trash me-2"></i>Xóa tỉnh thành</a>
                                  </div>
                                </div>
                            `;
                            },
                        },
                    ],
                    order: [
                        [3, 'desc']
                    ],
                    displayLength: 10,
                    lengthMenu: [10, 25, 50, 75, 100],
                });
                initAction();
            }
        }
    </script>
@endpush
