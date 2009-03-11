<?php

require_once('../externals/frontend-test-suite/suite/TheCodeTrainCssValidatorTestCase.php');
require_once('../externals/frontend-test-suite/suite/TheCodeTrainCssValidator.php');

/**
 * @author  Neil Crosby <neil@neilcrosby.com>
 * @license Creative Commons Attribution-Share Alike 3.0 Unported 
 *          http://creativecommons.org/licenses/by-sa/3.0/
 **/
class CssValidityTest extends TheCodeTrainCssValidatorTestCase {
    public function setUp() {
    }

    public function tearDown() {
    }

    /**
     * @dataProvider cssProvider
     **/
    public function testAllCssIsValid($input) {
        $css = file_get_contents($input);
        if ( !$css ) {
            $this->markTestSkipped();
        }
        
        $result = $this->getValidationError(
            $css,
            array(
                'exceptions'=>array(
                    'star_prop'=>TheCodeTrainCssValidator::ALLOW,
                    'underscore_prop'=>TheCodeTrainCssValidator::ALLOW,
                    'yui_hacks'=>TheCodeTrainCssValidator::ALLOW
                )
            )
        );
        
        $this->assertFalse($result, $result);
    }

    public static function cssProvider() {
        return array(
            array('../style.css'),
        );
    }
}
?>