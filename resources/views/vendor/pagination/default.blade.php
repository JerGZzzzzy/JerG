@if ($articles->hasPages())
    <ul class="pagination">
        {{-- Previous Page Link --}}
        @if ($articles->onFirstPage())
            <li class="disabled"><span>上一页</span></li>
        @else
            <li><a href="{{ $articles->previousPageUrl() }}" rel="prev">上一页</a></li>
        @endif
        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li><a href="{{ $paginator->nextPageUrl() }}" rel="next">下一页</a></li>
        @else
            <li class="disabled"><span>下一页</span></li>
        @endif
    </ul>
@endif
