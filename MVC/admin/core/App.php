<?php

class App{
    protected $controller  = 'Portopolio'; //controller default
    protected $method      = 'index';      //method defaul
    protected $params      = [];            //parameter jika ada

    public function __construct()
    {
        $url = $this->paraseURL();

        //pemanggian controller
        if (file_exists('../admin/controlers/'.$url[0].'.php')) {
            $$this->controllers = $url[0];
            unset($url[0]);
        }
        require_once '../admin/controllers/'.$this->controller.'.php';
        $this->controller = new $this->controller;

        //pemanggilan method
        if (isset($url[1] {
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        //parameters
        if (!empty($url)) {
            $this->params = array_values($url);
        }
        //jalankan controller & method, serta kirim parameter jika ada
        call_user_func_array([$this->controller,$method],$this->params);
    }

    public function parseURL()
    {
        if (isset($_GET['URL'])) {
            //menhilangkan karakter aneh atau karakter yang memungkinkan kita di hack
            $url = filter_var($url, FILTER_SANITIZE_URL;

            //menghilangkan tanda garis miring (/) dan mengambbil string-nya
            $url = explode('/', $url);
            return $url;
        }
    }



    