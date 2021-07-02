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

use App\CodeFec\Admin\Admin;
use App\CodeFec\Admin\Ui;
use App\CodeFec\Admin\Ui\Card;
use App\Model\AdminUser;
use App\Request\Admin\LoginRequest;
use HyperfExt\Hashing\Hash;
use Psr\Http\Message\ResponseInterface;

/**
 * Class AdminController
 * @package App\Controller
 */
class AdminController
{
    /**
     * @param Ui $ui
     * @param Card $card
     * @return ResponseInterface
     */
    public function index(Ui $ui, Card $card): ResponseInterface
    {
        return $ui
        ->title('站点设置')
        ->body(view('admin.setting'))
            ->ImportJs([mix('js/admin/vpsdie/setting.js')])
        ->render();
    }

    /**
     * @return ResponseInterface
     */
    public function login(): ResponseInterface
    {
        
        if(Admin::Check()){
            return admin_abort(['msg' => '您已登录']);
        }
        return view('admin.login');
    }

    /**
     * @param LoginRequest $request
     * @return array
     */
    public function loginPost(LoginRequest $request): array
    {
        if(Admin::Check()){
            return Json_Api(403,false,['msg' => '您已登录']);
        }
        $username = $request->input('username');
        $password = $request->input('password');
        if(!AdminUser::query()->where('username',$username)->count()){
            return Json_Api(403,false,['用户不存在']);
        }
        // 数据库里的密码
        $d_pwd = AdminUser::query()->where('username',$username)->first()->password;
        if(Hash::check($password, $d_pwd)){
            Admin::SignIn($username,$password);
            return Json_Api(200,true,['msg' => '登陆成功!', 'url' => '/admin']);
        }else{
            return Json_Api(401,false,['密码错误']);
        }
    }
    
    // 退出登录

    /**
     * @return array
     */
    public function logout(): array
    {
        session()->clear();
        return Json_Api(200,true,['msg' => '已退出登陆!', 'url' => '/admin/login']);
    }
}
