<div class="modal fade modal-lg" id="modal-service" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="add-new-user pt-0" id="addService">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Danh mục</label>
                        <select class="form-select" id="service-category" name="category_id">
                            <option disabled selected>Chọn danh mục</option>
                            @foreach ($catgegories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="service-title">Tiêu đề</label>
                        <input type="text" class="form-control" name="title" id="service-title"
                            placeholder="Tiêu đề bài viết" autofocus name="title">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="service-title">Nội dung</label>
                        <textarea id="content" name="content" class="form-control"></textarea>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Thêm</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                </div>
            </form>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        ClassicEditor
            .create(document.querySelector('#content'), {
                ckfinder: {
                    uploadUrl: '{{ route('upload.image', ['_token' => csrf_token()]) }}',
                },
            })
            .then(editor => {
                window.editor = editor;
            })
            .catch(error => {
                console.error(error);
            });

        $("#addService").submit(function(e) {
            e.preventDefault();
            let formData = new FormData($("#addService")[0]);
            const slug = $("#service-title").val();
            formData.append("slug", toSlug(slug));
            formData.append("_token", "{{ csrf_token() }}");
            $.ajax({
                url: "{{ route('service.store') }}",
                type: "POST",
                data: formData,
                dataType: 'json',
                processData: false,
                contentType: false,
                success: function(res) {
                    if (res.error_code == -1) {
                        let error = res.data;
                        toastr.error(error);
                    } else if (res.error_code == 0) {
                        toastr.success("Thêm thành công");
                        editor.setData("");
                        $("#addService")[0].reset();
                        $('#modal-service').modal('hide');
                        $('#Datatable').DataTable().ajax.reload();
                    } else {
                        toastr.error("Thêm thất bại, thử lại sau");
                    }
                }
            })
        });
    </script>
@endpush
