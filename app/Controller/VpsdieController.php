<?php

declare(strict_types=1);

namespace App\Controller;

use App\Model\PostsClass;
use App\Request\Vpsdie\CreateClass;
use Hyperf\HttpServer\Annotation\Controller;
use Hyperf\HttpServer\Annotation\PostMapping;

/**
 * @Controller
 * @package App\Controller
 */
class VpsdieController
{
    /**
     * @PostMapping(path="/vpsdie/api/CreateClass")
     */
    public function CreateClass(CreateClass $createClass): array
    {
        $result = $createClass->validated();
        $author = [
            "ip" => get_client_ip(),
        ];
        $result['author'] = serialize(json_encode($author));
        PostsClass::create($result);
        return Json_Api(200,true,['msg' => "成功!"]);
    }

    /**
     * @PostMapping(path="/vpsdie/api/ClassList")
     */
    public function ClassList(): array
    {
        $arr =[["text" => "未选择","value" => 0]];
        foreach (PostsClass::select(["name","id"])->get() as $value){
            $arr[]=[
                "text" => $value->name,
                "value" => $value->id
            ];
        }
        return $arr;
    }

    /**
     * @PostMapping(path="/vpsdie/api/ClassData")
     */
    public function ClassData(): array
    {
        if(!request()->input("id")){
            return Json_Api(403,false,['msg' => "id不能为空"]);
        }
        if (!PostsClass::where("id",request()->input("id"))->count()){
            return Json_Api(403,false,['msg' => "id为".request()->input("id")."的分类不存在"]);
        }
        return Json_Api(200,true,['data' => PostsClass::select(["name","url"])->where('id',request()->input("id"))->first()]);
    }
}
