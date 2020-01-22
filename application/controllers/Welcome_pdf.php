

<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Welcome_pdf extends CI_Controller {


  /**
    * Get All Data from this method.
    *
    * @return Response
   */
   public function index()
   {
	$this->load->view('welcome_message');
   }


   /**
    * Get Download PDF File
    *
    * @return Response
   */
   function convertpdf(){


	// Get output html
        $html = $this->output->get_output();
       

        
        // Load pdf library
        $this->load->library('pdf');
        
        // Load HTML content
       
        $this->pdf->load_html();
        
        // (Optional) Setup the paper size and orientation
        $this->pdf->setPaper('A4', 'landscape');
        
        // Render the HTML as PDF
        $this->pdf->render();
        
        // Output the generated PDF (1 = download and 0 = preview)
        $this->pdf->stream("welcome.pdf", array("Attachment"=>0));
   }
}

