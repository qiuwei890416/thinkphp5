<?php
namespace app\admin\validate;

use think\Validate;
//表单验证
class Article extends Validate{
    //验证的字段
    protected $rule = [
        'art_title'  =>  'require|unique:article',
        'art_content' =>  'require',
    ];
//错误提示
    protected  $message = [
        'art_title.require' => '标题必填',
        'art_content.require'   => '内容必填',
        'art_title.unique'   => ' 标题名已存在',
    ];
//场景
    protected $scene = [
        'store'  =>  ['art_content','art_title'=>'require'],
        'update'  =>  ['art_title'=>'require','art_content'],
    ];


}