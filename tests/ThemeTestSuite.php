<?php

if ( !function_exists('__autoload') ) {
    function __autoload($class) {
        $class = str_replace( '_', '/', $class );
        $aLocations = array('../suite', '.');

        foreach( $aLocations as $location ) {
            $file = "$location/$class.php";
            if ( file_exists( $file ) ) {
                include_once( $file );
                return;
            }
        }

        // Check to see if we managed to declare the class
        if (!class_exists($class, false)) {
            trigger_error("Unable to load class: $class", E_USER_WARNING);
        }
    }
}

/**
 * @author  Neil Crosby <neil@neilcrosby.com>
 * @license Creative Commons Attribution-Share Alike 3.0 Unported 
 *          http://creativecommons.org/licenses/by-sa/3.0/
 **/
class ThemeTestSuite extends PHPUnit_Framework_TestSuite {
    public static function main() {
        PHPUnit_TextUI_TestRunner::run(self::suite());
    }
 
    public static function suite() {
        $suites = self::getTestSuites(__FILE__);

        $suite = new ThemeTestSuite();

        $suite->addTestSuite('CssValidityTest');
        $suite->addTestSuite('PageHtmlValidityTest');

        return $suite;
    }
 
    /**
     * Finds all TestSuites in this directory.
     *
     * @param $baseFile the full file path of the calling class
     *
     * @return An array containing the classnames of the associated TestSuites
     **/
    public static function getTestSuites( $baseFile ) {
        $return = array();
        
        $pathParts = pathinfo($baseFile);
        $dir = $pathParts['dirname'];
        $base = $pathParts['basename'];
        $class = $pathParts['filename'];
        
        $includeDir = $dir;
        
        if ($handle = opendir("$dir")) {
            while (false !== ($file = readdir($handle))) {
                if ($file != "." && $file != ".." && $file != $base) {
                    if ( 'TestSuite.php' == substr($file, -strlen('TestSuite.php')) ) {
                        array_push($return, substr($file, 0, -strlen('.php')));
                    }
                }
            }
            closedir($handle);
        }
        
        return $return;
    }
    protected function setUp() {
    }
 
    protected function tearDown() {
    }
}

if (PHPUnit_MAIN_METHOD == 'ThemeTestSuite::main') {
     ThemeTestSuite::main();
}
?>