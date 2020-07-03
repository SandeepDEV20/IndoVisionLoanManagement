<?php

defined('BASEPATH') OR exit('No direct script access allowed');    

class tl_controller extends CI_Controller 
{
public function tl_approval_Lists()
	{
				$post_array=[
						 'api_key'     => API_KEY
					];
			    $loan_lists = callAPI('POST',base_url('api/Api_admin/all_emp_loan_lists'),$post_array);
				$result=json_decode($loan_lists);
				//print_r($result); die;
				$this->load->view('tl_view/tl_approval',$result);
	}

	public function loan_records()
	{
		if(isset($_GET['id']))
		{
			$id=$_GET['id'];
			$post_array=[
								 'api_key'     => API_KEY,
								 'emp_id'     =>  $id
						 ];
			    $loan_lists = callAPI('POST',base_url('api/Myapi/emp_loan_lists'),$post_array);
				$result=json_decode($loan_lists);
				//print_r($result); die;
				$this->load->view('tl_view/emp_individual_loan_record',$result);

		}
	}
	
	public function tl_update()
	{
		//$this->load->model('api_model');

		if(isset($_POST['update_loanlists']))
		{

				if(isset($_POST['update']))
				{  
					 
				      $status=$_POST['update_loanlists'];
						    foreach($_POST['update'] as $updateid)
						    {
						    	//echo $updateid; die;
						    	
						    		//$data[$i]=$updateid; 
						    	 //$LoanStatus = $this->input->post('approval_'.$updateid);
		                          $post_array= [ 'api_key'     => API_KEY,
		                          				'approvalStatus'  => $status,
						                           
						                           'id'  => $updateid
						                           
						                    
						                    
						                  ];
								    	
								    	//$r=$this->api_model->updateloanlists($updateid,$status);
							$loan_lists = callAPI('POST',base_url('api/Api_admin/tl_update'),$post_array);
								   
 

						    }
						    // if($r)
						    // {
						    // 	redirect("tl_controller/employeeLoanLists?msg=successfully_updatedStatus");
						    // }

					//print_r($post_array); die;
				  	//$loan_lists = callAPI('PUT',base_url('api/Api_admin/updateEmpLoanLists'),$post_array);
					$result=json_decode($loan_lists);
					//print_r($result); die;
					if($result->status == 1)
					{
						  redirect("tl_controller/tl_approval_Lists?msg=successfully_updatedStatus");
					}
					else
					{
						redirect("tl_controller/tl_approval_Lists?msg=update_unsuccess");
					}
				}
				else
				{
					redirect("tl_controller/tl_approval_Lists?msg=please_check_requests");
				}
						    
				  

		}

			
				//$result['data']=$result;
				//$this->load->view('employeeLoanLists',$result);
	}

	
	
}