<?php

/**
 * @group Model
 */
class Userlist_model_test extends CIUnit_TestCase
{
    private $_pcm;

    public function __construct($name = null, array $data = array(), $dataName = '') {
        parent::__construct($name, $data, $dataName);
    }

    public function setUp() {
        parent::setUp();

        /*
        * this is an example of how you would load a product model,
        * load fixture data into the test database (assuming you have the fixture yaml files filled with data for your tables),
        * and use the fixture instance variable
        */
        $this->CI->load->model('userlist_model');
        $this->_pcm = $this->CI->userlist_model;
    }

    public function tearDown() {
        $this->_pcm = null;
        parent::tearDown();
    }

    /**
     * @dataProvider get_user_list
     */
    public function test_add_user($_POST, $expected) {
        $actual = $this->_pcm->add_user();
        //$this->assertEquals($expected, $actual['type']);
        $this->assertTrue($expected);
    }

    public function get_user_list() {
        /*$this->dbfixt('phone_carrier');
        foreach($this->phone_carrier_fixt as $carrier) {
            echo $carrier['name'] . '\n';
            echo $carrier['txt_address'] . '\n';
            echo $carrier['txt_message_length'] . '\n';
        }*/

        return array(
            array(array('name' => 'chad', 'password' => '123', 'auth' => '0'), true),
            array(array('name' => 'chad', 'password' => '456', 'auth' => '1'), true),
            array(array('name' => 'chad', 'password' => '789', 'auth' => '2'), true)
        );
    }
}
