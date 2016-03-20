
<div id='menu' class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target = "#navHeaderCollapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#firstPage">AETEC-MO</a>
        </div>
        <div id="navHeaderCollapse" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="hidden">
                    <a href="#page-top"></a>
                </li>
                <li data-menuanchor="firstPage" class="page-scroll active">
                    <a href="{{ route('home') }}#firstPage" class="hvr-sweep-to-top">Home</a>
                </li>
                <li data-menuanchor="secondPage" class="page-scroll">
                    <a href="{{ route('home') }}#secondPage" class="hvr-sweep-to-top">About us</a>
                </li>
                <li data-menuanchor="thirdPage" class="page-scroll">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Projects <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="{{ route('home') }}#thirdPage">Selected Projects</a></li>
                    @foreach($companies as $name => $company)
                    <li><a href="{{ route('projects_page', [$company]) }}">{{ $name }}</a></li>
                    @endforeach
                  </ul>
                </li>
                
                <li data-menuanchor="fourthPage" class="page-scroll">
                    <a href="{{ route('home') }}#fourthPage" class="hvr-sweep-to-top">Contact</a>
                </li>
            </ul>

        </div>
    </div>
</div>