<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
</head>
  <body class="bg-dark">
    <h1 class="text-light text-center my-3">Visitas a museo</h1>
    <div class="">
        <div class="row mx-0 my-4">
            <div class="col bg-gold">
                <table class="mi-tabla">
                    <tr id="head">
                        <td id="nac">23</td>
                        <td id="ext">34</td>
                        <td id="lang1">4</td>
                        <td id="lang2">5</td>
                    </tr>
                    <tr id="body">
                        <td>No. Nacionales</td>
                        <td>No. Extranjeros</td>
                        <td>Primera Lengua</td>
                        <td>Segunda Lengua</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="row mx-0 my-2">
            <div class="col">
                <table class="table table-hover">
                    <thead>
                        <tr id="thead"></tr>
                    </thead>
                    <tbody id="tbody">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="script.js"></script>
</body>
</html>