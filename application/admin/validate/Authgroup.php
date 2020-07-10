<?php
namespace app\admin\validate;

use think\Validate;
//表单验证
class Authgroup extends Validate{
    //验证的字段
    protected $rule = [
        'title'  =>  'require|unique:auth_group',

    ];
//错误提示
    protected  $message = [
        'title.require' => '角色名称必填',
        'title.unique'   => '角色名称已存在',
    ];
//场景
//    protected $scene = [
//        'store'  =>  ['art_content','art_title'=>'require'],
//        'update'  =>  ['art_title'=>'require','art_content'],
//    ];


}