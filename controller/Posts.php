<?php
namespace app\controller;

use Basic\Auth;
use Basic\View;

class Posts
{
    public function get($slug=null)
    {
        if (is_null($slug) && isset($_GET['create'])) {
            $this->create();
        } else {
            $this->showAll($slug);
        }
    }
    public function post()
    {
        if (is_null($slug) && isset($_POST['create'])) {
            $this->create();
        }
    }
    public function create()
    {
        /*VARs*/
        $db=require_once ROOT.'db.php';
        $auth=new Auth($db);
        $data['user']=$auth->isAuth();
        $data['view']=new View();
        /*RULEs*/
        if ($data['user']) {
            $data['view']->view('post/create', $data);
        } else {
            $data['view']->redirect('/signin');
        }
    }
    public function showAll($slug)
    {
        /*VARs*/
        $db=require_once ROOT.'db.php';
        $auth=new Auth($db);
        $view=new View();
        $data['user']=$auth->isAuth();
        if ($data['user']) {
            $data['view']=$view;
            /*RULEs*/
            if (is_null($slug) && $auth->isAuth()) {
                $where=[
                    "id[>=]" => 1
                ];
                $data['posts']=$db->select('posts', '*', $where);
                $view->view('read/posts', $data);
            }
        } else {
            $view->redirect('/signin');
        }
    }
}
