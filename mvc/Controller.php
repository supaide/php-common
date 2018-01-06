<?php
//include('Template.php');
namespace SPDMVC;
use Template;

abstract class Controller {

    private $template, $view;

    private function initTemplate() {
        if(empty($this->template)) {
            $this->template = new Template();
            $this->view = $this->template->view;
        }
    }

    /**
     * Assign template value with a template file
     */
    protected function template($var, $templateFile) {
        $this->initTemplate();
        $this->template->assign($var, $templateFile);
    }

    /**
     * Assign template value pair
     */
    protected function templateValue($var, $value) {
        $this->initTemplate();
        $this->template->assignValue($var, $value);
    }

    /**
     * Assign multiple template values
     */
    protected function templateValues($pairs = array()) {
        $this->initTemplate();
        if (is_array($pairs)) {
            foreach($pairs as $var => $value){
                $this->templateValue($var, $value);
            }
        }
    }

    /**
     * Render the template
     */
    protected function show($templateFile) {
        $this->initTemplate();
        $this->template->show($templateFile);
    }

}
