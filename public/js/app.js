function imprimirPDF() {
    // Selecciona el elemento que deseas convertir a PDF
    const elemento = document.body;

    // Opciones para la generación del PDF
    const opciones = {
        filename: "documento.pdf", // Nombre del archivo PDF
        image: { type: "jpeg", quality: 0.98 }, // Tipo de imagen y calidad
        html2canvas: { scale: 2 }, // Escala de la captura de pantalla
        jsPDF: { unit: "in", format: "letter", orientation: "portrait" }, // Formato del PDF
    };

    // Convierte el contenido a PDF
    html2pdf().set(opciones).from(elemento).save(); // Guarda el PDF
}
