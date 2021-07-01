<?php

declare(strict_types=1);
/**
 * CodeFec - Hyperf
 *
 * @link     https://github.com/zhuchunshu
 * @document https://codefec.com
 * @contact  laravel@88.com
 * @license  https://github.com/zhuchunshu/CodeFecHF/blob/master/LICENSE
 */
namespace App\Controller;

use App\Model\PostsClass;
use Hyperf\HttpServer\Annotation\Controller;
use Hyperf\HttpServer\Annotation\GetMapping;
use Hyperf\View\RenderInterface;

/**
 * @Controller
 */
class IndexController extends AbstractController
{
    /**
     * @GetMapping(path="/")
     */
    public function index()
    {
        return view("index");
    }

    /**
     * @GetMapping(path="/list")
     */
    public function list(){
        $page = PostsClass::paginate(15);
        return view("list",['page' => $page]);
    }

    /**
     * @GetMapping(path="/create")
     */
    public function create(){
        return view("create");
    }

    /**
     * @GetMapping(path="/list/create")
     */
    public function list_create(){
        return view("create_list");
    }
}
