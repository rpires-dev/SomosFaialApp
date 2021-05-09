@if ($paginator->hasPages())
<ul class="pagination justify-content-start">

    @if ($paginator->onFirstPage())
    {{-- <li class="page-item disabled">
        <a class="page-link " href="#">Anterior</a>
    </li> --}}
    @else
    <li class="page-item ">
        <a class="page-link " href="{{ $paginator->previousPageUrl() }}">Anterior</a>
    </li>

    @endif

    @foreach ($elements as $element)

    @if (is_string($element))

    <li class="page-item disabled "><a class="page-link active_item" href="#">{{ $element }}</a></li>
    @endif



    @if (is_array($element))
    @foreach ($element as $page => $url)
    @if ($page == $paginator->currentPage())

    <li class="page-item "><a class="page-link active_item" href="#">{{ $page }}</a></li>
    @else
    <li class="page-item"><a class="page-link" href="{{$url}}">{{ $page }}</a></li>
    @endif
    @endforeach
    @endif
    @endforeach



    @if ($paginator->hasMorePages())
    <li class="page-item ">
        <a class="page-link" href="{{ $paginator->nextPageUrl() }}">Próxima</a>
    </li>

    @else
    {{-- <li class="page-item disabled"><a class="page-link " href="#">Próxima</a></li> --}}
    @endif
</ul>
@endif


{{-- <ul class="pagination justify-content-start">
    <li class="page-item"><a class="page-link" href="#">1</a></li>

    <li class="page-item">
        <a class="page-link" href="#">Next</a>
    </li>
</ul> --}}
