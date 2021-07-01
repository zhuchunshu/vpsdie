<?php

declare(strict_types=1);

namespace App\Controller;

use App\Model\Posts;
use App\Model\PostsClass;
use App\Request\Vpsdie\CreateClass;
use App\Request\Vpsdie\CreatePosts;
use Hyperf\HttpServer\Annotation\Controller;
use Hyperf\HttpServer\Annotation\PostMapping;
use voku\helper\AntiXSS;

/**
 * @Controller
 * @package App\Controller
 */
class VpsdieController
{
    /**
     * @PostMapping(path="/vpsdie/api/CreateClass")
     */
    public function createClass(CreateClass $createClass): array
    {
        $result = $createClass->validated();
        $author = [
            'ip' => get_client_ip(),
        ];
        $result['author'] = serialize(json_encode($author));
        PostsClass::query()->create($result);
        return Json_Api(200,true,['msg' => '成功!']);
    }

    /**
     * @PostMapping(path="/vpsdie/api/ClassList")
     */
    public function classList(): array
    {
        $array =[['text' => '未选择', 'value' => 0]];
        foreach (PostsClass::query()->select(['name', 'id'])->get() as $value){
            $array[]=[
                'text' => $value->name,
                'value' => $value->id
            ];
        }
        return $array;
    }

    /**
     * @PostMapping(path="/vpsdie/api/ClassData")
     */
    public function classData(): array
    {
        if(!request()->input('id')){
            return Json_Api(403,false,['msg' => 'id不能为空']);
        }
        if (!PostsClass::query()->where('id',request()->input('id'))->count()){
            return Json_Api(403,false,['msg' => 'id为' .request()->input('id'). '的分类不存在']);
        }
        return Json_Api(200,true,['data' => PostsClass::query()->select(['name', 'url'])->where('id',request()->input('id'))->first()]);
    }

    /**
     * @PostMapping(path="/vpsdie/api/Create")
     */
    public function create(CreatePosts $createPosts,AntiXSS $antiXSS): array
    {
        $result = $createPosts->validated();
        $content = $antiXSS->xss_clean($result['content']);
        $title = $antiXSS->xss_clean($result['title']);
        $class_id = $result['class_id'];
        $author = [
            'ip' => get_client_ip(),
        ];
        Posts::query()->create([
           'title' => $title,
           'content' => $content,
           'class_id' => $class_id,
            'author' => serialize(json_encode($author))
        ]);
        return Json_Api(200,true,['msg' => '发布成功!']);
    }
}
