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

use Hyperf\View\RenderInterface;

class IndexController extends AbstractController
{
    public function index(RenderInterface $render): \Psr\Http\Message\ResponseInterface
    {
        menu()->add(2, [
            'url' => '/',
            'name' => '仪表盘',
            'icon' => '',
        ]);
        return $render->render('index');
    }
}
