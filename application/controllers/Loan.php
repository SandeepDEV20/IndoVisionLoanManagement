<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loan extends CI_Controller 
{

	
	public function login()
	{
		session_start();
   		if(isset($_SESSION["myloginsession"]))
	     {

			redirect("Loan/home?msg=login");
	     }

		
		elseif(isset($_POST['login']))
		{
			
			
			$email=$this->input->post('email');
			$password=$this->input->post('password');
			$post_array=[
								'api_key'=>API_KEY,
								'email'=>$email,
								'password'=>$password
						];
			$data_user = callAPI('POST',base_url('api/Myapi/user_verify'),$post_array);
			$emp_detail=json_decode($data_user);

			$status=$emp_detail->status;
			//print_r($status); die;
				if($status)
				{
						session_start();
						
						$_SESSION["myloginsession"]=$emp_detail->data->emp_id;
						$_SESSION["session_user"]=$emp_detail->data->name;

	        			redirect("Loan/home?msg=login_success");
				}
				else
				{
				  		redirect("Loan/login?msg=unsuccess");
				}
						
	   }
	     
		else
		
		{
		       
				$this->load->view('login1');
		}

	}

	public function home()
	{
		 session_start();
		 if(isset($_SESSION["myloginsession"]) && isset($_SESSION["session_user"]))
	     {
	     	

					$this->load->view('home');
		 }
		else
		{
			redirect("Loan/login");
		}
	}

	public function loan_apply()
	{
		 session_start();
		 if(isset($_SESSION["myloginsession"]) && isset($_SESSION["session_user"]))
	     {
		
			$id=$_SESSION["myloginsession"];

			$post_array=[
								'api_key'=>API_KEY,
								'emp_id'=>$id,
						];
			
			$add_user = callAPI('POST',base_url('api/Myapi/loanStatus'),$post_array);
			$result=json_decode($add_user);
			
			$data_user = callAPI('POST',base_url('api/Myapi/emp_details'),$post_array);
			$emp=json_decode($data_user);

			$data_category = callAPI('POST',base_url('api/Myapi/LoanCategory'),$post_array);
			$loan_cat=json_decode($data_category);
			
			 
			 $data['status']= $result->status;
			 $data['date']= $emp->dateofjoin;
			 $data['category']=$loan_cat->data->loan_category;
			//print_r($data); die;
			 $this->load->view('loan_mgmt_page',$data); 
		}
		else
		{
			 redirect("Loan/login");
		}
		

	}
	
	public  function Loan_Application_form()
	{

		session_start();
		if(isset($_SESSION["myloginsession"]) && isset($_SESSION["session_user"]))
	    {
		if($this->input->post('submit'))
		{
		
			//$this->load->model('api_model');
			//print_r('hello');
			$id=$this->input->post('id');
			$department=$this->input->post('department');
			$date=$this->input->post('applydate');
			$amount=$this->input->post('loanAmount');
			$max_amount=$this->input->post('max');
			$loan_type=$this->input->post('loanType');
			$installment_type=$this->input->post('installment_type');
			$installments=$this->input->post('installment');
			$interest=$this->input->post('interest');
			$total_loan=$this->input->post('total_loan');
			$monthly_emi=$this->input->post('monthly_emi');
			

			$repay_type=$this->input->post('repay');



			$post_array = [ 'api_key'         => API_KEY,
                    'emp_id'=> $id,
                    'department'=>$department,
                    'appliedDate'  =>$date,
                    'amount' =>$amount,
                    'max_amount'=>$max_amount,
                    'loan_type'=>$loan_type,
                    'repayment_type'=>$repay_type,
                    'installments'=>$installments,
                    'installment_type'=>$installment_type,
                    'interest_rate'=>$interest,
                    'total_loan'=>$total_loan,
                    'monthly_emi'=>$monthly_emi
                  ];
           //print_r($post_array); die;
                 
          				$add_user = callAPI('POST',base_url('api/Myapi/add_loan_applicant'),$post_array);
         				$result=json_decode($add_user); 
         				//print_r($result); die;
         				//$data['status']= $result->status;
         				if( $result->status == 1)
         				{
         					$entry['data']=$result->data;
         					//$id=$result->data[0]->loan_id;
         					//print_r($entry); die;
         					//redirect("Loan/Loan_Application_form?msg=applied s", 'refresh'); 
         					$this->load->view('loan_submit_view',$entry);
         					//redirect('Loan/loan_application_submit_view?id="success_applied"/'.$id);
         				}
         				else
         				{
                              redirect("Loan/loan_apply?msg=already_applied");
         				}

         				

      			       

      	}



		elseif(isset($_POST['apply']))
		{
			// //$category=$this->input->post('category');
			// redirect('Loan/loan_apply_form?msg=fill_application_form');
			
			
				    $id=$_SESSION["myloginsession"];
					
					
					$post_array=[
										'api_key'=>API_KEY,
										'emp_id'=>$id,
								];
					
					$repayment = callAPI('POST',base_url('api/Myapi/RepaymentMode'),$post_array);
					$repay=json_decode($repayment);
					$amount = callAPI('POST',base_url('api/Myapi/maxLoanAmount'),$post_array);
					//print_r($amount); die;
					$maxAmount=json_decode($amount);
				   
				     //print_r($maxAmount); die;
					
					$data['cat']=$this->input->post('category');
					
					$data['repay']=$repay->data->repay_type;
					$data['user']=$maxAmount;

					
				    //unset($_POST['apply']);
					//print_r($data); die;
					$this->load->view('applicationForm',$data);
				
				
					
			
		}
		else
		{
			 redirect("Loan/loan_apply",'refresh');
		}
				
	
	}
	else
		{
			 redirect("Loan/login");
		}
	}

	
	public  function loan_lists()
	{
		session_start();
		if(isset($_SESSION["myloginsession"]) && isset($_SESSION["session_user"]))
	    {
				$id=$_SESSION["myloginsession"];
				$post_array=[
								'api_key'=>API_KEY,
								'emp_id'=>$id,
						];
				$loan_lists = callAPI('POST',base_url('api/Myapi/emp_loan_lists'),$post_array);
				$result=json_decode($loan_lists);
				//print_r($result); die;
				$this->load->view('employeeLoanLists',$result);
		}
		else
		{
			 redirect("Loan/login");
		}
		
	}
	
	public  function loan_schedule()
	{
		session_start();
		if(isset($_SESSION["myloginsession"]) && isset($_SESSION["session_user"]))
	    {
				if(isset($_GET['loan_id']))
				{
					$id=$_GET['loan_id'];
					$post_array=[
								'api_key'=>API_KEY,
								'loan_id'=>$id,
						];
					$loan_lists = callAPI('POST',base_url('api/Myapi/emp_individual_list'),$post_array);
					$result['data']=json_decode($loan_lists);
				  //print_r($result); die;
					$this->load->view('loan_schedule',$result);
				}
		}
		else
		{
			 redirect("Loan/login");
		}
		
	}
	public function loan_recovery_status()
	{
		session_start();
		if(isset($_SESSION["myloginsession"]) && isset($_SESSION["session_user"]))
	    {
				if(isset($_GET['loan_id']))
				{
							$id=$_GET['loan_id'];
							$post_array=[
										'api_key'=>API_KEY,
										'loan_id'=>$id,
								];

			    $loan_lists = callAPI('POST',base_url('api/Myapi/get_emp_loan_recovery_status'),$post_array);
				$result['data']=json_decode($loan_lists);
				//print_r($result); die;
				$this->load->view('emp_loan_recovery_status',$result);
				}
		}
		else
		{
			 redirect("Loan/login");
		}

	}



	public function logout()
	{


				session_start();

				unset($_SESSION["myloginsession"]);
				session_destroy();
				
				redirect("Loan/login?msg=log_out");



	}

}

?>
