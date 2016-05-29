<nav class="navbar navbar-default" role="navigation">
    <div class="container">
        <div class="navbar-header">
                <a href="index.php" class="navbar-brand">Mantra Labs Chat Zone</a>
        </div>

        <?php 
        // print_r($_SESSION); exit();
        if($_SESSION && isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in']){ ?>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="javascript:void(0);">Welcome <b><?php echo $_SESSION['fullname']; ?></b></a></li>
            <li><a href="logout.php" target="_self">Sign out</a></li>
        </ul>
        <?php } ?>
    </div>
</nav>