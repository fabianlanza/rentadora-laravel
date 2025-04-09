<!DOCTYPE html>
<html>
<head>
    <title>Confirmación de Reserva</title>
    <style>
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background: linear-gradient(45deg, #00a9d4, #007bff);
            color: white;
            padding: 20px;
            text-align: center;
            border-radius: 5px 5px 0 0;
        }
        .content {
            padding: 20px;
            border: 1px solid #ddd;
            border-top: none;
            border-radius: 0 0 5px 5px;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 12px;
            color: #666;
        }
        .details {
            background-color: #f9f9f9;
            padding: 15px;
            border-radius: 5px;
            margin: 15px 0;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>¡Reserva Confirmada!</h1>
    </div>
    
    <div class="content">
        <p>Estimado(a) <strong>{{ $reservacion->nombre_cliente ?? 'Cliente' }}</strong>,</p>
        
        <p>Gracias por elegir VíaCar. Su reserva ha sido confirmada exitosamente.</p>
        
        <div class="details">
            <h3>Detalles de la Reserva:</h3>
            <p><strong>Número de Reserva:</strong> #{{ $reservacion->id }}</p>
            <p><strong>Vehículo:</strong> {{ $reservacion->auto->modelo ?? 'Vehículo seleccionado' }}</p>
            <p><strong>Fecha de Inicio:</strong> {{ $reservacion->fecha_inicio }}</p>
            <p><strong>Fecha de Devolución:</strong> {{ $reservacion->fecha_fin }}</p>
            <p><strong>Días Reservados:</strong> {{ $reservacion->cantidad_dias_reservado }}</p>
            <p><strong>Seguro:</strong> {{ $reservacion->seguro }}</p>
        </div>
        
        <p>Si tiene alguna pregunta o necesita modificar su reserva, no dude en contactarnos.</p>
        
        <p>¡Esperamos que disfrute su experiencia con VíaCar!</p>
    </div>
    
    <div class="footer">
        <p>© {{ date('Y') }} VíaCar - Tu ruta, nuestro compromiso</p>
        <p>Este es un correo automático, por favor no responda a este mensaje.</p>
    </div>
</body>
</html>