<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

//use chriskacerguis\RestServer\RestController;

class Myapi extends REST_Controller
{
     public function __construct()
     {
     	parent::__construct();
     	$this->load->model('Common_model');
     	
     }
        
    public function validateAPIKey()
    {
    
    $api_key = isset($_POST['api_key']) ? $_POST['api_key'] : NULL;
    $create_by = isset($_POST['create_by']) ? $_POST['create_by'] : NULL;
    
    if(! $this->lib_common->isValidAPIKey( $create_by, $api_key ) ){
      $this->form_validation->set_message("validateAPIKey"," Invalid API Key."); 
      return false; 
    }
    
    return true;

  	} // End Function

  	public function validateUserId(){
    
    $create_by = isset($_POST['create_by']) ? $_POST['create_by'] : NULL;
    
    if(! $this->lib_common->isValidUser($create_by) ){
      $this->form_validation->set_message("validateUserId","Invalid User."); 
      return false; 
    }

    return true;

  	} // End Function

    public function user_verify_post()
	{
		if($this->form_validation->run('api_login') == TRUE )
		{
	      	  $this->db->trans_start();
	          $api_key=trim($this->post('api_key'));
	          $email=$this->post('email');
	          $password=$this->post('password');
			         if(API_KEY==$api_key)
			         {
					           $verified = $this->Common_model->get_entry_by_data('empdetails',true,array('password'=>$password, 'email'=>$email));

					           if(!empty($verified))
					           {
					           		$this->response([
					           			'status'=>1,
					           			'message'=>'Employee Record found',
					           			'data'=>$verified], REST_Controller::HTTP_OK);

					           }
					           else
					           {
					           		$this->response([
					           			'status'=>0,
					           			'message'=>'Employee record not found.'


					           		],REST_Controller::HTTP_NOT_FOUND);
					           }
			     	}
			     	else
			     	{
			     		$this->response([
					           			'status'=>0,
					           			'message'=>'Api key does not match'


					           		],REST_Controller::HTTP_NOT_FOUND);
			     	}
           
		}
		 else
	      {
	        $data['status_code'] = -1;
	        $data['response'] = "Failed";
	        $data['message'] = str_replace('</p>','',str_replace('<p>','',validation_errors()));
	        $data['data']['Emp_login'] = NULL;
	        $this->response($data,REST_Controller::HTTP_OK);
	      }

	}
        public function loanStatus_post()
       {
		     if($this->form_validation->run('api_loanstatus') == TRUE )
		     {
		     	  $this->db->trans_start();
		          $api_key=trim($this->post('api_key'));
		          $id=$this->post('emp_id');

		          if(API_KEY==$api_key)
			         {
			       			

			         		$s=$this->Common_model->get_entry_by_data('emp_loan_lists',true,array('emp_id' =>$id , 'recoveryStatus'=>'pending'),'recoveryStatus');

			       			if(!empty($s))
			           		{
			           		
			           		     $this->response(['status'=>'yes',
			                                       'data'=>$s
			           		                 ], REST_Controller::HTTP_OK);	
			           		

			           		}
					        else
					          {
					           		$this->response([
					           			'status'=>'No',
					           		],REST_Controller::HTTP_OK);
					           }
					  }
					  else
			     	{
			     		$this->response([
					           			'status'=>False,
					           			'message'=>'key does not match'


					           		],REST_Controller::HTTP_NOT_FOUND);
			     	}
		      }
		       else
		      {
		        $data['status_code'] = -1;
		        $data['response'] = "Failed";
		        $data['message'] = str_replace('</p>','',str_replace('<p>','',validation_errors()));
		        $data['data']['Loan_status'] = NULL;
		        $this->response($data,REST_Controller::HTTP_OK);
		      }
       }
       
    public function emp_details_post()
	{
		if($this->form_validation->run('api_emp_details') == TRUE )
		     {
		     	  $this->db->trans_start();
		          $api_key=trim($this->post('api_key'));
		          $id=$this->post('emp_id');

		          	if(API_KEY==$api_key)
			         {
           
				           $r = $this->Common_model->get_entry_by_data('empdetails',true,array('emp_id'=>$id));

				           if(!empty($r))
				           {
				           		$this->response($r, REST_Controller::HTTP_OK);
				           		//$this->load->view('form_view');

				           }
				           else
				           {
				           		$this->response([
				           			'status'=>False,
				           			'message'=>'No user were found.'


				           		],REST_Controller::HTTP_NOT_FOUND);
				           }
				     }
				     else
			     	{
			     		$this->response([
					           			'status'=>False,
					           			'message'=>'key does not match'


					           		],REST_Controller::HTTP_NOT_FOUND);
			     	}
			}
			else
		      {
		        $data['status_code'] = -1;
		        $data['response'] = "Failed";
		        $data['message'] = str_replace('</p>','',str_replace('<p>','',validation_errors()));
		        $data['data']['emp_details'] = NULL;
		        $this->response($data,REST_Controller::HTTP_OK);
		      }
     
           
	}
	public function emp_loan_lists_post()
	{
           if($this->form_validation->run('api_emp_loan_lists') == TRUE )
		     {
		     	  $this->db->trans_start();
		          $api_key=trim($this->post('api_key'));
		          $id=$this->post('emp_id');
          		
          		 	if(API_KEY==$api_key)
			         {
			         	$r = $this->Common_model->get_entry_by_data('emp_loan_lists',false,array('emp_id'=>$id));
					           if(!empty($r))
					           {
					           		$this->response([
						           			'status'=>1,
						           			'message'=>count($r).' records found ',
						           			'data' => $r
						           			], REST_Controller::HTTP_OK);
									           

					           }
					           else
					           {
					           		$this->response([
					           			'status'=>0,
					           			'message'=>'No user were found.'


					           		],REST_Controller::HTTP_NOT_FOUND);
					           }
			   		}
			           	else
				     	{
				     		$this->response([
						           			'status'=>0,
						           			'message'=>'key does not match'


						           		],REST_Controller::HTTP_NOT_FOUND);
				     	}
			}
			else
		      {
		        $data['status_code'] = -1;
		        $data['response'] = "Failed";
		        $data['message'] = str_replace('</p>','',str_replace('<p>','',validation_errors()));
		        $data['data']['emp_loan_lists'] = NULL;
		        $this->response($data,REST_Controller::HTTP_OK);
		      }
     
           
	}
	public function emp_individual_list_post()
	{
		if($this->form_validation->run('api_emp_individual_loan_list') == TRUE )
		     {
		     	  $this->db->trans_start();
		          $api_key=trim($this->post('api_key'));
		          $id=$this->post('loan_id');
          		
          		 	if(API_KEY==$api_key)
			         {
           
					    $r = $this->Common_model->get_entry_by_data('emp_loan_lists',true,array('loan_id'=>$id,'approvalStatus'=>'approved'));

					           if(!empty($r))
					           {
					           		$this->response($r, REST_Controller::HTTP_OK);
					         

					           }
					           else
					           {
					           		$this->response([
					           			'status'=>'false',
					           			'message'=>'No user were found.'


					           		],REST_Controller::HTTP_NOT_FOUND);
					           }
			          }
			           	else
				     	{
				     		$this->response([
						           			'status'=>False,
						           			'message'=>'key does not match'


						           		],REST_Controller::HTTP_NOT_FOUND);
				     	}
			}
			else
		      {
		        $data['status_code'] = -1;
		        $data['response'] = "Failed";
		        $data['message'] = str_replace('</p>','',str_replace('<p>','',validation_errors()));
		        $data['data']['emp_individual_loan_details'] = NULL;
		        $this->response($data,REST_Controller::HTTP_OK);
		      }
     
           
	}
	public function get_emp_loan_recovery_status_post()
	{
		if($this->form_validation->run('api_get_emp_loan_recovery_status') == TRUE )
		{
				$api_key=trim($this->input->post('api_key'));
		           $id=$this->post('loan_id');
	           if(API_KEY == $api_key)
	           {
				       $r = $this->Common_model->get_entry_by_data('emp_loan_lists',true,array('approvalStatus' =>  'approved','loan_id'=>$id) );

				            if(!empty($r))
							           {
							           		$this->response($r, REST_Controller::HTTP_OK);
							         

							           }
							           else
							           {
							           		$this->response([
							           			'status'=>'false',
							           			'message'=>'No user were found.'


							           		],REST_Controller::HTTP_NOT_FOUND);
							           }
			    }
			           	else
				     	{
				     		$this->response([
						           			'status'=>False,
						           			'message'=>'key does not match'


						           		],REST_Controller::HTTP_NOT_FOUND);
				     	}
			}
			else
		      {
		        $data['status_code'] = -1;
		        $data['response'] = "Failed";
		        $data['message'] = str_replace('</p>','',str_replace('<p>','',validation_errors()));
		        $data['data']['emp_individual_loan_details'] = NULL;
		        $this->response($data,REST_Controller::HTTP_OK);
		      }
     
		
		
	}

	public function LoanCategory_post()
	{
		
		          $api_key=trim($this->post('api_key'));
		          

		          	if(API_KEY==$api_key)
			         {	
						   $query = $this->Common_model->get_all_entries('loan_category');
					
					      if(!empty($query))
					      {
					        
					      		
						          $data['status_code'] = 1;
						          $data['response'] = "Success";
						          $data['message']    = count($query).' records found ';
						          $data['data']['loan_category'] = $query;
					         	 $this->response($data,REST_Controller::HTTP_OK);

					      }
					        else
					        {

					          $data['status_code'] = 0;
					          $data['response']    = "Success";
					          $data['message']     = 'no record found';
					          $data['data']['loan_category'] = NULL;
					          $this->response($data,REST_Controller::HTTP_OK);

					        }
				      }
				      
				      else 
				      {
				          $data['status_code'] = -1;
				          $data['response']    = "Failed";
				          $data['message']     = 'API key does not matched.';
				           $data['data']['loan_category'] = NULL;
				          $this->response($data,REST_Controller::HTTP_OK);
				      }

	}
	public function RepaymentMode_post()
	{
		$api_key=trim($this->post('api_key'));
		          

		          	if(API_KEY==$api_key)
			         {	
		
						$query = $this->Common_model->get_all_entries('repayment_type');
						  if(!empty($query))
					      {
					        
					      		
						          $data['status_code'] = 1;
						          $data['response'] = "Success";
						          $data['message']    = count($query).' records found ';
						          $data['data']['repay_type'] = $query;
					         	 $this->response($data,REST_Controller::HTTP_OK);

					      }
					        else
					        {

					          $data['status_code'] = 0;
					          $data['response']    = "Success";
					          $data['message']     = 'no record found';
					          $data['data']['repay_type'] = NULL;
					          $this->response($data,REST_Controller::HTTP_OK);

					        }
				      }
				      
				      else 
				      {
				          $data['status_code'] = -1;
				          $data['response']    = "Failed";
				          $data['message']     = 'API key does not matched.';
				           $data['data']['repay_type'] = NULL;
				          $this->response($data,REST_Controller::HTTP_OK);
				      }


	}

	public function maxLoanAmount_post()
	{
				if($this->form_validation->run('api_emp_and_max_amount_details') == TRUE )
				 {
				     $this->db->trans_start();
				     $api_key=trim($this->post('api_key'));
				     $id=$this->post('emp_id');

			          if(API_KEY==$api_key)
				      {
						$r = $this->Common_model->run_query("select * from empdetails,loan_amount_master where empdetails.designation=loan_amount_master.designation and empdetails.emp_id='$id' ");
						   if(!empty($r))
				           {
				           		$this->response($r, REST_Controller::HTTP_OK);
				           	

				           }
				             else
					           {
					           		$this->response([
					           			'status'=>'false',
					           			'message'=>'No record found.'


					           		],REST_Controller::HTTP_NOT_FOUND);
					           }
			             }
			         else
				     	{
				     		$this->response([
						           			'status'=>False,
						           			'message'=>'key does not match'


						           		],REST_Controller::HTTP_NOT_FOUND);
				     	}
					}
					else
				      {
				        $data['status_code'] = -1;
				        $data['response'] = "Failed";
				        $data['message'] = str_replace('</p>','',str_replace('<p>','',validation_errors()));
				        $data['data']['emp_and_max_amount_details'] = NULL;
				        $this->response($data,REST_Controller::HTTP_OK);
				      }
     

	}


	 public function add_loan_applicant_post()
	 {
					 	if($this->form_validation->run('api_add_loan_applicant') == TRUE)
					 	{
				      		//$this->db->trans_start();
				      			$api_key=trim($this->post('api_key'));
						 		$empdata=[];
						 	    $emp_id=$this->post('emp_id');
						 		$empdata['emp_id']=$this->post('emp_id');
						 		$empdata['department']=$this->post('department');
						 		$empdata['appliedDate']=$this->post('appliedDate');
						 		$empdata['amount']=$this->post('amount');
						 		$empdata['max_amount']=$this->post('max_amount');
								
								$empdata['installments']=$this->post('installments');
								$empdata['pending_installments']=$this->post('installments');

								$empdata['installment_type']=$this->post('installment_type');

						 		$empdata['loan_type']=$this->post('loan_type');
						 		$empdata['repayment_type']=$this->post('repayment_type');
						 		$empdata['interest_rate']=$this->post('interest_rate');
						 		
						 		$empdata['total_loan']=$this->post('total_loan');
						 		$empdata['unpaid_amount']=$this->post('total_loan');

						 		$empdata['monthly_emi']=$this->post('monthly_emi');



					 		if(API_KEY==$api_key)
					 		{
					 			
					
					 			$status=$this->Common_model->get_entry_by_data('emp_loan_lists',true,array('emp_id' =>$emp_id , 'recoveryStatus'=>'pending'),'recoveryStatus');
					 			if($status)
					 			{
					 				$this->response([
											'status'=>0,
											'message'=>'Loan entry is already exists.'


										],REST_Controller::HTTP_BAD_REQUEST);
					 				
					 			}
					 			else
								{
									$int_record = $this->Common_model->save_entry('emp_loan_lists',$empdata);
									if(!empty($int_record))
									{
										$this->response([
											'status'=>1,
											'message'=>'Loan Application inserted successfully.',
											'data' => $int_record

												],REST_Controller::HTTP_OK);
									}
									else
									{
										$this->response([
											'status'=>0,
											'message'=>'Loan Application insertion failed.',
											'data' => NULL

												],REST_Controller::HTTP_OK);

									}
								}



					 		}
					 		else
					 		{
					 			$this->response([
									'status'=>0,
									'message'=>'API_KEY does not match'


								],REST_Controller::HTTP_BAD_REQUEST);

					 		}
	 	        }
	 			else
				      {
				        $data['status_code'] = -1;
				        $data['response'] = "Failed";
				        $data['message'] = str_replace('</p>','',str_replace('<p>','',validation_errors()));
				        $data['data']['add_loan_applicant_details'] = NULL;
				        $this->response($data,REST_Controller::HTTP_OK);
				      }





	 }
	 

	
 
}