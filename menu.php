<!--Fuzail Shahzad 4-5-2024 IT202-006 Phase 4 Assignment uf7@njit.edu-->
<p>
        <?php 
        session_start();
        if (isset($_SESSION['is_valid_admin'])) { 

        ?>
        <p>
            <a href="logout.php">Logout</a>
        </p>
        <?php } else { ?>
        <p>
            <a href="login.php">Login</a>
        </p>
        <?php } ?>
</p>