<?php
namespace app\admin\validate;

use think\Validate;
//表单验证
class Authrule extends Validate{
    //验证的字段
    protected $rule = [
        'name'  =>  'require|unique:auth_rule',

    ];
//错误提示
    protected  $message = [
        'name.require' => '控制器 /方法名必填',
        'name.unique'   => '控制器 /方法名已存在',
    ];
//场景
//    protected $scene = [
//        'store'  =>  ['art_content','art_title'=>'require'],
//        'update'  =>  ['art_title'=>'require','art_content'],
//    ];


}