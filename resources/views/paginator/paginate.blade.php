@if ($paginate->lastPage() != 1)
<div id="paginate">
    {{ $paginate->firstItem() }} - {{ $paginate->lastItem() }} di {{ $paginate->total() }} ---

    <!-- Link alla prima pagina -->
    @if (!$paginate->onFirstPage())
        <a href="" onclick="event.preventDefault(); document.getElementById('firstPage').submit();">Inizio</a> |
        <form id="firstPage" action="{{ $paginate->url(1) }}" method="POST" style="display: none;">
            {{ csrf_field() }}
            @isset($filters)
            <input type='hidden' name="descrizione" value="{{ $filters['descrizione'] }}">
            <input type='hidden' name="organizzazione" value="{{ $filters['organizzazione'] }}">
            <input type='hidden' name="luogo" value="{{ $filters['luogo'] }}">
            <input type='hidden' name="data" value="{{ $filters['data'] }}">
            @endisset
        </form>
    @else
        Inizio |
    @endif

    <!-- Link alla pagina precedente -->
    @if ($paginate->currentPage() != 1)
        <a href="" onclick="event.preventDefault(); document.getElementById('previousPage').submit();">&lt; Precedente</a> |
        <form id="previousPage" action="{{ $paginate->previousPageUrl() }}" method="POST" style="display: none;">
            {{ csrf_field() }}
            @isset($filters)
            <input type='hidden' name="descrizione" value="{{ $filters['descrizione'] }}">
            <input type='hidden' name="organizzazione" value="{{ $filters['organizzazione'] }}">
            <input type='hidden' name="luogo" value="{{ $filters['luogo'] }}">
            <input type='hidden' name="data" value="{{ $filters['data'] }}">
            @endisset
        </form>
    @else
        &lt; Precedente |
    @endif

    <!-- Link alla pagina successiva -->
    @if ($paginate->hasMorePages())
        <a href="" onclick="event.preventDefault(); document.getElementById('nextPage').submit();">Successivo &gt;</a> |
        <form id="nextPage" action="{{ $paginate->nextPageUrl() }}" method="POST" style="display: none;">
            {{ csrf_field() }}
            @isset($filters)
            <input type='hidden' name="descrizione" value="{{ $filters['descrizione'] }}">
            <input type='hidden' name="organizzazione" value="{{ $filters['organizzazione'] }}">
            <input type='hidden' name="luogo" value="{{ $filters['luogo'] }}">
            <input type='hidden' name="data" value="{{ $filters['data'] }}">
            @endisset
        </form>
    @else
        Successivo &gt; |
    @endif

    <!-- Link all'ultima pagina -->
    @if ($paginate->hasMorePages())
        <a href="" onclick="event.preventDefault(); document.getElementById('nextPage').submit();">Fine</a>
         <form id="lastPage" action="{{  $paginate->url($paginate->lastPage())  }}" method="POST" style="display: none;">
            {{ csrf_field() }}
            @isset($filters)
            <input type='hidden' name="descrizione" value="{{ $filters['descrizione'] }}">
            <input type='hidden' name="organizzazione" value="{{ $filters['organizzazione'] }}">
            <input type='hidden' name="luogo" value="{{ $filters['luogo'] }}">
            <input type='hidden' name="data" value="{{ $filters['data'] }}">
            @endisset
        </form>
    @else
        Fine
    @endif
</div>
@endif