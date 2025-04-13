    <!DOCTYPE html>
    <!-- Source Codes By CodingNepal - www.codingnepalweb.com -->
    <html lang="en">
    <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login Form</title>
    <link rel="stylesheet" href="style/style.css" />
    </head>
    <body>
        <?php session_start()?>
        <?php
            if(isset($_SESSION['msg'])){?>
                    <script>alert("<?php echo $_SESSION['msg']; ?>");</script>
                    <?php unset($_SESSION['msg']);
                }
        ?>
    <div class="login_form">
        <!-- Login form container -->
        <form action="../handles/logic.php" method="post">
        <h3>Login Form</h3>
        
        <!-- Email input box -->
        <div class="input_box">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" placeholder="Enter email address" required />
        </div>
        
        <!-- Paswwrod input box -->
        <div class="input_box">
            <div class="password_title">
            <label for="password">Password</label>
            
            </div>
            <input type="password" name="password" id="password" placeholder="Enter your password" required />
        </div>
        <!-- Login button -->
        <button type="submit" name="login">Login</button>
        <p class="sign_up">Don't have an account? <a href="register.php">Sign up</a></p>
        </form>
    </div>
    </body>
    </html>