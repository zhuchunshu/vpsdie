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
}
