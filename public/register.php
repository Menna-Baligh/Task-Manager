<!DOCTYPE html>
    <!-- Source Codes By CodingNepal - www.codingnepalweb.com -->
    <html lang="en">
    <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register Form</title>
    <link rel="stylesheet" href="style.css" />
    </head>
    <body>
    <div class="login_form">
        <!-- Login form container -->
        <form action="../handles/register.php" method="post">
        <h3>Register Form</h3>
        <div class="input_box">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" placeholder="Enter Your Name" required />
        </div>
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
        <button type="submit" name="register">Register</button>
        <p class="sign_up">Already have an account? <a href="login.php">Login</a></p>
        </form>
    </div>
    </body>
    </html>