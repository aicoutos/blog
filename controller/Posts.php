<?php
namespace app\controller;

use Basic\Auth;
use Basic\View;

class Posts
{
    public function get($slug=null)
    {
        /*REQUIREs*/
        require_once ROOT.'app/inc/auth.php';
        require_once ROOT.'db.php';
        require_once ROOT.'inc/view.php';
        /*VARs*/
        $data['user']=$auth->isAuth();
        $data['view']=$view;
        /*CODEs*/
        if (is_null($slug)) {
            $where=[
                "id[>=]" => 1
            ];
            $data['posts']=$db->select('posts', '*', $where);
            $view->view('read/posts', $data);
        }
    }
    public function post()
    {
    }
}
