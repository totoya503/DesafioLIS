<?php
// Tasas de cambio
$exchange_rates = [
    "USD" => ["EUR" => 0.95, "JPY" => 149.65, "GBP" => 0.79],
    "EUR" => ["USD" => 1.15, "JPY" => 156.80, "GBP" => 0.83],
    "JPY" => ["USD" => 0.0067, "EUR" => 0.0064, "GBP" => 0.0053],
    "GBP" => ["USD" => 1.26, "EUR" => 1.21, "JPY" => 189.09 ]
];

// Valores por defecto
$amount = isset($_POST['amount']) ? floatval($_POST['amount']) : 1;
$from_currency = isset($_POST['from_currency']) ? $_POST['from_currency'] : "USD";
$to_currency = isset($_POST['to_currency']) ? $_POST['to_currency'] : "EUR";
$result = 0;

// Realizamos conversión si la tasa existe
if (isset($exchange_rates[$from_currency][$to_currency])) {
    $rate = $exchange_rates[$from_currency][$to_currency];
    $result = $amount * $rate;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversor de Divisa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { text-align: center; padding: 20px; font-family: Arial, sans-serif; }
        .card { max-width: 400px; margin: auto; border-radius: 10px; padding: 20px; }
        .exchange-btn { background-color: #1f6feb; border: none; padding: 10px; border-radius: 8px; margin: 10px 0; }
        .exchange-btn img { width: 30px; }
        .form-control, .form-select { text-align: center; font-size: 1.2rem; }
        h2 { font-style: italic; color: #1f6feb; }
    </style>
</head>
<body>
    <h2><b>Conversor de divisa</b> <img src="img/calculadora.avif" width="40"></h2>

    <div class="card shadow">
        <form method="POST" id="currency-form">
            <div class="mb-3">
                <input type="number" step="0.01" name="amount" class="form-control" value="<?= $amount ?>" required>
            </div>

            <div class="mb-3 d-flex align-items-center justify-content-center">
                <select name="from_currency" id="from_currency" class="form-select">
                    <option value="USD" <?= ($from_currency == "USD") ? "selected" : "" ?>>🇺🇸 Dólares americanos</option>
                    <option value="EUR" <?= ($from_currency == "EUR") ? "selected" : "" ?>>🇪🇺 Euros</option>
                    <option value="JPY" <?= ($from_currency == "JPY") ? "selected" : "" ?>>🇯🇵 Yen Japonés</option>
                    <option value="GBP" <?= ($from_currency == "GBP") ? "selected" : "" ?>>🇬🇧 Libras Esterlinas</option>
                </select>
            </div>

            <button type="button" class="exchange-btn" onclick="swapCurrencies()">
                <img src="img/swap_icon.png" alt="Intercambiar">
            </button>

            <div class="mb-3 d-flex align-items-center justify-content-center">
                <select name="to_currency" id="to_currency" class="form-select">
                    <option value="USD" <?= ($to_currency == "USD") ? "selected" : "" ?>>🇺🇸 Dólares americanos</option>
                    <option value="EUR" <?= ($to_currency == "EUR") ? "selected" : "" ?>>🇪🇺 Euros</option>
                    <option value="JPY" <?= ($to_currency == "JPY") ? "selected" : "" ?>>🇯🇵 Yen Japonés</option>
                    <option value="GBP" <?= ($to_currency == "GBP") ? "selected" : "" ?>>🇬🇧 Libras Esterlinas</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary w-100">Convertir</button>
        </form>

        <?php if ($amount > 0): ?>
            <div class="mt-4">
                <h4><b><?= number_format($amount, 2) ?> <?= $from_currency ?></b> = <b><?= number_format($result, 2) ?> <?= $to_currency ?></b></h4>
            </div>
        <?php endif; ?>
    </div>

    <script>
        function swapCurrencies() {
            let fromCurrency = document.getElementById('from_currency');
            let toCurrency = document.getElementById('to_currency');
            let temp = fromCurrency.value;
            fromCurrency.value = toCurrency.value;
            toCurrency.value = temp;
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>