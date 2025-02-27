<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cantidad = isset($_POST["cantidad"]) ? floatval($_POST["cantidad"]) : 0;
    $unidad = isset($_POST["unidad"]) ? $_POST["unidad"] : "metros";
    
    // Factores de conversión
    $conversiones = [
        "metros" => ["pulgadas" => 39.3701, "yardas" => 1.09361, "pies" => 3.28084],
        "pulgadas" => ["metros" => 0.0254, "yardas" => 0.0277778, "pies" => 0.0833333],
        "yardas" => ["metros" => 0.9144, "pulgadas" => 36, "pies" => 3],
        "pies" => ["metros" => 0.3048, "pulgadas" => 12, "yardas" => 0.333333]
    ];
    
    $resultados = [];
    if (isset($conversiones[$unidad])) {
        foreach ($conversiones[$unidad] as $key => $factor) {
            $resultados[$key] = $cantidad * $factor;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversor de Longitudes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h2 class="text-center">Conversor de Longitudes</h2>
    <form method="POST" class="mt-4">
        <div class="mb-3">
            <label for="cantidad" class="form-label">Cantidad:</label>
            <input type="number" step="any" class="form-control" name="cantidad" required>
        </div>
        <div class="mb-3">
            <label for="unidad" class="form-label">Selecciona la unidad:</label>
            <select class="form-select" name="unidad" required>
                <option value="metros">Metros</option>
                <option value="pulgadas">Pulgadas</option>
                <option value="yardas">Yardas</option>
                <option value="pies">Pies</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Convertir</button>
    </form>
    
    <?php if (!empty($resultados)): ?>
        <h3 class="mt-4">Resultados:</h3>
        <p><strong><?php echo $cantidad . ' ' . ucfirst($unidad); ?></strong> equivale a:</p>
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>Unidad</th>
                    <th>Valor</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($resultados as $unidad => $valor): ?>
                    <tr>
                        <td><?php echo ucfirst($unidad); ?></td>
                        <td><?php echo number_format($valor, 4); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</body>
</html>
