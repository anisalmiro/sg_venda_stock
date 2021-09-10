<div class="box-header with-border bg-black-active color-palette">
    @if(!isset($show))
        @if(isset($delete))
            <button type="submit" class="btn btn-default btn-sm" title="Apagar">
                <i class="fa fa-trash" style="color: red"></i>
            </button>
        @else
            <button type="submit" class="btn btn-default btn-sm" title="Gravar">
                <i class="fa fa-save" style="color: #00acd6"></i>
            </button>
        @endif
    @endif
    <a href="{{ route("$route","$id") }}" class="btn pull-right" title="Fechar">
        <i class="fa fa-remove" style="color: red"></i>
    </a>
</div>