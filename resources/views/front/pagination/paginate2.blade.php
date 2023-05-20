@if ($paginator->hasPages())
    <div class="row">
        <div class="col-xs-12 text-center">
            <nav>
                <ul class="pagination clearfix">
                    @if (!$paginator->onFirstPage())
                        <li class="page-item hidden-xs text"><a class="page-link" href="{{ $paginator->previousPageUrl() }}"><i class="fa fa-angle-left"></i></a></li>
                    @endif
                        @foreach ($elements as $element)
                            {{-- Array Of Links --}}
                            @if (is_array($element))
                                @foreach ($element as $page => $url)
                                    @php
                                    if(@$_GET['order']) {
                                     $url = $url.'&order='.$_GET['order'];
                                    }
                                    @endphp

                                    @if ($page == $paginator->currentPage())
                                        <li class="active page-item disabled"><a class="page-link" href="#">{{ $page }}</a></li>
                                    @else
                                        @if($page == $paginator->lastPage() - 1)
                                            <li class="page-item"><a class="page-link" href="">...</a></li>
                                        @endif
                                            <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                                    @endif
                                @endforeach
                            @endif
                        @endforeach
                    @if ($paginator->hasMorePages())
                            <li class="page-item hidden-xs text"><a class="page-link" href="{{ $paginator->nextPageUrl() }}"><i class="fa fa-angle-right"></i></a></li>
                        @endif
                </ul>
            </nav>

        </div>
    </div>
@endif
