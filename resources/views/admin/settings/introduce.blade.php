    <form class="add-new-user pt-0" id="addIntroduce">
        <div class="row col-12">

            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label" for="introduce_youtube_id">ID youtube (Video giới thiệu về công ty)</label>
                    <input type="text" class="form-control" id="introduce_youtube_id" placeholder=""
                        name="introduce_youtube_id" />
                </div>
                <div class="mb-3">
                    <label for="introduce_image" class="form-label">Ảnh trang chủ</label>
                    <input class="form-control" type="file" id="introduce_image" name="introduce_image" />
                </div>
                <div class="mb-3">
                    <label for="introduce_image_2" class="form-label">Ảnh trang giới thiệu</label>
                    <input class="form-control" type="file" id="introduce_image_2" name="introduce_image_2" />
                </div>
                <div class="mb-3">
                    <label for="introduce_pdf" class="form-label">File PDF giới thiệu công ty</label>
                    <input class="form-control" type="file" id="introduce_pdf" name="introduce_pdf" />
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-2">
                    <label class="form-label" for="basic-icon-default-avatar">Giới thiệu công ty</label>
                    <textarea id="content" name="content" class="form-control"></textarea>
                </div>
            </div>
            <div>
                <button type="submit" class="btn btn-primary me-sm-3 data-submit me-1">Cập nhật</button>
            </div>
        </div>

    </form>
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
            $("#addIntroduce").submit(function(e) {
                e.preventDefault();
                let formData = new FormData($("#addIntroduce")[0]);
                let editorData = window.editor.getData();
                formData.append('introduce_content', editorData);
                formData.append("_token", "{{ csrf_token() }}");
                $.ajax({
                    url: "{{ route('setting.update_setting') }}",
                    type: "POST",
                    data: formData,
                    dataType: 'json',
                    processData: false,
                    contentType: false,
                    success: function(res) {
                        if (res.error_code == -1) {
                            let error = res.data;
                            toastr.error(error, ' Lỗi');
                        } else if (res.error_code == 0) {
                            getSettings();
                            toastr.success("Cập nhật thành công");
                        } else {
                            toastr.error("Cập nhật thất bại, thử lại sau");
                        }
                    }
                })
            });
        </script>
    @endpush
