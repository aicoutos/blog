<?php
namespace app\controller;

use Basic\View;

class Home
{
    public function get()
    {
        /*VARs*/
        $db=require_once ROOT.'db.php';
        $auth=new Auth($db);
        $view=new View();
        $where=[
            'id[>]'=>0
        ];
        $messages=$db->select('messages', '*', $where);
        $data=[
            'view'=>$view,
            'messages'=>$messages
        ];
        /*RULEs*/
        $view->view('read/home', $data);
    }
}
