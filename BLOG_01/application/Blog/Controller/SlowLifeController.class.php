<?php

namespace Blog\Controller;
use Common\Controller\HomebaseController;
class SlowLifeController extends HomebaseController{
   function index(){
            $cid=5;
              $all_posts=sp_sql_posts_paged_bycatid($cid,"",10);
       // var_dump($all_posts);
               $this->assign('all_posts', $all_posts);
                $typesId=sp_get_child_terms(4);
                $this->assign('type_term',$typesId);
                 $article=D('Posts');
                              $sort=$article->order('post_hits>2 DESC')->limit(15)->select();
                              $this->assign('sort',$sort);
               $this->display();
          }
}