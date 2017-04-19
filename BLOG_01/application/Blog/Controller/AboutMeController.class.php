<?php

namespace Blog\Controller;
use Common\Controller\HomebaseController;
class AboutMeController extends HomebaseController{
   function index(){
   $article=D('Posts');
               $arr=$article->where('id =19')->select();
                $this->assign('aboutMe',$arr);
                 $hostuser=D('About');
                    $hostarr=$hostuser->select();
                    $this->assign('hostuser',$hostarr);
               $this->display();
          }
}