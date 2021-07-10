@if ($paginator->hasPages())
    <div class='row my-4'>
        <div class='col-12'>
            <div class='text-center'>
                <nav class='d-inline-block'>
                    <ul class='pagination p-0 m-0'>

                        @if($paginator->onFirstPage())
                            <li class='page-item disabled'>
                                <a class='page-link' href='#'>
                                    {!! __('pagination.previous') !!}
                                </a>
                            <li>
                        @else
                            <li class='page-item'>
                                <a class='page-link' href='{{ $paginator->previousPageUrl() }}'>
                                    {!! __('pagination.previous') !!}
                                </a>
                            <li>
                        @endif

                        @foreach($elements as $element)
                            @if(is_array($element))
                                @foreach($element as $page => $url)
                                    
                                    @if ($page == $paginator->currentPage())
                                        <li class='page-item active' aria-current='page'>
                                            <a class='page-link'>{{ $page }}</a>
                                        </li>
                                    @else
                                        <li class='page-item' aria-current='page'>
                                            <a class='page-link' href='{{ $url }}'>{{ $page }}</a>
                                        </li>
                                    @endif

                                @endforeach
                            @endif
                        @endforeach

                        @if($paginator->hasMorePages())
                            <li class='page-item'>
                                <a class='page-link' href='{{ $paginator->nextPageUrl() }}'>
                                    {!! __('pagination.next') !!}
                                </a>
                            </li>
                        @else
                            <li class='page-item disabled'>
                                <a class='page-link' href='#'>
                                    {!! __('pagination.next') !!}
                                </a>
                            </li>
                        @endif

                    </ul>
                </nav>
            </div>
        </div>
    </div>
@endif