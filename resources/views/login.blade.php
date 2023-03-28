<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" />
    <link rel="stylesheet" href="{{ asset('assets/css/LoginCustom.css') }}">
    <script defer src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <title>Login</title>
</head>

<body>
    <section>

        <form>
            <div class="form">
                <h2>login</h2>
                <div class="input">
                    <div class="inputBox">
                        <label for="exampleInputEmail1">Usuario</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="introduzca su usuario">
                    </div>
                    <div class="inputBox">
                        <label for="exampleInputPassword1">Contraseña</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="contraseña">
                    </div>
                    <div class="inputBox">
                        <button id="button" type="submit">Sing In</button>
                    </div>
                </div>
                <p>Forget password? <a class=" text-decoration-none" href="#">Click Here</a></p>
            </div>
        </form>
    </section>

</body>

</html>
