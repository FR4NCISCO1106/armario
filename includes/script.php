<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="js/sb-admin-2.min.js"></script>
<script src="vendor/chart.js/Chart.min.js"></script>
<script src="js/demo/chart-area-demo.js"></script>
<script src="js/demo/chart-pie-demo.js"></script>

<?php 
// --- INICIO CÓDIGO PARA GENERAR PDF ---
// Incluye las librerías CDN para PDF y conversión de HTML (¡IMPORTANTE!)
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

<script>
    // Obtener el objeto jsPDF desde la ventana
    const { jsPDF } = window.jspdf;

    /**
     * Genera un reporte PDF tomando una captura de la tabla HTML con ID 'dataTable'.
     * @param {string} nombreArchivo - El nombre que se usará para descargar el archivo PDF.
     */
    function generarReportePDF(nombreArchivo = 'reporte_inventario_general') { // Agregué un valor por defecto si no se pasa nada
        // 1. Obtenemos el elemento de la tabla por su ID (usado en DataTables)
        const input = document.getElementById('dataTable');
        
        // Mensaje de usuario
        alert(`Generando PDF: ${nombreArchivo}.pdf, por favor espere...`);
        
        // 2. Usamos html2canvas para convertir el elemento a una imagen (canvas)
        html2canvas(input, { scale: 2 }).then((canvas) => {
            
            // 3. Creación y lógica de múltiples páginas (código existente)
            const pdf = new jsPDF('l', 'mm', 'a4'); 
            const imgData = canvas.toDataURL('image/png');
            const pdfWidth = pdf.internal.pageSize.getWidth();
            const pdfHeight = pdf.internal.pageSize.getHeight();
            const imgHeight = (canvas.height * pdfWidth) / canvas.width;
            let heightLeft = imgHeight;
            let position = 0;
            
            pdf.addImage(imgData, 'PNG', 0, position, pdfWidth, imgHeight);
            heightLeft -= pdfHeight;

            while (heightLeft >= -50) { 
                position = heightLeft - imgHeight;
                pdf.addPage();
                pdf.addImage(imgData, 'PNG', 0, position, pdfWidth, imgHeight);
                heightLeft -= pdfHeight;
            }

            // 4. Descargar el archivo con el nombre personalizado (CORRECTO)
            pdf.save(nombreArchivo + ".pdf"); //
        });
    }
</script>