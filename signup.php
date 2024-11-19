<!doctype html>
<html>
    <head>
        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <title>Log In</title>

        <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css' rel='stylesheet'>

        <link href='https://use.fontawesome.com/releases/v5.7.2/css/all.css' rel='stylesheet'>

        <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>

        <link rel="stylesheet" href="style.css">

    </head>
    <body className='snippet-body'>
        <div class="wrapper">
            <div class="logo">
                <img src="rick.png" alt="">
            </div>
            <div class="text-center mt-4 name">
                Sign Up for Science
            </div>
            <form class="p-3 mt-3" action="connection.php" method="POST" enctype="multipart/form-data" accept-charset="utf-8" >
                <div class="form-field d-flex align-items-center">
                    <span class="far fa-user"></span>
                    <input type="text" id="userName" placeholder="Username" name="s_userName">
                </div>
                <div class="form-field d-flex align-items-center">
                    <span class="far fa-envelope"></span>
                    <input type="email" id="usermail" placeholder="User Eamil" name="s_userMail">
                </div>
                <div class="form-field d-flex align-items-center">
                    <span class="fas fa-phone"></span>
                    <input type="text" id="userphone" placeholder="User Phone Number" name="s_userPhn">
                </div>
                <div class="form-field d-flex align-items-center">
                    <span class="fas fa-key"></span>
                    <input type="password" id="pwd" placeholder="Password" name="s_pwd">
                </div>
                <button class="btn mt-3" name="s_signup">Sign Up</button>
            </form>
            <div class="text-center fs-6">
                <a href="#">Forget password?</a> or <a href="index.php">Log In</a>
            </div>
        </div>

        <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js'></script>
                            
    </body>
</html>
