window.onload = function () {
    console.log("Ert");
    document.querySelectorAll(".column-order_total_without_tax, .column-order_tax_total").forEach(function (element) {
        let value = parseFloat(element.textContent.replace(',', ',')); // Convertir a número
        if (!isNaN(value)) {
            element.textContent = value.toFixed(2) + " €"; // Formatear con dos decimales y añadir €
        }
    });
};
