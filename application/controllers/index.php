<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Aclor extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $captchaConfig = array (
            'CaptchaId' => 'FormCaptcha', // a unique Id for the Captcha instance
            'UserInputId' => 'CaptchaCode' // Id of the Captcha code input textbox
        );

        // load the BotDetect Captcha library
        $this->load->library('BotDetect/BotDetectCaptcha', $captchaConfig);
    }

    public function view($page = 'index')
    {
        if ( ! file_exists('application/views/'.$page.'.php')) {
            // Whoops, we don't have a page for that!
            show_404();
        }

        $data['title'] = ucfirst($page); // Capitalize the first letter
        $data['captchaSolved'] = false;
        $data['captchaHtml'] = $this->botdetectcaptcha->Html();

        $this->load->view('header', $data);
        $this->load->view($page, $data);
        $this->load->view('footer', $data);
    }
}

/* End of file inventory.php */
/* Location: ./application/controllers/inventory.php */
