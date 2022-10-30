<?php

class Policy extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('PolicyModel', 'policy');
    }

    public function index(){
        $this->load->view("list");
    }

    public function view(){
        $this->load->view("list");
    }

    public function getPolicysList(){
        echo json_encode($this->policy->getAllPolicysList());exit;
    }

    public function add(){
        $this->load->view("add_policy");
    }

    public function addPolicy(){
        $postArr = $this->input->post();
        $postArr['files'] = $_FILES;
        
        $result = $this->policy->addPolicy($postArr);
        if(!$result['error']){
            $this->session->set_flashdata("successMessage", $result['msg']);
        }
        redirect('/');
    }

    public function edit($policyId){
        $data = [];
        $data['policyDetails'] = $this->policy->getPolicyDetails($policyId);
        $this->load->view("edit_policy", $data);
    }

    public function updatePolicy(){
        $postArr = $this->input->post();
        $postArr['files'] = $_FILES;
        
        $result = $this->policy->updatePolicy($postArr);
        if(!$result['error']){
            $this->session->set_flashdata("successMessage", $result['msg']);
        }
        redirect('/');
    }

    public function deletePolicy(){
        echo json_encode($this->policy->deletePolicy());exit;
    }
}
