  <div class="modal fade" id="modal-add-location" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <form class="add-new-user pt-0" id="addLocation">
                  <div class="modal-body">
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
                      <button type="submit" class="btn btn-primary">Thêm</button>
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                  </div>
              </form>
          </div>
      </div>
  </div>
  @push('scripts')
      <script>
          $('#modal-add-location').on('shown.bs.modal', function() {
              $(this).find('#select2Multiple').select2({
                  dropdownParent: $('#modal-add-location')
              });
          });
          $("#addLocation").submit(function(e) {
              e.preventDefault();
              let formData = new FormData($("#addLocation")[0]);
              formData.append("_token", "{{ csrf_token() }}");
              $.ajax({
                  url: "{{ route('locations.create') }}",
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
                          $("#addLocation")[0].reset();
                          $('#Datatable').DataTable().ajax.reload();
                          $('#modal-add-location').modal('hide');
                      } else {
                          toastr.error("Thêm thất bại, thử lại sau");
                      }
                  }
              })
          });
      </script>
  @endpush
