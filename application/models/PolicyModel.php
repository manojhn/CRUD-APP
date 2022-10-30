<?php

class PolicyModel extends CI_Model{
	public function __construct(){

	}

	public function addPolicy($postArr){
		$result = $insertArr = [];
    	if(!empty($postArr)){
			$insertArr = $this->getPolicyArr($postArr);
            $this->db->insert("policy_details",$insertArr);
            $employeId = $this->db->insert_id();
            if($employeId){
				$result['error'] = false;
                $result['msg'] = 'Policy details added successfully';
            }else{
				$result['error'] = true;
                $result['msg'] = 'Some error occured. Please try again later';
            }
        }
		return $result;
    }

    public function updatePolicy($postArr){
		$response = $updateArr = [];
    	if(!empty($postArr)){
			$updateArr = $this->getPolicyArr($postArr);

            $this->db->where("id", $postArr['policyId']);
			$result = $this->db->update("policy_details", $updateArr);

            if($result){
				$response['error'] = false;
                $response['msg'] = 'Policy details updated successfully';
            }else{
				$response['error'] = true;
                $response['msg'] = 'Some error occured. Please try again later';
            }
        }
		return $response;
    }

	public function getPolicyArr($postArr){
		$finalArr = [];
		$finalArr['first_name'] = $postArr['first_name'];
		$finalArr['last_name'] = $postArr['last_name'];
		$finalArr['policy_number'] = $postArr['policy_number'];
		$finalArr['start_date'] = $postArr['start_date'];
		$finalArr['end_date'] = $postArr['end_date'];
		$finalArr['premium'] = $postArr['premium'];
		return $finalArr;
	}

	// Delete from policy table
    public function deletePolicy(){
		$policyId = $this->input->post("policyId");

		$result = [];
		$this->db->delete("policy_details", ["id" => $policyId]);

		$result['error'] = false;
        $result['msg'] = 'Policy deleted successfully';

		return $result;
	}

	// Select Policy details
	public function getPolicyDetails($policyId){
    	$this->db->select("*");
    	$this->db->from("policy_details");
    	$this->db->where("id", $policyId);

    	return $this->db->get()->row_array();
    }

	public function getAllPolicysList(){
		$finalArr = [];
		$result = $this->db->select("*")
							->from("policy_details")
							->order_by('id','desc')
							->get()->result_array();

		$totalRecordCount = $this->db->query("SELECT found_rows() as recordCount")->row()->recordCount;
        $finalArr['recordsTotal'] = $totalRecordCount;
        $finalArr['recordsFiltered'] = $totalRecordCount;
        $finalArr['recordCount'] = $totalRecordCount;
        $finalArr['data'] = $this->getFinalData($result);
        
        return $finalArr;
	}

	public function getFinalData($resultArray) {
		// print_r($resultArray);die;
        $finalResultArray = [];
        if (count($resultArray) > 0) {
            foreach ($resultArray as $key => $value){
				
                $tmpArray = [];
				$id = $value['id'];
				$tmpArray['first_name'] = $value['first_name'];
				$tmpArray['last_name'] = $value['last_name'];
                $tmpArray['policy_number'] = $value['policy_number'];
				$tmpArray['start_date'] = $value['start_date'];
				$tmpArray['end_date'] = $value['end_date'];
				$tmpArray['premium'] = $value['premium'];
				$tmpArray['action'] = '<a style="text-decoration:none;" alt="Edit" href='.site_url('policy/edit/'.$id).' class="btn btn-warning btn-xs">Edit</a>&nbsp;&nbsp;&nbsp;<button type="button" alt="Delete" onclick=\'deleteRecord("'.$value['id'].'")\' class="btn btn-danger btn-xs">Delete</button>';
                $finalResultArray[] = array_values($tmpArray);
            }
        }
        return $finalResultArray;
    }

	public function uploadPhoto($postArr){
		$fileName = '';
		if(!empty($postArr['files']['photo']['name'])){
			$fileExtension = pathinfo($postArr['files']['photo']['name'], PATHINFO_EXTENSION);
			$fileName='Photo_'.microtime(true).'.'.$fileExtension;
			
			move_uploaded_file($postArr['files']['photo']["tmp_name"], IMG.$fileName);
		}
		return $fileName;
	}
}
?>