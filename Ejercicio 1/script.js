document.addEventListener("DOMContentLoaded", () => {
    const amountInput = document.getElementById("amount");
    const fromCurrency = document.getElementById("fromCurrency");
    const toCurrency = document.getElementById("toCurrency");
    const resultText = document.getElementById("result");
    const swapButton = document.getElementById("swap");

    async function fetchExchangeRate() {
        const from = fromCurrency.value;
        const to = toCurrency.value;
        const amount = amountInput.value;

        const response = await fetch(`convert.php?from=${from}&to=${to}&amount=${amount}`);
        const data = await response.json();
        resultText.innerText = `${amount} ${from} = ${data.converted} ${to}`;
    }

    amountInput.addEventListener("input", fetchExchangeRate);
    fromCurrency.addEventListener("change", fetchExchangeRate);
    toCurrency.addEventListener("change", fetchExchangeRate);
    swapButton.addEventListener("click", () => {
        [fromCurrency.value, toCurrency.value] = [toCurrency.value, fromCurrency.value];
        fetchExchangeRate();
    });

    fetchExchangeRate();
});