<?php

require_once('../externals/frontend-test-suite/suite/TheCodeTrainBaseValidatorTestCase.php');
require_once('../externals/frontend-test-suite/suite/TheCodeTrainHtmlValidator.php');

/**
 * @author  Neil Crosby <neil@neilcrosby.com>
 * @license Creative Commons Attribution-Share Alike 3.0 Unported 
 *          http://creativecommons.org/licenses/by-sa/3.0/
 **/
class PageHtmlValidityTest extends TheCodeTrainBaseValidatorTestCase {
    public function setUp() {
    }

    public function tearDown() {
    }

    /**
     * @dataProvider pagesProvider
     **/
    public function testAllPagesAreValid($input) {
        $html = file_get_contents($input);
        if ( !$html ) {
            $this->markTestSkipped();
        }
        
        $this->assertFalse(
            $this->getValidationError($html)
        );
    }

    public static function pagesProvider() {
        return array(
            array('http://wordpress:8888/'),
            array('http://wordpress:8888/?page_id=1'),
            array('http://wordpress:8888/?page_id=2'),
            array('http://wordpress:8888/?page_id=3'),
            array('http://wordpress:8888/?page_id=4'),
            array('http://wordpress:8888/?page_id=5'),
            array('http://wordpress:8888/?page_id=6'),
            array('http://wordpress:8888/?page_id=7'),
            array('http://wordpress:8888/?page_id=8'),
            array('http://wordpress:8888/?page_id=9'),
            array('http://wordpress:8888/?page_id=10'),
            array('http://wordpress:8888/?page_id=19'),
            array('http://wordpress:8888/?m=200809'),
            array('http://wordpress:8888/?s=hgfljch+klFYIUEAYIADYFUADF'),
            array('http://wordpress:8888/?s=lorem'),
        );
    }
}
?>