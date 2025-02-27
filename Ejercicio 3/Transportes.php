<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $vehiculo = $_POST['vehiculo'];
    $distancia = floatval($_POST['distancia']);

    $consumo = [
        'Camion de 5 Toneladas' => 12,
        'Camion de 3 Toneladas' => 16,
        'Pickup' => 22,
        'Panel' => 28,
        'Moto' => 42
    ];

    if (isset($consumo[$vehiculo]) && $distancia > 0) {
        $galones = round($distancia / $consumo[$vehiculo], 3);
        $mensaje = "El $vehiculo recorrerá $distancia Km de distancia consumiendo $galones Galones.";
    } else {
        $mensaje = "Por favor ingrese una distancia válida y seleccione un vehículo.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de Consumo de Combustible</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            max-width: 600px;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Calculadora de Consumo de Combustible</h2>
        <form method="post" action="">
            <div class="mb-3">
                <label for="vehiculo" class="form-label">Seleccione el vehículo:</label>
                <select class="form-select" id="vehiculo" name="vehiculo" required>
                    <option value="">Seleccionar</option>
                    <option value="Camion de 5 Toneladas">Camión de 5 Toneladas</option>
                    <option value="Camion de 3 Toneladas">Camión de 3 Toneladas</option>
                    <option value="Pickup">Pickup</option>
                    <option value="Panel">Panel</option>
                    <option value="Moto">Moto</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="distancia" class="form-label">Ingrese la distancia (Km):</label>
                <input type="number" class="form-control" id="distancia" name="distancia" step="0.01" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Calcular</button>
        </form>
        <?php if (isset($mensaje)): ?>
            <div class="mt-4 alert alert-info text-center">
                <?php echo $mensaje; ?>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>