<?php

/**
 * @group Model
 */
class Products_model_test extends CIUnit_TestCase
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
        $this->CI->load->model('products_model');
        $this->_pcm = $this->CI->products_model;
    }

    public function tearDown() {
        $this->_pcm = null;
        parent::tearDown();
    }

    /**
     * @dataProvider get_product_type
     */
    public function test_get_product_info($ptype, $expected) {
        $actual = $this->_pcm->get_product_info($ptype);
        $this->assertEquals($expected, $actual['type']);
    }

    public function get_product_type() {
        /*$this->dbfixt('phone_carrier');
        foreach($this->phone_carrier_fixt as $carrier) {
            echo $carrier['name'] . '\n';
            echo $carrier['txt_address'] . '\n';
            echo $carrier['txt_message_length'] . '\n';
        }*/

        return array(
            array('idisc-notebook', 'IDisc Notebook'),
            array('ring-binder', 'Ring Binder'),
            array('paper-commodity', 'Paper commodity')
        );
    }
}
