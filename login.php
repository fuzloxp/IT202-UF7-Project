<!--Fuzail Shahzad 4-5-2024 IT202-006 Phase 4 Assignment uf7@njit.edu-->
<?php 
    if (!isset($login_message)) {
    $login_message = 'You must login to view this page.';
    }
?>
<!DOCTYPE html>
<html>
 <head>
   <title>QuirkTech Login</title>
 </head>
 <body>
   <h1>QuirkTech Login</h1>
 <main>
   <h1>Login</h1>
   <form action="authenticate.php" method="post">
     <label>Email:</label>
     <input type="text" name="email" value="">
     <br>
     <label>Password:</label>
     <input type="password" name="password" value="">
     <br>
     <input type="submit" value="Login">
   </form>
   <form action="create_account_form.php" method="post">
        <input type="submit" value="Create an Account">
    </form> 
   <p><?php echo $login_message; ?></p>
 </main>
 </body>
</html>