<?php

// 行为插件
return array(
    /**
     +------------------------------------------------------------------------------
     * 系统标签
     +------------------------------------------------------------------------------
     */
    'app_begin' => array(
        //'check_ipban', //禁止IP
        'load_lang', //语言
    ),
/*     'view_template' => array(
        'basic_template','_overlay'=>1, //自动定位模板文件
    ), */
    'view_filter' => array(
        'content_replace', //路径替换
    ),

    /**
     +------------------------------------------------------------------------------
     * 用户行为标签
     +------------------------------------------------------------------------------
     */
    
);