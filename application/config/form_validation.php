<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$config = array(

    
    
    'api_add_loan_applicant' => array(
        array(
            'field' => 'emp_id',
            'label' => 'Emp ID',
            'rules' => 'required'
        ),
        array(
            'field' => 'department',
            'label' => 'department',
            'rules' => 'required'
        ),
        array(
            'field' => 'appliedDate',
            'label' => 'Applied Date',
            'rules' => 'required'
        ),
        array(
            'field' => 'amount',
            'label' => 'amount',
            'rules' => 'required'
        ),
        array(
            'field' => 'max_amount',
            'label' => 'max_amount',
            'rules' => 'required'
        ),
        array(
            'field' => 'installments',
            'label' => 'installments',
            'rules' => 'required'
        ),
        array(
            'field' => 'api_key',
            'label' => 'API Key',
            'rules' => 'required|trim'
        ),
        array(
            'field' => 'installment_type',
            'label' => 'installment_type',
            'rules' => 'required'
        ),
        array(
            'field' => 'repayment_type',
            'label' => 'repayment_type',
            'rules' => 'required'
        ),
        array(
            'field' => 'interest_rate',
            'label' => 'interest_rate',
            'rules' => 'required'
        ),
        array(
            'field' => 'loan_type',
            'label' => 'loan_type',
            'rules' => 'required'
        ),
        array(
            'field' => 'total_loan',
            'label' => 'total_loan',
            'rules' => 'required'
        ),
        array(
            'field' => 'monthly_emi',
            'label' => 'monthly_emi',
            'rules' => 'required'
        ),
        
    ),
    
   'api_loan_application_update'=>array(
        array(

            'field' => 'id',

            'label' => 'id',

            'rules' => 'required'

        ),
        array(

            'field' => 'approvalStatus',

            'label' => 'approvalStatus',

            'rules' => 'required|in_list[approved,rejected]'

        ),
         array(
            'field' => 'api_key',
            'label' => 'API Key',
            'rules' => 'required'
        ),




   ),

   'api_super_admin_loan_application_update'=>array(




   ),

   

    'api_loanstatus' => array(
          array(

            'field' => 'emp_id',

            'label' => 'emp_id',

            'rules' => 'required'

        ),
         array(
            'field' => 'api_key',
            'label' => 'API Key',
            'rules' => 'required'
        ),

    ),
    'api_emp_details' => array(
          array(

            'field' => 'emp_id',

            'label' => 'emp_id',

            'rules' => 'required'

        ),
         array(
            'field' => 'api_key',
            'label' => 'API Key',
            'rules' => 'required'
        ),

    ),

    'api_get_emp_loan_recovery_status'=>array(
        array(

            'field' => 'loan_id',

            'label' => 'loan_id',

            'rules' => 'required'

        ),
         array(
            'field' => 'api_key',
            'label' => 'API Key',
            'rules' => 'required'
        ),


    ),

     'api_emp_loan_lists'=> array(

            array(

            'field' => 'emp_id',

            'label' => 'emp_id',

            'rules' => 'required'

        ),
         array(
            'field' => 'api_key',
            'label' => 'API Key',
            'rules' => 'required'
        ),



     ),
     'api_emp_individual_loan_list'=> array(

            array(

            'field' => 'loan_id',

            'label' => 'loan_id',

            'rules' => 'required'

        ),
         array(
            'field' => 'api_key',
            'label' => 'API Key',
            'rules' => 'required'
        ),



     ),
     
     'api_emp_and_max_amount_details'=>array(
             array(

            'field' => 'emp_id',

            'label' => 'emp_id',

            'rules' => 'required'

        ),
         array(
            'field' => 'api_key',
            'label' => 'API Key',
            'rules' => 'required'
        ),


     ),


    /* ======== Send Notification ==== */

    'api_send_email' => array(



    ),



    /* ========= Login ======== */

    'api_login' => array(

        array(

            'field' => 'email',

            'label' => 'Email',

            'rules' => 'required'

        ),

        array(

            'field' => 'password',

            'label' => 'Password',

            'rules' => 'required'

        ),
         array(
            'field' => 'api_key',
            'label' => 'API Key',
            'rules' => 'required'
        ),

    ),

    'api_search_by_month_year'=>array(
        array(

            'field' => 'year',

            'label' => 'year',

            'rules' => 'required'

        ),
        array(

            'field' => 'month',

            'label' => 'month',

            'rules' => 'required'

        ),
         array(
            'field' => 'api_key',
            'label' => 'API Key',
            'rules' => 'required|trim'
        ),





    ),
    'api_add_loan_category'=>array(
            array(

            'field' => 'category',

            'label' => 'category',

            'rules' => 'required'

        ),
         array(
            'field' => 'api_key',
            'label' => 'API Key',
            'rules' => 'required|trim'
        ),

    ),
    'api_delete_loan_category'=>array(
         array(

            'field' => 'id',

            'label' => 'id',

            'rules' => 'required'

        ),
         array(
            'field' => 'api_key',
            'label' => 'API Key',
            'rules' => 'required|trim'
        ),


    ),

    'api_add_repayment_type'=> array(

        array(

            'field' => 'repay_type',

            'label' => 'repay_type',

            'rules' => 'required'

        ),
         array(
            'field' => 'api_key',
            'label' => 'API Key',
            'rules' => 'required|trim'
        ),


    ),
    'api_delete_loan_repay_type'=>array(
         array(

            'field' => 'id',

            'label' => 'id',

            'rules' => 'required'

        ),
         array(
            'field' => 'api_key',
            'label' => 'API Key',
            'rules' => 'required|trim'
        ),


    ),
    'api_get_emp_loan_criteria'=>array(

         array(

            'field' => 'id',

            'label' => 'id',

            'rules' => 'required'

        ),
         array(
            'field' => 'api_key',
            'label' => 'API Key',
            'rules' => 'required|trim'
        ),


    ),

    'api_add_loan_criteria'=>array(
        array(
            'field' => 'api_key',
            'label' => 'API Key',
            'rules' => 'required|trim'
        ),
        array(
            'field' => 'designation',
            'label' => 'designation',
            'rules' => 'required'
        ),
        array(
            'field' => 'department',
            'label' => 'department',
            'rules' => 'required'
        ),
        array(
            'field' => 'maxLoanAmount',
            'label' => 'maxLoanAmount',
            'rules' => 'required'
        ),
        array(
            'field' => 'interest_rate',
            'label' => 'interest_rate',
            'rules' => 'required'
        ),
        array(
            'field' => 'fixed_installments',
            'label' => 'fixed_installments',
            'rules' => 'required'
        ),
        array(
            'field' => 'allowed_flexible_installment',
            'label' => 'allowed_flexible_installment',
            'rules' => 'required|in_list[yes,no]'
        ),



    ),
    'api_update_loan_criteria'=>array(
        array(
            'field' => 'api_key',
            'label' => 'API Key',
            'rules' => 'required|trim'
        ),
        array(
            'field' => 'id',
            'label' => 'id',
            'rules' => 'required|trim'
        ),
        array(
            'field' => 'designation',
            'label' => 'designation',
            'rules' => 'required'
        ),
        array(
            'field' => 'department',
            'label' => 'department',
            'rules' => 'required'
        ),
        array(
            'field' => 'maxLoanAmount',
            'label' => 'maxLoanAmount',
            'rules' => 'required'
        ),
        array(
            'field' => 'interest_rate',
            'label' => 'interest_rate',
            'rules' => 'required'
        ),
        array(
            'field' => 'fixed_installments',
            'label' => 'fixed_installments',
            'rules' => 'required'
        ),
        array(
            'field' => 'allowed_flexible_installment',
            'label' => 'allowed_flexible_installment',
            'rules' => 'required'
        ),



    ),
    'api_delete_emp_loan_criteria'=>array(

        array(

            'field' => 'id',

            'label' => 'id',

            'rules' => 'required'

        ),
         array(
            'field' => 'api_key',
            'label' => 'API Key',
            'rules' => 'required|trim'
        ),




    ),

    

);