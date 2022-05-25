<nav class="navbar navbar-expand-sm navbar-dark shadow">
    <div class="container-fluid">
        <a class="navbar-brand" href="home.html">Peduli Diri</a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse"
            data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item ">
                    <a class="nav-link {{$nama === 'home' ? '' : 'active'}} " href="/home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{$nama === 'perjalanan' ? '' : 'active'}} " href="/perjalanan">Perjalanan<span class="sr-only">(current)</span></a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                <li class="nav-item">
                   <form action="/logout" method="post">
                    @csrf
                    <button type="submit" class="btn text-white nav-link active"> Logout <i class="ml-2 fas fa-sign-out-alt"></i> </button></form>
                </li>
            </ul>
        </div>
    </div>
</nav>