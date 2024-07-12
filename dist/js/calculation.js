document.addEventListener('DOMContentLoaded', (event) => {
    const valorResidual = document.getElementById('valor-residual');
    const valorDescontado = document.getElementById('valor-descontado');
    const valorCompra = document.getElementById('valor-compra');
    const valorAcumulado = document.getElementById('valor-acumulado');
    const valorAcumuladoFinal = document.getElementById('valor-acumulado-talao');

    const resetButton = document.getElementById('resetBtn');

    valorResidual.addEventListener('input', () => {
        valorDescontado.value = valorResidual.value;
    })

    valorCompra.addEventListener('input', () => {
        valorAcumulado.value = Math.round((valorCompra.value) / 1.23 * 0.04);
        valorAcumuladoFinal.value = Math.round((valorCompra.value) / 1.23 * 0.04);
    });

    valorDescontado.addEventListener('input', () => {
        valorAcumuladoFinal.value = parseFloat(valorAcumulado.value) + (valorResidual.value - valorDescontado.value);
    });

    resetButton.addEventListener('click', (e) => {
        e.preventDefault();
        valorResidual.value = "";
        valorDescontado.value = "";
        valorCompra.value = "";
        valorAcumulado.value = "";
        valorAcumuladoFinal.value = "";
    });
});