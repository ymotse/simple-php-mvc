<?php

namespace App\core;

use Twig_Environment;
use Twig_Extension_Debug;
use Twig_Loader_Filesystem;

/**
 * 
 * @author yitshhaq.fukushima
 * 
 */
class View {


    private $_dir;
    private $_page;
    private $_content;


    public function getDir() {
        return $this->_dir;
    }
    public function setDir($_dir) {
        $this->_dir = $_dir;
    }


    public function getPage() {
        return $this->_page;
    }
    public function setPage($_page) {
        $this->_page = $_page;
    }


    public function getContent() {
        return $this->_content;
    }
    public function setContent(Array $_content) {
        $this->_content = $_content;
    }


    public function __construct($dir = null, $page = null, Array $content = null) {
        
        if ($dir != null && $page != null){
            
            $this->setDir( $dir );
            $this->setPage($page);
            
            $this->setContent($content);
            
            $loader = new Twig_Loader_Filesystem( $this->getDir() );

            //Without cache:
            $twig = new Twig_Environment($loader);
            
            //With cache:
            // $twig = new Twig_Environment($loader, 
            //     array(
            //        'cache' => 'App'.DIRECTORY_SEPARATOR.'view'.DIRECTORY_SEPARATOR.'view_cache'  
            //     )
            // );
            
            $twig->addExtension(new Twig_Extension_Debug());
            
            echo $twig->render( $this->getPage(), $this->getContent() );
            
            exit();
        }
    
    }

}