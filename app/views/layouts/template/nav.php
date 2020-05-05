<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link active" href="/">Home</a>

                <a class="nav-item nav-link" href="/cats">Cats list</a>
            </div>
        </div>

        <?php if (!isset($_SESSION['user'])) : ?>
            <a class="nav-item nav-link" href="/user/sig-nup">
                <button type="button" class="btn-sm btn-info border border-light">
                    SignUp
                </button>
            </a>
            <a class="nav-item nav-link" href="/user/login">
                <button type="button" class="btn-sm btn-primary border border-light">
                    LogIn
                </button>
            </a>
        <?php else : ?>
            <a class="nav-item nav-link" href="/user/logout">
                <button type="button" class="btn-sm btn-danger border border-light">
                    LogOut
                </button>
            </a>
        <?php endif; ?>

    </div>
</nav>