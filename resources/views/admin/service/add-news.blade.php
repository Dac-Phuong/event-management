<div class="modal fade" id="modal-add-image" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="add-new pt-0" id="addImage" enctype="multipart/form-data">
                <input type="hidden" name="id" value="">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="news_id" class="form-label">Bài viết</label>
                        <select class="form-select select2" name="news_id" id="news_id">
                            @foreach ($news as $item)
                                <option value="{{ $item->id }}">{{ $item->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="title" class="form-label">Tiêu đề</label>
                        <input type="text" id="title" class="form-control" name="title">
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Ảnh</label>
                        <input type="file" id="image" class="form-control" name="image">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Thêm</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                </div>
            </form>
        </div>
    </div>
    @push('scripts')
        <script>
            $(".select2").select2();
            $("#addImage").submit(function(e) {
                e.preventDefault();
                let formData = new FormData($("#addImage")[0]);
                formData.append("_token", "{{ csrf_token() }}");
                $.ajax({
                    url: "{{ route('service.create.image') }}",
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
                            $("#addImage")[0].reset();
                            $('#modal-add-image').modal('hide');
                            $('.input-images').empty().imageUploader();
                            $('#Datatable').DataTable().ajax.reload();
                        } else {
                            toastr.error("Thêm thất bại, thử lại sau");
                        }
                    }
                })
            });
        </script>
    @endpush
