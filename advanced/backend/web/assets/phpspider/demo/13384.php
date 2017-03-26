<?php
error_reporting(7);
ini_set("memory_limit", "1024M");
require dirname(__FILE__).'/../core/init.php';

/* Do NOT delete this comment */
/* 不要删除这段注释 */

//$html = requests::get("http://www.zhibo8.cc/zuqiu/2017/0319-huangma-jijin.htm");
//$data = selector::select($html, ".jijin-list > .title > h1", "css");
//$a = file_put_contents('E:/wamp/www/phpspider-master/data/zs.html',$html);
//var_dump($html);die;

$configs = array(
    'name' => '13384美女图',
    'tasknum' => 1,
    //'multiserver' => true,
    //'log_show' => true,
    //'save_running_state' => false,
    'domains' => array(
        'www.zhibo8.cc'
    ),

    'scan_urls' => array(
        "http://www.zhibo8.cc/zuqiu/2017/0319-huangma-jijin.htm",
    ),
    /*
    'list_url_regexes' => array(
        "http://www.zhibo8.cc/zuqiu/2017/0319-huangma-jijin.htm",

    ),
    */
    'content_url_regexes' => array(
        "http://www.zhibo8.cc/zuqiu/2017/0319-huangma-jijin.htm",

    ),
    'export' => array(
        'type' => 'csv',
        'file' => PATH_DATA.'/zuqiu1.csv', // data目录下
    ),
    'fields' => array(
		array(
			'name' => "title",
			'selector' => "@<div\sclass=\"title\">\s*<h1>(.*?)<\/h1>\s*<\/div>@", // regex抽取规则
            'selector_type' => "regex",
			'required' => true,
		),
        /*
        array(
            'name' => "url",
            'selector' => "@<div\sclass=\"v-img\">\s*<a\s*href=\"(.*?)\".*?>.*?<\/a>\s*<\/div>@",
            'selector_type' => "regex",
            'required' => true,
        ),
        */
        array(
            'name' => "image",
            'selector' => "//div[contains(@class,'v-img')]//a//img[contains(@class,'v-limg')]",
            'required' => true,
        ),
        array(
            'name' => "url",
            'selector' => "@<div\sclass=\"v-img\">\s*<a\s*href=\"(.*?)\".*?>@",
            'selector_type' => "regex",
            'required' => true,
        ),
    ),
);

$spider = new phpspider($configs);

$res = $spider->start();
