<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Document</title>
</head>
<body>
    <section class="login">
        <div class="photo">
            <h1 class="logo">Elegance.</h1>
            <p>Sign in to Elegance.</p>
        </div>

        <main>
            <div class="control">
                <p>Username or email address</p>
                <input type="text" id="emailOrUsername">    
            </div>
            <div class="control">
                <div class="textAndForgotPass">
                    <p>Password</p>

                    <a href="">Forgot password?</a>
                </div>
                <input type="password" id="pass">
            </div>
            <button>Sing in</button>
        </main>
        <div class="new">
            <p>New to Elegance.? <a href="<?= BASE_URL . "cad" ?>">Create an accont.</a></p>
        </div>
    </section>
</body>
</html>