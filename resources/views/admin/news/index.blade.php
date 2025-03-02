@extends('admin.layouts.master')

@section('main')
    <h4 class="mb-0 pb-2">News</h4>
    <p class="font-size-base">Quản lý các tin tức </p>

    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center w-100">
                <h5 class="card-title mb-0">Danh sách bài viết</h5>
                <a href="javascript:void(0)" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-news">
                    <i class="ti ti-plus f-18"></i>
                    Thêm mới
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
                                <th>Tiêu đề</th>
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
        @include('admin.news.create')
        @include('admin.news.edit-content')
        @include('admin.news.edit')
    </div>
@endsection

@push('scripts')
    <script>
        $(document).on("DOMContentLoaded", function() {
            var dt_basic_table = $('#DatatableNews');
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
                    $(document).on('click', '.btn-edit', function() {
                        const data = getRowData($(this).closest('tr'));
                        $('#editNews input[name="id"]').val(data.id);
                        $('#editNews input[name="title"]').val(data.title);
                        $('#editNews select[name="status"]').val(data.status);
                        $('#editNews input[name="is_pin"]').prop('checked', data.is_pin == 1);
                        $('#gallery1').prop('checked', data.is_gallery == 1);
                        $('#certification1').prop('checked', data.is_certification == 1);
                        $('#editNews select[name="new_category_id"]').val(data.new_category_id);
                        $('#editNews textarea[name="content"]').html(data.content);
                        $.ajax({
                            url: "{{ route('news.get.tags') }}",
                            type: "GET",
                            dataType: 'json',
                            success: function(res) {
                                if (res.error_code == -1) {
                                    let error = res.data;
                                    toastr.error(error);
                                } else if (res.error_code == 0) {
                                    if (!$('#TagifyCustomInlineSuggestion1').data('tagifyInstance')) {
                                        const tagifyEl = document.querySelector("#TagifyCustomInlineSuggestion1");
                                        let tagifyInstance = new Tagify(tagifyEl, {
                                            whitelist: res?.data,
                                            maxTags: 5,
                                            dropdown: {
                                                maxItems: 20,
                                                enabled: 0,
                                                classname: "tags-inline",
                                                closeOnSelect: false
                                            }
                                        });
                                        tagifyInstance.addTags(data.tags.map(t => t.name));
                                        $('#TagifyCustomInlineSuggestion1').data('tagifyInstance',
                                            tagifyInstance);
                                    } else {
                                        let tagifyInstance = $('#TagifyCustomInlineSuggestion1').data(
                                            'tagifyInstance');
                                        tagifyInstance.removeAllTags();
                                        tagifyInstance.addTags(data.tags.map(t => t.name));
                                    }
                                } else {
                                    console.log(res);
                                }
                            }
                        })
                        $('#modal-news-edit').modal('show');
                    })
                    $(document).on('click', '.btn-content', function() {
                        const data = getRowData($(this).closest('tr'));
                        $('#editContent input[name="id"]').val(data.id);
                        $.ajax({
                            url: '{{ route('news.get.content') }}',
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
                                    <p class="text-muted text-sm">Tác giả: ${row.author.name ?? ""}</p>`;
                                },
                            },
                            {
                                targets: 2,
                                render: function(data, type, row) {
                                    return `<span class="badge bg-label-primary">${data}</span>`
                                },
                            },
                            {
                                targets: 3,
                                orderable: true,
                                render: function(data, type, row) {
                                    return data;
                                },
                            },
                            {
                                targets: 4,
                                orderable: false,
                                render: function(data, type, row) {
                                    return data == 1 ?
                                        '<span class="badge bg-label-success">Hiển thị</span>' :
                                        '<span class="badge bg-label-danger">Ẩn</span>';
                                },
                            },

                            {
                                targets: 5,
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
