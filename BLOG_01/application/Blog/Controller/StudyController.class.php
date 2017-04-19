<?php

namespace Blog\Controller;
use Common\Controller\HomebaseController;
class StudyController extends HomebaseController{
   public function index(){

           $cid=$_GET['term_id'];
           $all_posts=sp_sql_posts_paged_bycatid($cid,"",8);
           $this->assign('all_posts', $all_posts);
           $this->assign('termname',$new[0]);
           $typesId=sp_get_child_terms(4);
           $this->assign('type_term',$typesId);

              $article=D('Posts');
              $sort=$article->order('post_hits>2 DESC')->limit(15)->select();
              $this->assign('sort',$sort);
            $this->display();

          }
   public function type_all(){
                 $term_id=$_POST['term_id'];
                 $typeAll=sp_sql_posts_paged_bycatid($term_id,"",10);

                 $data=$this->ajaxReturn($typeAll,'json');
                 echo $data;
    }
}
?>