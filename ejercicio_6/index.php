<!doctype html>
<html lang="en">

<head>
    <?php include 'imports.php'; ?>
    <title>Ejercicio6</title>
</head>

<body>

    <?php include 'navbar.php'; ?>

    <div class="d-flex full-window">
    <div class="m-auto card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">Login</h5>
            <form action="myform.php" method="get">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                    </div>
                    <!--<div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>-->
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
        </div>
    </div>

    </div>
   

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>