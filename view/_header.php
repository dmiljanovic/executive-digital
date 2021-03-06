<div class="row">
    <div class="col-lg-12">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-item nav-link" href="/">Home</a>
                    <?php
                    if(!\App\Helpers\Session::GetKey('userId') && !\App\Helpers\Session::GetKey('userEmail')) {
                        echo('
                            <a class="nav-item nav-link" href="/register">Register</a><br>
                            <a class="nav-item nav-link" href="/login">Login</a>
                        ');
                    }
                    ?>
                    <?php
                    if(\App\Helpers\Session::GetKey('userId') && \App\Helpers\Session::GetKey('userEmail')) {
                        echo('
                                <a class="nav-item nav-link" href="/logout">Logout</a><br>
                                <a class="nav-item nav-link" href="/tasks">Tasks</a>
                        ');
                    }
                    ?>
                </div>
            </div>
        </nav>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 mt-1">
        <?php echo flash()->display() ?>
    </div>
</div>
