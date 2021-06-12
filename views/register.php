<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/styleLogin.css">
    <title>Register</title>
</head>
<body>
    <div class="apresentation">
        <p>Join Elegance</p>
        <h1>Create your account</h1>
    </div>
    <div class="error">
        
    </div>
    <section class="register">
        <div class="control">
            <p>Username <span>*</span></p>
            <input type="text" name="" id="username">
        </div>
        <div class="control">
            <p>Email address <span>*</span></p>
            <input type="text" name="" id="email">
        </div>

        <div class="control">
            <p>Password <span>*</span></p>
            <input type="password" name="" id="password">
        </div>
        <div class="control">
            <button id="register">Register</button>
        </div>
    </section>

    <div class="loading">
        <div class="content">
            <img src="assets/img/loading.gif" alt="">
        </div>
    </div>
    <div class="verifyEmail">
        <div class="content">
    
            <img src="assets/img/waiting.gif" alt="" width="">
            <p>Estamos quase lá!</p>
            <span>Digite o codigo de verificação que mandamos em seu email</span>


            <div class="numbersOfValidate">
                
                <input type="text" name="" id="" maxlength="1" data-js="numbersValidate">
                
                <input type="text" name="" id="" maxlength="1" data-js="numbersValidate">
                
                <input type="text" name="" id="" maxlength="1" data-js="numbersValidate">
                
                <input type="text" name="" id="" maxlength="1" data-js="numbersValidate">
                
                <input type="text" name="" id="" maxlength="1" data-js="numbersValidate">
            
            </div>
            
            <a href="" id="getNumbers">Verificar codigo</a>
        </div>
    </div>
    <div class="success">
        <div class="content">
            <img src="assets/img/ok.png" alt="">
            <p>Conta criada com sucesso!</p>
            <a href="<?= BASE_URL . "login"?>">Fazer log-in</a>
        </div>
    </div>
    <script src="assets/js/RegisterController.js"></script>
   <script src="assets/js/index.js"></script>
</body>
</html>