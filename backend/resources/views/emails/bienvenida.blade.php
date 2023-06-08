<!DOCTYPE html>
<html>
    <head>
        <title>Mail Students</title>
    </head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <!-- Emojis -->
    <link href="https://emoji-css.afeld.me/emoji.css" rel="stylesheet">
<body>
    <div class="card text-center shadow">
    <div class="card-header">
        <h1 style="color: #009975 ">Bienvenido a TUNE<span style="color: #f27600">X</span>O
        <span class="fs-5"><i class="em em-partying_face mb-3" aria-role="presentation" aria-label="FACE WITH PARTY HORN AND PARTY HAT"></i></span></h1>
    </div>
    <div class="card-body">
        <h2>¡Hola {{$mailData['name']}}!</h2>
        <p>
            {{$mailData['body']}}
            <br>
            <br>
            <br>
        </p>
    </div>
    <div class="card-footer text-body-secondary">
        <small>Muchas gracias por elegirnos.</small>
    </div>
    </div>
        <!-- Nos alegra que estes aqui.TuNexo tiene una
        comunidad grande de profesionales para apoyarte segun tus necesidades. No dudes en buscar
        a tu profesor ideal. -->
    
</body>
</html>