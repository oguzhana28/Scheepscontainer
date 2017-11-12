<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * User Management class created by CodexWorld
 */
class Users extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('user');
    }
    
    /*
     * User account information
     */
    public function ships(){
        $ships = array();
        if($this->session->userdata('isUserLoggedIn')){
         if($this->session->userdata['user']['role'] == 'planner' || $this->session->userdata['user']['role'] == 'Vlootmanager' || $this->session->userdata['user']['role'] == 'Routeplanner'){
            $ships['ships'] = $this->user->getShips();
            //load the view
            $this->load->view('templates/header');
            $this->load->view('users/ships', $ships);
            $this->load->view('templates/footer');
            }else if($this->session->userdata['user']['role'] == 'admin'){
            $this->load->view('templates/header');
            $this->load->view('containers/containers');
            $this->load->view('templates/footer');
               }else if($this->session->userdata['user']['role'] == 'Routeplanner'){
             
         }
        }else{
            redirect('users/ships');
        }
    }
    
    /*
     * User login
     */
    public function index(){
        $data = array();
        $checkLogin = array();
        if($this->session->userdata('success_msg')){
            $data['success_msg'] = $this->session->userdata('success_msg');
            $this->session->unset_userdata('success_msg');
        }
        if($this->session->userdata('error_msg')){
            $data['error_msg'] = $this->session->userdata('error_msg');
            $this->session->unset_userdata('error_msg');
        }
        if($this->input->post('loginSubmit')){
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('password', 'password', 'required');
            if ($this->form_validation->run() == true) {
                $con['returnType'] = 'single';
                $con['conditions'] = array(
                    'email'=>$this->input->post('email'),
                    'password' => md5($this->input->post('password')),
                    'status' => '1'
                );
                $checkLogin = $this->user->getRows($con);
                
                if($checkLogin){
                    $this->session->set_userdata('isUserLoggedIn',TRUE);
                    $this->session->set_userdata('user',$checkLogin);
                    $this->session->set_userdata('userId',$checkLogin['id']);
                    if($this->session->userdata['user']['role'] == 'planner' || 'Vlootmanager'){
                    redirect('Users/ships/');
                    }else if($this->session->userdata['user']['role'] == 'admin'){
                        redirect('Users/containers/');
                    }
                }else{
                    $data['error_msg'] = 'Wrong email or password, please try again.';
                }
            }
        }
       
        //load the view
        
        $this->load->view('templates/header');
        $this->load->view('users/login', $data);
        $this->load->view('templates/footer');
     
        
    }
    
    /*
     * User registration
     */
    public function registration(){
        $data = array();
        $userData = array();
        if($this->input->post('regisSubmit')){
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_email_check');
            $this->form_validation->set_rules('password', 'password', 'required');
            $this->form_validation->set_rules('conf_password', 'confirm password', 'required|matches[password]');

            $userData = array(
                'name' => strip_tags($this->input->post('name')),
                'email' => strip_tags($this->input->post('email')),
                'password' => md5($this->input->post('password')),
                'gender' => $this->input->post('gender'),
                'phone' => strip_tags($this->input->post('phone'))
            );

            if($this->form_validation->run() == true){
                $insert = $this->user->insert($userData);
                if($insert){
                    $this->session->set_flashdata('success_msg', 'Your registration was successfully. Please login to your account.');
                    redirect('Users/index');
                }else{
                    $data['error_msg'] = 'Some problems occured, please try again.';
                }
            }
        }
        $data['user'] = $userData;
        //load the view
        $this->load->view('templates/header');
        $this->load->view('users/registration', $data);
        $this->load->view('templates/footer');
    }
    
    /*
     * User logout
     */
    public function logout(){
        $this->session->unset_userdata('isUserLoggedIn');
        $this->session->unset_userdata('userId');
        $this->session->sess_destroy();
        redirect('Users/index/');
    }
    
    /*
     * Existing email check during validation
     */
    public function email_check($str){
        $con['returnType'] = 'count';
        $con['conditions'] = array('email'=>$str);
        $checkEmail = $this->user->getRows($con);
        if($checkEmail > 0){
            $this->form_validation->set_message('email_check', 'The given email already exists.');
            return FALSE;
        } else {
            return TRUE;
        }
    }

public function createNewBoat(){
        if($this->input->post('boatSub')){
    $boatData = array(
                'IMO-nummer' => strip_tags($this->input->post('IMO-nummer')),
                'scheepsnaam' => strip_tags($this->input->post('scheepsnaam')),
                'bouwjaar' => strip_tags($this->input->post('bouwjaar')),
                'thuishaven' => strip_tags($this->input->post('thuishaven')),
                'thuisland' => strip_tags($this->input->post('thuisland')),
                'MMSI-nummer' => strip_tags($this->input->post('MMSI-nummer')),
                'lengte_m' => strip_tags($this->input->post('lengte_m')),
                'breedte_m' => strip_tags($this->input->post('breedte_m')),
                'diepte' => strip_tags($this->input->post('diepte')),
                'draagvermogen_ton' => strip_tags($this->input->post('draagvermogen_ton')),
                'ruim_lengte_m' => strip_tags($this->input->post('ruim_lengte_m')),
                'ruim_breedte_m' => strip_tags($this->input->post('ruim_breedte_m')),
                'ruim_hoogte_m' => strip_tags($this->input->post('ruim_hoogte_m')),
                'max_gevaarlijke_stoffen_x' => strip_tags($this->input->post('max_gevaarlijke_stoffen_x')),
                'ruim_max_totaal_vloer_belasting_ton' => strip_tags($this->input->post('ruim_max_totaal_vloer_belasting_ton')),
                'ruim_max_kolom_vloerbelasting_ton' => strip_tags($this->input->post('ruim_max_kolom_vloerbelasting_ton'))
            );
            $routeData =array(
                'from' => strip_tags($this->input->post('from')),
                'to' => strip_tags($this->input->post('to'))
            );
    $insertBoat = $this->user->insertBoat($boatData,$routeData);
            if($insertBoat){
               redirect('index.php/Users/ships');
            }
        }
        $this->load->view('templates/header');
        $this->load->view('boats/create');
        $this->load->view('templates/footer');
}
public function deleteBoat($id){
    $id = $id;
    $deleted = $this->user->deleteBoat($id);
    if($deleted){
        header('index.php/Users/ships');
    }

} 
public function editBoat($id){
    $ships = array();
    $id = $id;
    $ships['ships'] = $this->user->getDataBoat($id);
    if($this->input->post('boatEditSub')){
            $boatData = array(
                'IMO-nummer' => strip_tags($this->input->post('IMO-nummer')),
                'scheepsnaam' => strip_tags($this->input->post('scheepsnaam')),
                'bouwjaar' => strip_tags($this->input->post('bouwjaar')),
                'thuishaven' => strip_tags($this->input->post('thuishaven')),
                'thuisland' => strip_tags($this->input->post('thuisland')),
                'MMSI-nummer' => strip_tags($this->input->post('MMSI-nummer')),
                'lengte_m' => strip_tags($this->input->post('lengte_m')),
                'breedte_m' => strip_tags($this->input->post('breedte_m')),
                'diepte' => strip_tags($this->input->post('diepte')),
                'draagvermogen_ton' => strip_tags($this->input->post('draagvermogen_ton')),
                'ruim_lengte_m' => strip_tags($this->input->post('ruim_lengte_m')),
                'ruim_breedte_m' => strip_tags($this->input->post('ruim_breedte_m')),
                'ruim_hoogte_m' => strip_tags($this->input->post('ruim_hoogte_m')),
                'max_gevaarlijke_stoffen_x' => strip_tags($this->input->post('max_gevaarlijke_stoffen_x')),
                'ruim_max_totaal_vloer_belasting_ton' => strip_tags($this->input->post('ruim_max_totaal_vloer_belasting_ton')),
                'ruim_max_kolom_vloerbelasting_ton' => strip_tags($this->input->post('ruim_max_kolom_vloerbelasting_ton'))
            );
          $post = $this->user->updateBoat($id,$boatData);
    }
        $this->load->view('templates/header');
        $this->load->view('boats/edit',$ships);
        $this->load->view('templates/footer');

}
    public function containers(){
            $this->load->view('templates/header');
            $this->load->view('containers/containers');
            $this->load->view('templates/footer');

    }
}