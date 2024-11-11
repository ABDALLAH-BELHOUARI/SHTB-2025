<nav class="navbar navbar-expand-lg grady-dark">
    <div class="container-fluid">
        <button type="button" id="sidebarCollapse" class="navbar-btn rounded-lg mx-2">
            <span></span>
            <span></span>
            <span></span>
        </button>

        <a class="nav-link" href="?slug="><i class="fa fa-home fa-2x"></i></a>

        <a class="nav-link" href="?slug=profil"><i class="fa fa-user fa-2x"></i></a>

        <div class="collapse navbar-collapse ml-2" id="navbarSupportedContent">
            <form class="form-inline ">
                <input type="text" id="search" name="search" class="form-control m-0 mr-2" placeholder="Rechercher" aria-label="Rechercher">
                <button class="btn btn-info my-2 my-sm-0" type="submit" onclick="Processing()"><i class="fa fa-binoculars fa-lg"></i></button>
            </form>

            <ul class="nav navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="?slug=logout"><i class="fa fa-sign-out fa-2x"></i></a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<?= flash(); ?>