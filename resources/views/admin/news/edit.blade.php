@extends('layouts/layoutMaster')

@section('title', 'Thêm bài viết')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/quill/typography.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/quill/katex.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/quill/editor.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/dropzone/dropzone.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/flatpickr/flatpickr.css') }}" />
@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/quill/katex.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/quill/quill.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/dropzone/dropzone.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/jquery-repeater/jquery-repeater.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/flatpickr/flatpickr.js') }}"></script>
@endsection

@section('page-script')
    <script src="{{ asset('assets/js/app-ecommerce-product-add.js') }}"></script>
@endsection

@section('content')
    <h4 class="mb-0 py-3">
        <span class="text-muted fw-light">Bài viết /</span><span class="fw-medium"> Sửa bài viết</span>
    </h4>

    <div class="app-ecommerce">

        <!-- Add Product -->
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-3">

            <div class="d-flex flex-column justify-content-center">
                {{-- <h4 class="mb-1 mt-3">Sửa bài viết </h4> --}}
            </div>
            <div class="d-flex align-content-center flex-wrap gap-3">
                <div class="d-flex gap-3">
                   <a class="btn btn-label-secondary" href="{{ route('news.index') }}">Quay lại</a>
                    <button class="btn btn-primary" id="btn-save">Lưu lại</button>
                </div>

            </div>

        </div>

        <form id="news-form" class="row">

            <!-- First column-->
            <div class="col-12 col-lg-8">
                <!-- Product Information -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="card-tile mb-0">Thông tin bài viết</h5>
                    </div>
                    <div class="card-body">
                      <input type="hidden" name="id" value="{{ $news->id }}">
                        <div class="mb-3">
                            <label class="form-label" for="news-title">Tiêu đề</label>
                            <input type="text" value="{{ $news->title }}" class="form-control" name="title" id="news-title"
                                placeholder="Tiêu đề bài viết" autofocus name="title">
                        </div>
                        <div class="row mb-3">
                            <div class="col col-md-6"><label class="form-label" for="news-category">Loại bài viết</label>
                                <select class="form-select" id="news-category" name="new_category_id">
                                    <option disabled selected>Chọn loại bài viết</option>
                                    @foreach ($catgegories as $category)
                                        <option value="{{ $category->id }}" @selected($news->new_category_id == $category->id)>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col"><label class="form-label" for="ecommerce-product-barcode">Ghim bài
                                    viết</label>
                                <div>
                                    <label class="switch switch-square">
                                        <input type="checkbox" name="is_pin" @checked($news->is_pin == 1) class="switch-input" />
                                        <span class="switch-toggle-slider">
                                            <span class="switch-on">
                                                <i class="ti ti-check"></i>
                                            </span>
                                            <span class="switch-off">
                                                <i class="ti ti-x"></i>
                                            </span>
                                        </span>
                                        <span class="switch-label">Ghim</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col"><label class="form-label" for="ecommerce-product-barcode">Trạng thái</label>
                                <div>
                                    <label class="switch switch-square">
                                        <input type="checkbox" name="is_show" @checked($news->is_show == 1) class="switch-input" />
                                        <span class="switch-toggle-slider">
                                            <span class="switch-on">
                                                <i class="ti ti-check"></i>
                                            </span>
                                            <span class="switch-off">
                                                <i class="ti ti-x"></i>
                                            </span>
                                        </span>
                                        <span class="switch-label">Hiển thị</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <!-- Description -->
                        <div>
                            <label class="form-label">Nội dung</label>
                            <div class="form-control">
                                <textarea id="news-content" name="content" class="form-control">{!! $news->content !!}</textarea>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Product Information -->
                <!-- Media -->

                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">Ảnh bìa</h5>
                    </div>
                    <div class="card-body">
                        <div class="text-center">
                            <div id="preview-image" style="height: 200px" class="my-2" style="">

                            </div>
                            <a id="lfm" data-input="thumbnail" is-full="true" style-image="width: 100%; height: 200px"
                                data-preview="preview-image" class="note btn bg-label-primary d-inline">
                                <i class="fa fa-picture-o"></i> Chọn ảnh
                            </a>
                            <input id="thumbnail" class="form-control"  value="{{ $news->thumbnail }}" type="hidden" name="thumbnail">
                        </div>

                    </div>
                </div>
                <!-- /Media -->
            </div>
            <div class="col-12 col-lg-4">
                <x-seo input-title-id="news-title" :seo-data=" $news->seo " />
            </div>
            <!-- /Second column -->
        </form>
    </div>

@endsection
@push('scripts')
    <script src="https://cdn.ckeditor.com/4.4.5.1/standard/ckeditor.js"></script>
    <script>
        var options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
        };
        CKEDITOR.replace('news-content', options);
    </script>
    <script src="{{ asset('/vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
    <script>
        $('#lfm').filemanager('image');
        $("#thumbnail").on('change', function() {
            let value = $(this).val();
            let listImage = value.split(',');
            if (listImage.length > 1) {
                toastr.error("Ảnh bìa tối đa 1 ảnh");
                value = "";
                $('#preview-image').html("");
            }

        })
        $("#btn-save").on('click', function() {
            submitForm();
        })

        function submitForm() {
            let formData = new FormData();
            $("#news-form").find("input, select, textarea").each(function() {
                if ($(this).val() != "") {
                    if ($(this).attr("name") == "is_pin" || $(this).attr("name") == "is_show") {
                        formData.append($(this).attr("name"),$(this).prop('checked') ? 1 : 0);
                    } else {
                        formData.append($(this).attr("name"), $(this).val());

                    }
                }
            })
            formData.append('content', CKEDITOR.instances['news-content'].getData());
            formData.append("_token", "{{ csrf_token() }}");
            $.ajax({
                url: "{{ route('news.update') }}",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function(res) {
                    if (res.error_code == 0) {
                        toastr.success("Cập nhật thành công");
                        setTimeout(function() {
                            window.location.href = "{{ route('news.index') }}";
                        }, 2000);
                    } else {
                       let error = res.data;
                        toastr.error(error, ' Lỗi');
                    }
                },
                error: function(err) {
                    console.log(err);
                    toastr.error(err.responseJSON.message);
                }

            })
        }
    </script>
@endpush
