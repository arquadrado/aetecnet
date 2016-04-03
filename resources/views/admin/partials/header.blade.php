
<div id='menu' class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target = "#navHeaderCollapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ route('members') }}">PAINEL DE CONTROLO</a>
        </div>
        <div id="navHeaderCollapse" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="hidden">
                    <a href="#page-top"></a>
                </li>
                <li>
                    <a href="{{ route('projects') }}">Projectos</a>
                </li>
                 <li>
                    <a href="{{ route('members') }}">Membros</a>
                </li>
            </ul>

        </div>
    </div>
</div>