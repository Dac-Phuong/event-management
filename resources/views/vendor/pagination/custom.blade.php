@if ($paginator->hasPages())
    <nav aria-label="Page navigation " style="display: flex; justify-content: center; margin-top: 10px;">
        <ul class="pagination pagination-rounded">
            {{-- Previous Page --}}
            <li class="page-item {{ $paginator->onFirstPage() ? 'disabled' : '' }}">
                <a class="page-link waves-effect" href="{{ $paginator->previousPageUrl() ?? 'javascript:void(0);' }}" aria-label="Previous">
                    <i class="ti ti-chevron-left ti-sm"></i>
                </a>
            </li>

            {{-- Page Numbers --}}
            @foreach ($elements as $element)
                @if (is_string($element))
                    <li class="page-item disabled"><a class="page-link waves-effect h-100" style="padding-top: 15px">{{ $element }}</a></li>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        <li class="page-item {{ $page == $paginator->currentPage() ? 'active' : '' }}">
                            <a class="page-link waves-effect h-100" style="padding-top: 15px" href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page --}}
            <li class="page-item {{ $paginator->hasMorePages() ? '' : 'disabled' }}">
                <a class="page-link waves-effect" href="{{ $paginator->nextPageUrl() ?? 'javascript:void(0);' }}" aria-label="Next">
                    <i class="ti ti-chevron-right ti-sm"></i>
                </a>
            </li>
        </ul>
    </nav>
@endif
