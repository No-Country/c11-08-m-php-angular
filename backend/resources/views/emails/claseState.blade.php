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
            <h1 style="color: #009975 ">TUNE<span style="color: #f27600">X</span>O -  
                @if($mailData['state'] === 'Confirmado')
                    Clase Confirmada
                @else
                    <span style="color:red">Clase Cancelada</span>
                @endif
            </h1>
            
        </div>
        <div class="card-body">
            @if($mailData['state'] === 'Confirmado')
                <h2>Felicidades, tu reserva a sido aceptada
                <span class="fs-6"><i class="em em-partying_face mb-2" aria-role="presentation" aria-label="FACE WITH PARTY HORN AND PARTY HAT"></i></span>
                </h2>
                <p>
                    Datos de la clase
                    <br>
                    Profesor: <b>{{$mailData['teacher_name']}}</b>
                    <br>
                    Materia: <b>{{$mailData['subject_name']}}</b>
                    <br>
                    Fecha: <b>{{$mailData['clase']['scheduled_date']}}</b>
                    <br>
                    Hora de inicio: <b>{{$mailData['clase']['start_time']}}</b>
                    <br>
                    Hora de Finalización: <b>{{$mailData['clase']['end_time']}}</b>
                </p>
            @else
                <h2>
                    Lamentablemente su clase a sido cancelada
                    <span class="fs-6"><i class="em em-cry mb-2" aria-role="presentation" aria-label="CRYING FACE"></i></span>
                </h2>
            @endif
        </div>
        <div class="card-footer text-body-secondary">
            <small>Muchas gracias por elegirnos.</small>
        </div>
    </div>

    
</body>
</html>