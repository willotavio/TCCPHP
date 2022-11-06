<?php
        require '../../../dompdf/vendor/autoload.php';

        use Dompdf\Dompdf;
        use Dompdf\Options;

        
        $options = new Options();

        $options->setChroot(__DIR__);

        $dompdf = new Dompdf($options);

        
        ob_start();
        require 'layoutPDFFinanceiro.php';

        
        $dompdf->loadHtml(ob_get_clean());

        $dompdf->setPaper('A4', 'portrait');

        $dompdf->render();
      
        header('Content-type: application/pdf');
        echo $dompdf->output();

        $dompdf->stream("relatorioFinanceiro.pdf", array("Attachment" => false));

    ?>