
<div class="hero">
    <h1 class="animated fadeInDown">Student Grade Table</h1>
    <div> <?php echo $error; ?> </div>
    <form method="post" id="signup" autocomplete="off" class="animated fadeInUp">
        <input type="text" name="username" placeholder=" Enter Username" class="form-control">
        <input type="password" name="password" placeholder="Enter Password" class="form-control">
        <input type="submit" name="signup" value="Sign Up" class="btn btn-success">
        <p>Already Signed Up? <a class="toggle btn btn-info">Log In</a></p>
    </form>
    <form method="post" id="login" autocomplete="off" class="animated fadeInUp">
        <input type="text" name="username" placeholder=" Enter Username" class="form-control">
        <input type="password" name="password" placeholder="Enter Password" class="form-control">
        <input type="submit" name="login" value="Log In" class="btn btn-success">
        <p>New User? <a class="toggle btn btn-info">Sign Up!</a></p>
    </form>

    

</div>