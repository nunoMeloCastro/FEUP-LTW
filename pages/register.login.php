<?php
    declare(strict_types = 1);
    require_once(__DIR__.'/../template/common.tpl.php');
    drawHeader(5);

?>

<div class="login-form">
    <div class="alert alert-info">Login</div>
    <form action="" method="POST">
        <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" class="form-control" required="required" />
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required="required" />
        </div>

        <center><button name="login" class="btn btn-primary"><span class="glyphicon glyphicon-log-in"></span> Login</button></center>

    </form>
    <br />
    <?php include 'login.php' ?>
</div>
<div class="register-form">
    <div class="alert alert-info">REGISTER</div>
    <form action="" method="POST">
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" class="form-control" required="required" />
        </div>
        <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" class="form-control" required="required" />
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required="required" />
        </div>
        <div class="form-group">
            <label>Address</label>
            <input type="text" name="address" class="form-control" required="required" />
        </div>
        <div class="form-group">
            <label>Phone</label>
            <input type="text" name="phone" class="form-control" required="required" />
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required="required" />
        </div>
        <div class="form-group">
            <label>Type of User</label>
            <select name="user_type">
                <option value="owner">Restaurant Owner</option>
                <option value="customer">Customer</option>
            </select>
        </div>

        <center><button name="register" class="btn btn-success">Register</button></center>

    </form>
    <br />
    <?php include 'register.php' ?>
</div>

<?php drawFooter(); ?>