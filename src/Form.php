<?php
/**
 * FormBuilder表单生成器
 * Author: xaboy
 * Github: https://github.com/xaboy/form-builder
 */

namespace LaravelFormBuilder;


class Form extends \FormBuilder\Form
{

    /**
     * Form constructor.
     *
     * @param string $action
     * @param array  $components
     * @param bool   $token
     */
    public function __construct($action = '', array $components = [], $token = true)
    {
        parent::__construct($action, $components);
        if ($token)
            $this->append(\FormBuilder\Form::hidden('_token', csrf_token()));

        $this->init();
    }

    protected function init()
    {
        $this->script = [
            'jq' => asset('vendor/form-create/jquery.js'),
            'vue' => asset('vendor/form-create/vue/vue.min.js'),
            'iview-css' => asset('vendor/form-create/iview/styles/iview.css'),
            'iview' => asset('vendor/form-create/iview/iview.min.js'),
            'form-create' => asset('vendor/form-create/form-create.min.js'),
            'city-data' => asset('vendor/form-create/province_city.js'),
            'city-area-data' => asset('vendor/form-create/province_city_area.js')
        ];
    }

    /**
     * @param string $action
     * @param array  $components
     * @param bool   $token
     * @return \FormBuilder\Form|mixed
     */
    public static function create($action, array $components = [], $token = true)
    {
        return self::create($action, $components, $token);
    }
}