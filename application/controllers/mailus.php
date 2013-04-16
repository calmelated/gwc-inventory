<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mailus extends CI_Controller {

    var $our_company = 'ACLOR INC.';
    var $admin_mail  = 'admin@aclor.com';

    public function __construct() {
        parent::__construct();

        // Captcha parameters:
        $captchaConfig = array(
          'CaptchaId' => 'FormCaptcha', // a unique Id for the Captcha instance
          'UserInputId' => 'CaptchaCode' // Id of the Captcha code input textbox
        );

        // load the BotDetect Captcha library
        $this->load->library('BotDetect/BotDetectCaptcha', $captchaConfig);
    }

    public function index() {
        $data['title'] = 'mailus';
        $data['mail_status'] = 'success';

        $this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[4]|max_length[47]|xss_clean');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|xss_clean');
        $this->form_validation->set_rules('company', 'Company', 'trim|max_length[47]|xss_clean');
        $this->form_validation->set_rules('subject', 'Subject', 'trim|required|min_length[4]|max_length[47]|xss_clean');
        $this->form_validation->set_rules('comments', 'Comment', 'trim|required|min_length[10]|max_length[1024]|xss_clean');
        $this->form_validation->set_rules('captcha', 'Captcha', 'callback_captcha_validate');

        $this->load->view('header', $data);
        if ($this->form_validation->run() == false) {
            // the Captcha is not shown if the user already solved it but validation of
            // other form fields failed
            if (!$this->botdetectcaptcha->IsSolved) {
                $data['captchaSolved'] = false;
                $data['captchaHtml'] = $this->botdetectcaptcha->Html();
            } else {
                $data['captchaSolved'] = true;
                $data['captchaHtml'] = '';
            }

            $this->load->view('contact_us', $data);
        } else {
            //$this->input->post(NULL, true);
            $name     = $this->input->post('name', true);
            $email    = $this->input->post('email', true);
            $company  = $this->input->post('company', true);
            $subject  = $this->input->post('subject', true);
            $comments = $this->input->post('comments', true);
            $ip       = $this->input->ip_address();
            $agent    = $this->input->user_agent();

            $this->load->library('email');
            $this->email->from($email, $this->our_company.' Website');
            $this->email->to($this->admin_mail);
            //$this->email->cc('another@another-example.com');
            //$this->email->bcc('them@their-example.com');
            $this->email->subject("$name has visited $this->our_company Website and has left the following information");
            $this->email->message(
                "Username: $name
                 Email: $email
                 Company: $company

                 Subject: $subject
                 IP: $ip
                 User agent: $agent

                 Comments:
                 --------------------------------------------------------
                 $comments
                 --------------------------------------------------------"
            );


            // reset Captcha status after each email sent, since we don't want the user to
            // be able to send an unlimited number of emails after solving the Captcha once
            $this->botdetectcaptcha->Reset();

            if (!$this->email->send()) {
                $data['mail_status'] = 'failed';
                echo $this->email->print_debugger();
                $this->load->view('mailus', $data);
            } else {
                $this->load->view('mailus', $data);
            }
        }
        $this->load->view('footer', $data);
    }

    // Captcha validation callback used in form validation
    public function captcha_validate($code) {
        // user considered human if they previously solved the Captcha...
        $isHuman = $this->botdetectcaptcha->IsSolved;
        if (!$isHuman) {
            // ...or if they solved the current Captcha
            $isHuman = $this->botdetectcaptcha->Validate($code);
        }

        // set error if Captcha validation failed
        if (!$isHuman) {
            $this->form_validation->set_message('captcha', 'Please retype the characters from the image correctly.');
        }
        return $isHuman;
    }

}

/* End of file inventory.php */
/* Location: ./application/controllers/inventory.php */
