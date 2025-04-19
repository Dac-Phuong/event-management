  <div class="modal fade" id="modal-update-location" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <form class="update-location pt-0" id="editLocation">
                  <div class="modal-body">
                      <input type="hidden" name="id" id="id">
                      <div class="mb-3">
                          <label class="form-label" for="name">Tên tỉnh thành</label>
                          <input type="text" class="form-control" name="name" id="name">
                      </div>
                      <div class="mb-3">
                          <label class="form-label" for="name">Chọn bài viết liên quan</label>
                          <select id="select2Multiple" class="select2 form-select" name="news_id[]" multiple
                              placeholder="Chọn bài viết">
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
          $("#editLocation").submit(function(e) {
              e.preventDefault();
              let formData = new FormData(this);
              formData.append("_token", "{{ csrf_token() }}");

              $.ajax({
                  url: "{{ route('locations.update') }}",
                  type: "POST",
                  data: formData,
                  dataType: 'json',
                  processData: false,
                  contentType: false,
                  success: function(res) {
                      if (res.error_code == -1) {
                          toastr.error(res.data);
                      } else if (res.error_code == 0) {
                          toastr.success("Sửa thành công");
                          $("#editLocation")[0].reset();
                          $('#Datatable').DataTable().ajax.reload();
                          $('#modal-update-location').modal('hide');
                      } else {
                          toastr.error("Sửa thất bại, thử lại sau");
                      }
                  }
              });
          });

      </script>
  @endpush
