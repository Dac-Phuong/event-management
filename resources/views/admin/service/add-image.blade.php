<div class="modal fade modal-lg" id="modal-add-image" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="add-new pt-0" id="addImage" enctype="multipart/form-data">
                <input type="hidden" name="id" value="">
                <div class="modal-body">
                    <div class="input-images"></div>
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
