<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

//use chriskacerguis\RestServer\RestController;

class Api_admin extends REST_Controller
{
     public function __construct()
     {
     	parent::__construct();
     	$this->load->model('Common_model');
     }
       
       
	public function all_emp_loan_lists_post()
	{
		
           $api_key=trim($this->input->post('api_key'));
           
           if(API_KEY == $api_key)
           {
		           $r = $this->Common_model->get_all_entries('emp_loan_lists',array('sort'=>'id', 'sort_type'=>   'desc'));

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
		           			'message'=>'Key does not match.'


		           		],REST_Controller::HTTP_NOT_FOUND);
		    }
		
		
     		
           
	}
	public function get_all_emp_loan_status_post()
	{
		
           $api_key=trim($this->input->post('api_key'));
           
           if(API_KEY == $api_key)
           {
		       $r = $this->Common_model->get_entry_by_data('emp_loan_lists',false,array('approvalStatus' =>       'approved'),'*','desc','id');

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
		           			'message'=>'Key does not match.'


		           		],REST_Controller::HTTP_NOT_FOUND);
		    }
		
		
     		
           
	}
	
	public function search_by_month_year_post()
	{
			if($this->form_validation->run('api_search_by_month_year') == TRUE )
			{
      				$this->db->trans_start();
					$api_key=trim($this->input->post('api_key'));
					$year=$this->post('year');
					$month=$this->post('month');
			
			
					if(API_KEY == $api_key)
		           {
		           
		           	$r = $this->Common_model->get_entry_by_data('emp_loan_lists',false,array('MONTH(appliedDate)' =>$month , 'YEAR(appliedDate)'=>$year),'*','desc','id');
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
			           			'message'=>'No record were found.'


			           		],REST_Controller::HTTP_NOT_FOUND);
			           }
					}
						else
						{
						           		$this->response([
						           			'status'=>0,
						           			'message'=>'invalid key.'


						           		],REST_Controller::HTTP_NOT_FOUND);
						 }
			}
			  else
		      {
		        $data['status_code'] = -1;
		        $data['response'] = "Failed";
		        $data['message'] = str_replace('</p>','',str_replace('<p>','',validation_errors()));
		        $data['data']['search_by_month_year'] = NULL;
		        $this->response($data,REST_Controller::HTTP_OK);
		      }


	}

	public function search_loan_recovery_status_by_month_year_post()
	{
			if($this->form_validation->run('api_search_by_month_year') == TRUE )
			{
      				$this->db->trans_start();
					$api_key=trim($this->input->post('api_key'));
					$year=$this->post('year');
					$month=$this->post('month');
			
			
					if(API_KEY == $api_key)
		           {
		           
		           	$r = $this->Common_model->get_entry_by_data('emp_loan_lists',false,array('MONTH(appliedDate)' =>$month , 'YEAR(appliedDate)'=>$year,'approvalStatus'=>'approved'),'*','desc','id');
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
			           			'message'=>'No record were found.'


			           		],REST_Controller::HTTP_NOT_FOUND);
			           }
					}
						else
						{
						           		$this->response([
						           			'status'=>0,
						           			'message'=>'invalid key.'


						           		],REST_Controller::HTTP_NOT_FOUND);
						 }
			}
			  else
		      {
		        $data['status_code'] = -1;
		        $data['response'] = "Failed";
		        $data['message'] = str_replace('</p>','',str_replace('<p>','',validation_errors()));
		        $data['data']['search_by_month_year'] = NULL;
		        $this->response($data,REST_Controller::HTTP_OK);
		      }


	}
	

	public function updateEmpLoanLists_post()
	{
		if($this->form_validation->run('api_loan_application_update') == TRUE )
		{
			$api_key=trim($this->input->post('api_key'));
			$id=$this->post('id');
			$data['approvalStatus']=$this->post('approvalStatus');
           
		           if(API_KEY == $api_key)
		           {
							
						
								if($data['approvalStatus'] == "approved")
								{
										//$update=$this->api_model_admin->tl_update_lists($id,$status);
										$update=$this->Common_model->update_entry('emp_loan_lists',$data,$id);
											if($update)
							 				{
							 				
							 				$this->response([
											'status'=> 1,
											'message'=>'Loan Application updated successfully.'


												],REST_Controller::HTTP_OK);
							 				}
							 				else
							 				{
							 					$this->response([
											    'status'=> 0,
											     'message'=>'Id not exists Loan Application Updation unsuccessfull'


												],REST_Controller::HTTP_OK);
							 				}
								
				 					}
					 				elseif($data['approvalStatus'] == "rejected")
					 				{
					 					$data['recoveryStatus'] = '';

					 					$update=$this->Common_model->update_entry('emp_loan_lists',$data,$id);
											if($update)
							 				{
							 				
								 				$this->response([
												'status'=> 1,
												'message'=>'Loan Application updated successfully.'


													],REST_Controller::HTTP_OK);
							 				}
							 				else
							 				{
							 					$this->response([
											    'status'=> 0,
											     'message'=>'Id not exists Loan Application Updation unsuccessfull'


												],REST_Controller::HTTP_OK);
							 				}
					 				}
					 		}
					 		else
					 		{
					 			$this->response([
												    'status'=>0,
												     'message'=>'key does not match',


													],REST_Controller::HTTP_NOT_FOUND);
					 		}
	 	        }
	 	else
		  {
		        $data['status_code'] = -1;
		        $data['response'] = "Failed";
		        $data['message'] = str_replace('</p>','',str_replace('<p>','',validation_errors()));
		        $data['data']['update_loan_application_status'] = NULL;
		        $this->response($data,REST_Controller::HTTP_OK);
		  }	   
	 			
	 				
	 			

	}


	public function tl_update_post()
	{
					   //$updateList=array();
		if($this->form_validation->run('api_loan_application_update') == TRUE )
		{
						$api_key=trim($this->input->post('api_key'));
						$id=$this->post('id');
						$data['TL_approval']=$this->post('approvalStatus');
			           
			           if(API_KEY == $api_key)
			           {
									if($data['TL_approval'] == "approved")
									{
										//$update=$this->api_model_admin->tl_update_lists($id,$status);
										$update=$this->Common_model->update_entry('emp_loan_lists',$data,$id);
											if($update)
							 				{
							 				
							 				$this->response([
											'status'=> 1,
											'message'=>'Loan Application updated successfully.'


												],REST_Controller::HTTP_OK);
							 				}
							 				else
							 				{
							 					$this->response([
											    'status'=> 0,
											     'message'=>'Id not exists Loan Application Updation unsuccessfull'


												],REST_Controller::HTTP_OK);
							 				}
								
				 					}
					 				elseif($data['TL_approval'] == "rejected")
					 				{
					 					$data['approvalStatus'] = "rejected";
					 					$data['recoveryStatus'] = '';

					 					$update=$this->Common_model->update_entry('emp_loan_lists',$data,$id);
											if($update)
							 				{
							 				
								 				$this->response([
												'status'=> 1,
												'message'=>'Loan Application updated successfully.'


													],REST_Controller::HTTP_OK);
							 				}
							 				else
							 				{
							 					$this->response([
											    'status'=> 0,
											     'message'=>'Id not exists Loan Application Updation unsuccessfull'


												],REST_Controller::HTTP_OK);
							 				}
					 				}
				 	}
				 			else
				 			{
				 					$this->response([
											    'status'=>0,
											     'message'=>'Api key does not match',


												],REST_Controller::HTTP_NOT_FOUND);
				 			}
				 			   
		}
		else
		  {
		        $data['status_code'] = -1;
		        $data['response'] = "Failed";
		        $data['message'] = str_replace('</p>','',str_replace('<p>','',validation_errors()));
		        $data['data']['update_loan_application_status'] = NULL;
		        $this->response($data,REST_Controller::HTTP_OK);
		  }

	 				
	 			

	}


	
	public function addLoanCategory_post()
	{
		if($this->form_validation->run('api_add_loan_category') == TRUE )
		{

		    $api_key=trim($this->post('api_key'));
			$data=array();
	 		$data['category']=$this->post('category');
	 		// $data['code']=$this->post('code');
	 		
	 		if(API_KEY==$api_key)
	 		{
	 			$insert=$this->Common_model->save_entry('loan_category',$data);
	 			if($insert)
	 			{
	 				$this->response([
					'status'=>TRUE,
					'message'=>'category inserted successfully.',
					 $data['data']['add_category_detail'] = $insert

						],REST_Controller::HTTP_OK);
	 			}
	 			else
				{
						$this->response([
							'status'=>0,
							'message'=>'failed',
							$data['data']['add_category_detail'] = NULl

						],REST_Controller::HTTP_OK);
				}



	 		}
	 		else
	 		{
	 			$this->response([
					'status'=>FALSE,
					'message'=>'Api key does not match'


				],REST_Controller::HTTP_BAD_REQUEST);

	 		}
	 	}
	 	else
		      {
		        $data['status_code'] = -1;
		        $data['response'] = "Failed";
		        $data['message'] = str_replace('</p>','',str_replace('<p>','',validation_errors()));
		        $data['data']['add_loan_category'] = NULL;
		        $this->response($data,REST_Controller::HTTP_OK);
		      }
	 		
	}
	public function delete_loan_category_post()
	{
		if($this->form_validation->run('api_delete_loan_category') == TRUE )
		{

		    $api_key=trim($this->post('api_key'));
			
	 		$id=$this->post('id');
	 		
	 		if(API_KEY==$api_key)
	 		{
	 			$insert=$this->Common_model->DeleteWhere('loan_category',array('id'=>$id));
	 			if($insert>0)
	 			{
	 				$this->response([
					'status'=>TRUE,
					'message'=>'category Deleted successfully.'

						],REST_Controller::HTTP_OK);
	 			}
	 			else
				{
						$this->response([
							'status'=>0,
							'message'=>'not deleted',
							$data['data']['delete_category_detail'] = NULl

						],REST_Controller::HTTP_OK);
				}



	 		}
	 		else
	 		{
	 			$this->response([
					'status'=>FALSE,
					'message'=>'Api key does not match'


				],REST_Controller::HTTP_BAD_REQUEST);

	 		}
	 	}
	 	else
		      {
		        $data['status_code'] = -1;
		        $data['response'] = "Failed";
		        $data['message'] = str_replace('</p>','',str_replace('<p>','',validation_errors()));
		        $data['data']['delete_loan_category'] = NULL;
		        $this->response($data,REST_Controller::HTTP_OK);
		      }



	}


	
	public function addRepaymentType_post()
	{
		if($this->form_validation->run('api_add_repayment_type') == TRUE )
		{

		    $api_key=trim($this->post('api_key'));
			$data=array();
	 		$data['repay_type']=$this->post('repay_type');

	 		if(API_KEY==$api_key)
	 		{
	 			$insert=$this->Common_model->save_entry('repayment_type',$data);
	 			if($insert)
	 			{
	 				$this->response([
					'status'=>TRUE,
					'message'=>'category inserted successfully.',
					$data['data']['add_category_detail'] = $insert

						],REST_Controller::HTTP_OK);
	 			}
	 			else
				{
						$this->response("some problems occcured,try again.",REST_Controller::HTTP_BAD_REQUEST);
				}



	 		}
	 		else
	 		{
	 			$this->response([
					'status'=>FALSE,
					'message'=>'Api key does not match'


				],REST_Controller::HTTP_BAD_REQUEST);

	 		}
	 	}
	 		else
		      {
		        $data['status_code'] = -1;
		        $data['response'] = "Failed";
		        $data['message'] = str_replace('</p>','',str_replace('<p>','',validation_errors()));
		        $data['data']['add_loan_category'] = NULL;
		        $this->response($data,REST_Controller::HTTP_OK);
		      }
	 		
	}

	public function delete_loan_repayment_type_post()
	{
		if($this->form_validation->run('api_delete_loan_repay_type') == TRUE )
		{

		    $api_key=trim($this->post('api_key'));
			
	 		$id=$this->post('id');
	 		
	 		if(API_KEY==$api_key)
	 		{
	 			$insert=$this->Common_model->DeleteWhere('repayment_type',array('id'=>$id));
	 			if($insert>0)
	 			{
	 				$this->response([
					'status'=>TRUE,
					'message'=>'category Deleted successfully.'

						],REST_Controller::HTTP_OK);
	 			}
	 			else
				{
						$this->response([
							'status'=>0,
							'message'=>'not deleted',
							$data['data']['delete_repaymentType_detail'] = NULl

						],REST_Controller::HTTP_OK);
				}



	 		}
	 		else
	 		{
	 			$this->response([
					'status'=>FALSE,
					'message'=>'Api key does not match'


				],REST_Controller::HTTP_BAD_REQUEST);

	 		}
	 	}
	 	else
		      {
		        $data['status_code'] = -1;
		        $data['response'] = "Failed";
		        $data['message'] = str_replace('</p>','',str_replace('<p>','',validation_errors()));
		        $data['data']['delete_loan_repayment_type_detail'] = NULL;
		        $this->response($data,REST_Controller::HTTP_OK);
		      }



	}

	
	public function loan_amount_master_post()
	{
		    $api_key=trim($this->post('api_key'));
	 		
	 		if(API_KEY==$api_key)
	 		{
					$r = $this->Common_model->get_all_entries('loan_amount_master');
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

					          $data['status_code'] = 0;
					          $data['response']    = "Success";
					          $data['message']     = 'no record found';
					          $data['data']['designatioon_wise_loan_amount_master_detail'] = NULL;
					          $this->response($data,REST_Controller::HTTP_OK);

					    }
			}
				      
				      else 
				      {
				          $data['status_code'] = -1;
				          $data['response']    = "Failed";
				          $data['message']     = 'API key does not matched.';
				           $data['data']['designatioon_wise_loan_amount_master_detail'] = NULL;
				          $this->response($data,REST_Controller::HTTP_OK);
				      }
	}

	

	public function get_designation_post()
	{
		$api_key=trim($this->post('api_key'));
	 		
	 		if(API_KEY==$api_key)
	 		{

						$r = $this->Common_model->get_all_entries('designation_master');
						if(!empty($r))
				           {
				           		$this->response([
				           			'status'=>'yes',
				           			'message'=>count($r).' records found ',
				           			'data' => $r
				           			], REST_Controller::HTTP_OK);
				           		

				           }
				           else
			           {

					          $data['status_code'] = 0;
					          $data['response']    = "Success";
					          $data['message']     = 'no record found';
					          $data['data']['designation_master_details'] = NULL;
					          $this->response($data,REST_Controller::HTTP_OK);

					    }
			}
				      
				      else 
				      {
				          $data['status_code'] = -1;
				          $data['response']    = "Failed";
				          $data['message']     = 'API key does not matched.';
				           $data['data']['designation_master_detail'] = NULL;
				          $this->response($data,REST_Controller::HTTP_OK);
				      }

	}
	 public function get_emp_loan_criteria_post()
	 {
	 		if($this->form_validation->run('api_get_emp_loan_criteria') == TRUE )
		     {
		     	  $this->db->trans_start();
		          $api_key=trim($this->post('api_key'));
		          $id=$this->post('id');
          		
          		 	if(API_KEY==$api_key)
			         {
           
					    $r = $this->Common_model->get_entry_by_data('loan_amount_master',true,array('id'=>$id));

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
		        $data['data']['get_emp_loan_criteria_detail'] = NULL;
		        $this->response($data,REST_Controller::HTTP_OK);
		      }
	 }

	public function addLoanCriteria_post()
	{
		if($this->form_validation->run('api_add_loan_criteria') == TRUE )
		{

		    $api_key=trim($this->post('api_key'));
			$data=array();
	 		$data['designation']=$this->post('designation');
	 		$data['department']=$this->post('department');

	 		$data['maxLoanAmount']=$this->post('maxLoanAmount');
	 		$data['interest_rate']=$this->post('interest_rate');
	 		$data['fixed_installments']=$this->post('fixed_installments');
	 		$data['allowed_flexible_installment']=$this->post('allowed_flexible_installment');
	 		
	 		
	 		if(API_KEY==$api_key)
	 		{
	 			$insert=$this->Common_model->save_entry('loan_amount_master',$data);
	 			if($insert)
	 			{
	 				$this->response([
					'status'=>TRUE,
					'message'=>'criteria inserted successfully.',
					$data['data']['add_loan_criteria_detail'] = $insert

						],REST_Controller::HTTP_OK);
	 			}
	 			else
				{
						$this->response("some problems occcured,try again.",REST_Controller::HTTP_BAD_REQUEST);
				}



	 		}
	 		else
	 		{
	 			$this->response([
					'status'=>FALSE,
					'message'=>'Api key doe no match'


				],REST_Controller::HTTP_BAD_REQUEST);

	 		}
	 	}
	 	else
		      {
		        $data['status_code'] = -1;
		        $data['response'] = "Failed";
		        $data['message'] = str_replace('</p>','',str_replace('<p>','',validation_errors()));
		        $data['data']['add_loan_criteria_detail'] = NULL;
		        $this->response($data,REST_Controller::HTTP_OK);
		      }

	 		

	}
	

	 
	 

	 public function updateLoanCriteria_post()
	 {

	 		if($this->form_validation->run('api_update_loan_criteria') == TRUE )
	        {

					    $api_key=trim($this->post('api_key'));
				 		$data=array();
				 		$id=$this->post('id');
				 	
				 		$data['designation']=$this->post('designation');
				 		$data['department']=$this->post('department');
				 		$data['maxLoanAmount']=$this->post('maxLoanAmount');
				 		$data['interest_rate']=$this->post('interest_rate');
				 		$data['fixed_installments']=$this->post('fixed_installments');
				 		$data['allowed_flexible_installment']=$this->post('allowed_flexible_installment');
				 		
				 		if($api_key == API_KEY)
				 		{
				 		$insert=$this->Common_model->update_entry('loan_amount_master',$data,$id);
				 			if($insert>0)
				 			{
				 				$this->response([
								'status'=>1,
								'message'=>'criteria updated successfully.'


									],REST_Controller::HTTP_OK);
				 			}
				 			else
							{
									$this->response([
								'status'=>0,
								'message'=>'criteria not updated successfully.'


									],REST_Controller::HTTP_OK);
							}



				 		}
				 		else
				 		{
				 			$this->response([
								'status'=>FALSE,
								'message'=>'Api key does not match'


							],REST_Controller::HTTP_BAD_REQUEST);

				 		}
			}
			else
		      {
		        $data['status_code'] = -1;
		        $data['response'] = "Failed";
		        $data['message'] = str_replace('</p>','',str_replace('<p>','',validation_errors()));
		        $data['data']['update_loan_criteria_detail'] = NULL;
		        $this->response($data,REST_Controller::HTTP_OK);
		      }
	 		


	 }
	
	public function delete_emp_loan_criteria_post()
	{
		if($this->form_validation->run('api_delete_emp_loan_criteria') == TRUE )
		{

		    $api_key=trim($this->post('api_key'));
			
	 		$id=$this->post('id');
	 		
	 		if(API_KEY==$api_key)
	 		{
	 			$insert=$this->Common_model->DeleteWhere('loan_amount_master',array('id'=>$id));
	 			if($insert>0)
	 			{
	 				$this->response([
					'status'=>TRUE,
					'message'=>'criteria Deleted successfully.'

						],REST_Controller::HTTP_OK);
	 			}
	 			else
				{
						$this->response([
							'status'=>0,
							'message'=>'not deleted',
							$data['data']['delete_emp_loan_criteria_detail'] = NULl

						],REST_Controller::HTTP_OK);
				}



	 		}
	 		else
	 		{
	 			$this->response([
					'status'=>FALSE,
					'message'=>'Api key does not match'


				],REST_Controller::HTTP_BAD_REQUEST);

	 		}
	 	}
	 	else
		      {
		        $data['status_code'] = -1;
		        $data['response'] = "Failed";
		        $data['message'] = str_replace('</p>','',str_replace('<p>','',validation_errors()));
		        $data['data']['delete_emp_loan_criteria_detail'] = NULL;
		        $this->response($data,REST_Controller::HTTP_OK);
		      }

		
	}
 
}