<?php

namespace Yaf\Extras;

// TODO controller also has _script_path
// knock it
// http://yaf.laruence.com/manual/yaf.class.controller.html


// Rewrited and Extended Controller
// - overwrite render/display, remove default template extension
class ExtendedController extends \Yaf\Controller_Abstract {

    // View functions
    // overwrite render
    public function render($file, $data = null) {
        return $this->getView()->render($file, $data);
    }

    // overwrite display
    public function display($file, $data = null) {
        return $this->getView()->display($file, $data);
    }

    // bridge to view
    public function assign($name, $value = null) {
        return $this->getView()->assign($name, $value);
    }



    // json responser
    // public function echoJson($state, $msg, $data = array()) {
    public function echoJson($data = array()) {
        // echo json_encode(array('state' => $state, 'msg' => $msg, 'data' => $data));
        header('Content-Type', 'application/json');
        echo json_encode($data); // write to Response?
    }

    // public function isAJAX() {
        // TODO
    // }

    // lookup param from uri-param -> post -> get
    public function getParam($name, $default = '') {
        return $this->getRequest()->get($name, $default);
    }
    // get all params
    public function getParams() {
        return array_merge($_GET, $_POST, $this->getRequest()->getParams());
    }

    public function getFiles() {
        return $this->getRequest()->getFiles();
    }

    // fetch cookie
    public function getCookie($name, $default = '') {
        return $this->getRequest()->getCookie($name, $default);
    }
    public function setCookie(/*params*/) {
        return call_user_func_array('setcookie', func_get_args());
    }

    // getSession?

    // flash
}

