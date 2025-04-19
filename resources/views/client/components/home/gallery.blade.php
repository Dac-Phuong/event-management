@php
    $images = [
        'a-20.jpg',
        'a-21.jpg',
        'a-5.jpg',
        'a-4.jpg',
        'cheese-coffee-1.jpg',
        'a-13.jpg',
        'a-17.jpg',
        'a-18.jpg',
        'a-19.jpg',
        'a-9.jpg',
        'a-6.jpg',
        'a-11.jpg',
        'a-12.jpg',
        'a-15.jpg',
        'a-16.jpg',
    ];
@endphp
<style>
    #carousel .image-wrapper {
        position: relative;
        overflow: hidden;
    }

    #carousel .image-wrapper img {
        display: block;
        width: 100%;
        height: auto;
        transition: transform 0.3s ease;
    }

    #carousel .image-wrapper:hover img {
        transform: scale(1.05);
    }

    #carousel .image-title {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        background: rgba(0, 0, 0, 0.6);
        color: #fff;
        padding: 10px 15px;
        font-size: 16px;
        text-align: center;
        opacity: 0;
        transform: translateY(100%);
        transition: all 0.3s ease;
        display: none;
    }

    #carousel .image-wrapper:hover .image-title {
        opacity: 1;
        transform: translateY(0);
    }
</style>
<section>
    <div id="carousel">
        @foreach ($images as $index => $img)
            <div class="{{ $index === 4 ? 'selected' : 'hideRight' }} position-relative image-wrapper">
                <img src="{{ asset('assets/files/default/' . $img) }}" alt="Ảnh {{ $index + 1 }}" />
            </div>
        @endforeach
    </div>
</section>

@push('scripts')
    <script>
        var autoplay = false;

        $(document).ready(function() {
            setupCarousel();

            $('#carousel div').on('click', function() {
                moveToSelected($(this));
            });

            let dir = "next";
            setInterval(() => {
                if (autoplay) {
                    const res = moveToSelected(dir);
                    dir = (dir === "next" && !res) ? "prev" : (dir === "prev" && !res) ? "next" : dir;
                }
            }, 5000);
        });

        function moveToSelected(element) {
            let selected;

            if (element === "next") {
                selected = $(".selected").next();
            } else if (element === "prev") {
                selected = $(".selected").prev();
            } else {
                selected = $(element);
            }

            if (!selected.length) return false;

            $("#carousel div").removeClass();

            selected.addClass("selected");

            const prev = selected.prev();
            const next = selected.next();
            const prevSecond = prev.prev();
            const nextSecond = next.next();

            prev.addClass("prev");
            next.addClass("next");
            prevSecond.addClass("prevLeftSecond");
            nextSecond.addClass("nextRightSecond");

            // Các ảnh phía trước prevSecond
            prevSecond.prevAll().addClass("hideLeft");

            // Các ảnh phía sau nextSecond
            nextSecond.nextAll().addClass("hideRight");

            return true;
        }

        function setupCarousel() {
            const selected = $(".selected");

            if (!selected.length) return;

            moveToSelected(selected);
        }
    </script>
@endpush
