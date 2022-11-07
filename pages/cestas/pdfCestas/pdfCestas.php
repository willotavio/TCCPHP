<?php
        require '../../../dompdf/vendor/autoload.php';

        use Dompdf\Dompdf;
        use Dompdf\Options;

        
        $options = new Options();

        $options->setChroot(__DIR__);

        $dompdf = new Dompdf($options);

        
        ob_start();
        require 'layoutPDFCestas.php';

        $dompdf->set_option('isRemoteEnabled',true);

        $dompdf->loadHtml(ob_get_clean());

        $dompdf->setPaper('A4', 'portrait');

        $dompdf->render();
      
        header('Content-type: application/pdf');
        echo $dompdf->output();

        $dompdf->stream("relatoriocestas.pdf", array("Attachment" => false));

    ?>