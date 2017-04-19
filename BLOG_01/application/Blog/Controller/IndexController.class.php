<?php

namespace Blog\Controller;
use Common\Controller\HomebaseController;
class IndexController extends HomebaseController{
  function index(){
    $article=D('Posts');

    $arr=$article->where('id  not in (19)')->order('post_modified DESC')->limit(15)->select();

    $arr3=sp_sql_posts_paged_bycatid('4',"limit:0,10;order:post_modified desc;",14);
    $this->assign('ArticleList',$arr3);
    $arr2=$article->where('recommended=1')->order('post_modified DESC')->limit(5)->select();
     $this->assign('recommended',$arr2);


    $hostuser=D('About');
    $hostarr=$hostuser->select();
    $this->assign('hostuser',$hostarr);

    $link=D('Links');
    $linkarr=$link->select();
    $this->assign('links',$linkarr);

     $motto=D('Motto');
     $mottoarr=$motto->select();
     $this->assign('mottos',$mottoarr);

     $audio=D('Audio');
     $audioarr=$audio->select();
     $this->assign('audios',$audioarr);



    $this->display();
    }


}