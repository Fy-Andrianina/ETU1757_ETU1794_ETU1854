<?php
if (!defined('BASEPATH')) exit ('No direct script access allowed');
require_once(APPPATH . 'controllers/Session_controller.php');

class Pdf_ctrl extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Regime');
    }

    public function index()
    {

    }

    public function exporting_pdf($id_regime){
        $data['title'] = 'Body Care | Proforma';

        // Utilisateurs details
        $this -> load -> model('Utilisateur');
        $this -> load -> model('Sport');
        $id_utilisateurs = $this -> session -> userdata('idUser');
        $data['user'] = $this -> Utilisateur -> get_utilisateur_by_id($id_utilisateurs);

        // Details du regime
        $regime_details = $this -> Regime -> get_regime_detail_by_id($id_regime);
        $data['regime_detail'] = $regime_details;
        $regime = $this -> Regime -> get_regime_by_id($id_regime);;
        $data['regime'] = $regime;
        
        $ht = $regime['durree_regime'] * $regime['prix_regime'];
        $data['ht_amount'] = $ht;
        $tva = $ht * 0.2;
        $data['ttc_amount'] = $tva + $ht;
        $data['tva'] = $tva; 

        // Sport pour client
        $data['sports'] = $this -> Sport -> get_sports_pour_client($id_utilisateurs);

        // Charger la bibliothèque TCPDF
        $this->load->library('tcpdf');

        // Créer un nouvel objet TCPDF
        $pdf = new TCPDF();

        // Définir les métadonnées du PDF
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Your Name');
        $pdf->SetTitle('Body Care | Export PDF');
        $pdf->SetSubject('Testing TCPDF');
        $pdf->SetKeywords('TCPDF, PDF, CodeIgniter');

        // Ajouter une page
        $pdf->AddPage();

        // Charger la vue pdf_view.php
        $data['pdf'] = $pdf;
        $this->load->view('pdf', $data);

        // Rendre le PDF
        $pdf->Output('mypdf.pdf', 'I'); 
    }
}
