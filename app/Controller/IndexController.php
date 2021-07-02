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

use App\Model\Posts;
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
        $pages = Posts::query()->select(['id','title','content'])->orderBy('created_at', 'desc')->paginate(12);
        return view('index',['page' => $pages]);
    }

    /**
     * @GetMapping(path="/list")
     */
    public function list(){
        $page = PostsClass::query()->select("name","url")->paginate(12);
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
        return view('create_list');
    }

    /**
     * @GetMapping(path="/{id}.html")
     */
    public function show($id){
        if(!Posts::query()->where('id',$id)->count()){
            return admin_abort(['msg'=>'页面不存在'],404);
        }
        $data = Posts::query()->where('id',$id)->with('classData')->first();
        return view('show',['data' => $data]);
    }

    /**
     * @GetMapping(path="/about")
     */
    public function about(){
        return view("about");
    }
}
