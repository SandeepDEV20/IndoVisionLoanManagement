<?php

defined('BASEPATH') OR exit('No direct script access allowed');    

class LoanAdmin extends CI_Controller 
{
	public function home()
	{
		
		
		 
		$this->load->view('admin_views/home');

	}
	public function admin_Approval_Loan_Lists()
	{
		if(isset($_POST['search']))
		{
				$year=$this->input->post('year');
				$month=$this->input->post('month');
			

					$post_array = [ 'api_key'         => API_KEY,
		                    'year'  => $year,
		                    'month'  => $month
		                    
		                  ];
           
		           $loan_lists = callAPI('POST',base_url('api/Api_admin/search_by_month_year'),$post_array);
		           
		           $result=json_decode($loan_lists);
				//print_r($result); die;
				$this->load->view('admin_views/allEmployeeLoanLists',$result);
		}
		else
		{
		$post_array=[
						 'api_key'     => API_KEY
					];

			    $loan_lists = callAPI('POST',base_url('api/Api_admin/all_emp_loan_lists'),$post_array);
				$result=json_decode($loan_lists);
				//print_r($result); die;
				$this->load->view('admin_views/allEmployeeLoanLists',$result);
		}
	}
	
	public function loan_recovery_status()
	{
		if(isset($_POST['search']))
		{
				$year=$this->input->post('year');
				$month=$this->input->post('month');
			

					$post_array = [ 'api_key'         => API_KEY,
		                    'year'  => $year,
		                    'month'  => $month
		                    
		                  ];
           
		         $loan_lists = callAPI('POST',base_url('api/Api_admin/search_loan_recovery_status_by_month_year'),$post_array);
		           
		           $result=json_decode($loan_lists);
				//print_r($result); die;
				$this->load->view('admin_views/all_emp_loan_status',$result);
		}
		else
		{

		$post_array=[
						 'api_key'     => API_KEY
					];

			    $loan_lists = callAPI('POST',base_url('api/Api_admin/get_all_emp_loan_status'),$post_array);
				$result=json_decode($loan_lists);
				//print_r($result); die;
				$this->load->view('admin_views/all_emp_loan_status',$result);
		}
	}
	

	public function updateEmpLoanLists()
	{
	

		if(isset($_POST['update_loanlists']))
		{

				if(isset($_POST['update']))
				{  
					 
				      $status=$_POST['update_loanlists'];
						    foreach($_POST['update'] as $updateid)
						    {
						    	//echo $updateid; die;
						    	
						    	//$data[$i]=$updateid; 
		                          $post_array = [ 

		                          				'api_key'     => API_KEY,
		                          				'approvalStatus'  => $status,
						                           
						                           'id'  => $updateid
						                           
						                    
						                    
						                  ];
								    	

						$loan_lists = callAPI('POST',base_url('api/Api_admin/updateEmpLoanLists'),$post_array);
								   
 

						    }
						   
					$result=json_decode($loan_lists);
					//print_r($result); die;
					if($result->status == 1)
					{
						    	redirect("LoanAdmin/admin_Approval_Loan_Lists?msg=successfully_updatedStatus");
					}
					else
					{
						redirect("LoanAdmin/admin_Approval_Loan_Lists?msg=update_unsuccess");
					}
				}
				else
				{
					redirect("LoanAdmin/admin_Approval_Loan_Lists?msg=please_check_requests");
				}
						    
				  

		}

			
				
	}

	public function categoryMaster()
	{
		$post_array=[
						 'api_key'     => API_KEY
					];

		$data_category = callAPI('POST',base_url('api/Myapi/LoanCategory'),$post_array);
		$loan_cat=json_decode($data_category);
		//print_r($loan_cat); die;
		
		 $cat['data']=$loan_cat->data->loan_category;
		 $cat['status']=$loan_cat->status_code;
		$this->load->view('admin_views/loanCategory',$cat);

	}


	

	public function addCategoryForm()
	{
		
		
		if($this->input->post('submit_cat'))
		{
			//$this->load->model('api_model');
			//print_r('hello');
			$cat_name=$this->input->post('cat_name');
			//$cat_code=$this->input->post('cat_code');
			

			$post_array = [ 'api_key' => API_KEY,
                    'category'  => $cat_name
                    
                    
                  ];
          // print_r($post_array); die;
              
           $add_user = callAPI('POST',base_url('api/Api_admin/addLoanCategory'),$post_array);
           $result=json_decode($add_user); 

          //print_r($result->status);   
        //  print_r($result);   die;
          
			

		
			if($result)
			{
				
				  redirect("LoanAdmin/categoryMaster?msg=success");
				
				
				
				
			}
			else
			{
	
				redirect("LoanAdmin/categoryMaster?msg=unsuccess");
			}


		}
		else
		{

			$this->load->view('admin_views/addLoanCategory');
	    }
	}
	public  function deleteLoanCategory()
	{
		
				if(isset($_GET['id']))
				{
					$id=$_GET['id'];
					$post_array = [ 
									'api_key' => API_KEY,
									'id'=> $id
								  ];
					//print_r($post_array); die;
					$loan_lists = callAPI('POST',base_url('api/Api_admin/delete_loan_category'),$post_array);
					$result=json_decode($loan_lists);
				    if($result)
					{
				
						  redirect("LoanAdmin/categoryMaster?msg=delete_successful");
				
			        }
							else
							{
					
								redirect("LoanAdmin/categoryMaster?msg=delete_unsuccessful");
							}
				}
				else
				{
					redirect("LoanAdmin/categoryMaster?msg=no_id");	
				}
		
				
		
	}

	public function repaymentType()
	{
		$post_array=[
						 'api_key'     => API_KEY
					];

		$data_repayment = callAPI('POST',base_url('api/Myapi/RepaymentMode'),$post_array);
		$result=json_decode($data_repayment);
		
		
		
		$repay['data']=$result->data->repay_type;
		$repay['status']=$result->status_code;
		//print_r($repay); die;
		$this->load->view('admin_views/repaymentType',$repay);

	}
	public function addRepaymentType()
	{
		

		if($this->input->post('submit_repay'))
		{
			//$this->load->model('api_model');
			//print_r('hello');
			$repay_name=$this->input->post('repay_name');
			
			

			$post_array = [ 'api_key'         => API_KEY,
                    'repay_type'  => $repay_name
                    
                    
                  ];
           //print_r($post_array); die;
                 // print_r(base_url('ci_rest/api/Api_admin/user')); die;
           $add_type = callAPI('POST',base_url('api/Api_admin/addRepaymentType'),$post_array);
           $result=json_decode($add_type); 

          //print_r($result->status);   
          //print_r($result->message);   die;
          
			//$save=$this->api_model->insert_entry($data);

		
			if($result)
			{
				//$dat['success']=$save;
				
						
				 	//echo '<script type="text/javascript">alert("data filled successfully");</script>';
				//$this->load->helper('url');
				  redirect("LoanAdmin/repaymentType?msg=success");
				
				
				
				//$this->index;
				//$this->load->view('show',$dat);
			}
			else
			{
				//$this->load->helper('url');
				redirect("LoanAdmin/repaymentType?msg=unsuccess");
			}


		}
		else
		{

			$this->load->view('admin_views/addRepaymentType');
	    }

	}
	public  function deleteRepaymentType()
	{
		
				if(isset($_GET['id']))
				{
					$id=$_GET['id'];
					$post_array = [ 
									'api_key' => API_KEY,
									'id'=> $id
								  ];
					//print_r($post_array); die;
					$data = callAPI('POST',base_url('api/Api_admin/delete_loan_repayment_type'),$post_array);
					$result=json_decode($data);
				    if($result)
					{
				
						  redirect("LoanAdmin/repaymentType?msg=delete_successful");
				
			        }
							else
							{
					
								redirect("LoanAdmin/repaymentType?msg=delete_unsuccessful");
							}
				}
				else
				{
					redirect("LoanAdmin/repaymentType?msg=no_id");	
				}
		
				
		
	}

	public function loan_criteria()
	{
		$post_array = [ 
									'api_key' => API_KEY,
								
					 ];
		

		$data_amount = callAPI('POST',base_url('api/Api_admin/loan_amount_master'),$post_array);
		$amountMaster=json_decode($data_amount);
		//print_r($amountMaster); die;
		
		 $this->load->view('admin_views/loan_criteria',$amountMaster);

	}
	
	// public function getDepartment()
	// {
	// 	if(isset($_GET['id']))
	// 	{
	// 		$id=$_GET['id'];
	// 	$designation = callAPI('POST',base_url('api/Api_admin/get_designation/'.$id),0);
	// 	$result=json_decode($designation);
		
	// 	//print_r($result); die;
		
	// 	$result['data']=$result;
	// 	$result['desig_id']=$id;
	// 	$this->load->view('admin_views/addLoanCriteria',$result);
	// 	}


	// }

	public function addLoanCriteria()
	{
		if(isset($_POST['submit_criteria']))
		{
			
			$designation=$this->input->post('designation');
			$department=$this->input->post('department');
			$max_amount=$this->input->post('max_amount');
			$interest=$this->input->post('interest');
			$fixed_installments=$this->input->post('fixed_installments');
			$allowed_flexible_installment=$this->input->post('allowed_flexible_installment');

			
			

			$post_array = 
			[       
					'api_key'         => API_KEY,
                    'designation'  => $designation,
                    'department'  => $department,
                    'maxLoanAmount'=>$max_amount,
                    'interest_rate'=> $interest,
                    'fixed_installments'=>$fixed_installments,
                    'allowed_flexible_installment'=>$allowed_flexible_installment
                    
                    
            ];
           //print_r($post_array); die;
           // print_r(base_url('ci_rest/api/Api_admin/user')); die;
           
           $add_criteria = callAPI('POST',base_url('api/Api_admin/addLoanCriteria'),$post_array);
           $result=json_decode($add_criteria); 

           //print_r($result->status);   
           //print_r($result->message);   die;
          
		   //$save=$this->api_model->insert_entry($data);

		
			if($result)
			{
				//$dat['success']=$save;
				
						
				 	//echo '<script type="text/javascript">alert("data filled successfully");</script>';
				//$this->load->helper('url');
				  redirect("LoanAdmin/loan_criteria?msg=success");
				
				
				
				//$this->index;
				//$this->load->view('show',$dat);
			}
			else
			{
				//$this->load->helper('url');
				redirect("LoanAdmin/loan_criteria?msg=unsuccess");
			}


		}
		else
		{
			$post_array = [ 
									'api_key' => API_KEY,
								
					 ];

			$designation = callAPI('POST',base_url('api/Api_admin/get_designation'),$post_array);
		    $result=json_decode($designation);
		
		     //print_r($result); die;
		
		   
		    $this->load->view('admin_views/addLoanCriteria',$result);
	    }
	}

	


	public function delete_emp_loan_criteria()
	{
		
				if(isset($_GET['id']))
				{
					$id=$_GET['id'];
					$post_array = [ 
									'api_key' => API_KEY,
									'id'=> $id
								  ];
					//print_r($post_array); die;
					$data = callAPI('POST',base_url('api/Api_admin/delete_emp_loan_criteria'),$post_array);
					$result=json_decode($data);
				    if($result)
					{
				
						  redirect("LoanAdmin/loan_criteria?msg=delete_successful");
				
			        }
							else
							{
					
								redirect("LoanAdmin/loan_criteria?msg=delete_unsuccessful");
							}
				}
				else
				{
					redirect("LoanAdmin/loan_criteria?msg=no_id");	
				}
	}

	public function update_loan_criteria()
	{
		if(isset($_POST['update_criteria']))
		{
			$id=$this->input->post('id');
			$designation=$this->input->post('designation');
			$department=$this->input->post('department');

			$max_amount=$this->input->post('max_amount');
			$interest=$this->input->post('interest');
			$fixed_installments=$this->input->post('fixed_installments');
			$allowed_flexible_installment=$this->input->post('allowed_flexible_installment');

			
			

			$post_array = [ 'api_key'         => API_KEY,
					'id'=> $id,
                    'designation'  => $designation,
                    'department'=> $department,
                    'maxLoanAmount'=>$max_amount,
                    'interest_rate'=> $interest,
                    'fixed_installments'=>$fixed_installments,
                    'allowed_flexible_installment'=>$allowed_flexible_installment
                    
                    
                  ];
              
          $update= callAPI('POST',base_url('api/Api_admin/updateLoanCriteria'),$post_array);
          $result=json_decode($update);  
        //  print_r($result); die;
		
			if($result)
			{
				
			     	redirect("LoanAdmin/loan_criteria?msg=update_success");
				
			}
			else
			{
				
				redirect("LoanAdmin/loan_criteria?msg=update_unsuccessful");
			}
		}
		
		if(isset($_GET["id"]))
		{
			$id=$_GET["id"];
			$post_array = [ 
									'api_key' => API_KEY,
									'id'=>$id
								
					 ];
			$data_user = callAPI('POST',base_url('api/Api_admin/get_emp_loan_criteria'),$post_array);
			
			$designation = callAPI('POST',base_url('api/Api_admin/get_designation'),$post_array);
		    $desig1=json_decode($designation);
		

          	//print_r($data_user); die;
          	
          	$result['data']=json_decode($data_user); 
          	$result['desig']=$desig1->data;
          	//print_r($result); die;
          	
			$this->load->view('admin_views/update_loan_criteria',$result);
		}
		
	}

	public  function loan_schedule()
	{
		
				if(isset($_GET['loan_id']))
				{
					$id=$_GET['loan_id'];
					$post_array = [ 
									'api_key' => API_KEY,
									'loan_id'=> $id
								  ];
					$loan_lists = callAPI('POST',base_url('api/Myapi/emp_individual_list'),$post_array);
					$result['data']=json_decode($loan_lists);
				    //print_r($result); die;
					$this->load->view('admin_views/loan_schedule',$result);
				}
		
				
		
	}

	public function ff_approval()
	{
		
		 $this->load->view('admin_views/ff_approval');

	
	}



	public function import_data()
	{
		$filename = "loan_data_csv.csv";
		$fp = fopen('php://output', 'w');
		$this->load->model('api_model');

			
			//print_r($result); die;
			
			$result= $this->api_model->get_file_headers();
			
			foreach($result as $row) 
			{
				    $header[]=$row['COLUMN_NAME'];
			}	
			//print_r($header); die;
			header('Content-type: application/csv');
			header('Content-Disposition: attachment; filename='.$filename);

			fputcsv($fp, $header);
			

			$result=$this->api_model->get_file_data();
			foreach($result as $row) 
			{
						fputcsv($fp, $row);
			}

	}
	
}

?>
