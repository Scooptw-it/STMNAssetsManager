    <nav class="navbar navbar-default">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">STMN Assets Manager</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="nav navbar-nav" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="#"><a href="{{ route('locations.index') }}">Locations</a></a></li>
                        <li><a href="#">Popular</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <a href="/locations/create" class="btn btn-primary" style="margin-top: 5px;">Add A New Location</a>
                    </ul>
                </div>
            </div>
        </nav>