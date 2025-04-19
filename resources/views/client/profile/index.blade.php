@extends('client.layouts.master')
@section('title', 'Hồ sơ năng lực')
@section('content')
    <div class="container">
        <div class="row py-5" style="min-height: 500px">
            <div class="col-xs-12">
                <div class="_df_book" webgl="true"
                    source="{{ isset($settings['introduce_pdf']) ? asset($settings['introduce_pdf']) : 'assets/books/test.pdf' }}"
                    id="df_manual_book" backgroundcolor="transparent">
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            $(".df-container").on("wheel", function(event) {
                try {
                    let flipBook = $(this).data("fb3d-instance");
                    if (event.ctrlKey) {
                        event.preventDefault();
                    } else {
                        if (flipBook) {
                            if (event.originalEvent.deltaY > 0) {
                                flipBook.nextPage();
                            } else {
                                flipBook.prevPage();
                            }
                            event.preventDefault();
                        }
                    }
                } catch (error) {
                    console.warn("Lỗi bị ẩn:", error.message);
                }
            });
        });
    </script>
@endpush
