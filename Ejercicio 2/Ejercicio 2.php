<?php
// Definir las unidades de medida
$unidades = array(
  'metro' => array('metro' => 1, 'pulgada' => 39.3701, 'yarda' => 1.09361, 'pie' => 3.28084),
  'pulgada' => array('metro' => 0.0254, 'pulgada' => 1, 'yarda' => 0.0000833333, 'pie' => 0.0833333),
  'yarda' => array('metro' => 0.9144, 'pulgada' => 36, 'yarda' => 1, 'pie' => 3),
  'pie' => array('metro' => 0.3048, 'pulgada' => 12, 'yarda' => 0.333333, 'pie' => 1)
);
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Conversor de Longitudes</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>
  <div class="container">
    <h1>Conversor de Longitudes</h1>
    <form action="#" method="post">
      <div class="form-group">
        <label for="unidad">Unidad de medida:</label>
        <select id="unidad" name="unidad" class="form-control">
          <option value="metro">Metro</option>
          <option value="pulgada">Pulgada</option>
          <option value="yarda">Yarda</option>
          <option value="pie">Pie</option>
        </select>
      </div>
      <div class="form-group">
        <label for="cantidad">Cantidad:</label>
        <input type="number" id="cantidad" name="cantidad" class="form-control" step="0.00001">
      </div>
      <button type="submit" class="btn btn-primary">Convertir</button>
    </form>
    <?php if (isset($_POST['unidad']) && isset($_POST['cantidad'])): ?>
      <h2>Resultados:</h2>
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Unidad</th>
            <th>Resultado</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($unidades[$_POST['unidad']] as $unidad => $factor): ?>
            <tr>
              <td><?php echo $unidad; ?></td>
              <td><?php echo $_POST['cantidad'] * $factor; ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    <?php endif; ?>
  </div>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>