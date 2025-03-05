<div class="modal fade" id="modal-add-news" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="add-new pt-0" id="addNews" enctype="multipart/form-data">
                <input type="hidden" name="id" value="">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="select2Multiple" class="form-label">Chọn bài viết (bài viết liên quan đến dịch vụ)</label>
                        <select id="select2Multiple" class="select2 form-select" name="news_id[]" multiple placeholder="Chọn bài viết">
                            @foreach ($news as $item)
                                <option value="{{ $item->id }}">{{ $item->title }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Lưu</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                </div>
            </form>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        $(".select2").select2();
        $("#addNews").submit(function(e) {
            e.preventDefault();
            let formData = new FormData($("#addNews")[0]);
            formData.append("_token", "{{ csrf_token() }}");
            $.ajax({
                url: "{{ route('service.add.news') }}",
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
                        $("#addNews")[0].reset();
                        $('#modal-add-news').modal('hide');
                        $('#Datatable').DataTable().ajax.reload();
                    } else {
                        toastr.error("Thêm thất bại, thử lại sau");
                    }
                }
            })
        });
    </script>
@endpush
