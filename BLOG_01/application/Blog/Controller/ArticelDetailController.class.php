<?php
namespace Blog\Controller;
use Common\Controller\HomebaseController;
class ArticelDetailController extends HomebaseController{
   function index(){
              $id=$_GET['id'];

              $article=D('Posts');
              $users=D('Users');

              $h=$_GET['hits'];
              $arr=$article->where("id=$id")->setField('post_hits',$h+1);
              $arr=$article->where("id=$id")->order('post_modified DESC')->limit(5)->select();
              $sort=$article->order('post_hits>2 DESC')->limit(15)->select();
              $authorId=$article->query("select post_author from blog_posts where id='$id'");
              $authorId=$authorId[0]['post_author'];

              $authorName=$users->query("select user_nicename from blog_users where id=$authorId");
              $authorName=$authorName[0]['user_nicename'];

              $term_relation=D('TermRelationships');
              $term_rel=$term_relation->query("select term_id from blog_term_relationships where object_id='$id'");
              $terms=D('Terms');
               if(!$_GET['term_id']){
                             $tm_id=0;
                              $tme="New Blog";
                            }else{
                               $tm_id=$_GET['term_id'];
                                $tme=$terms->query("select name from blog_terms where term_id=$tm_id");
                              }

               $typeName=[];
              for ( $i  =  0 ;  $i  <  count($term_rel) ;  $i ++) {
              $t_id=$term_rel[$i][term_id];

               $term[termname][]=$terms->query("select name from blog_terms where term_id='$t_id'");
               $typeName[$i]['name']=($term[termname][$i][0]["name"]);
              $typeName[$i]['id']=$t_id;

              }
               $new=$typeName;
               //var_dump($termId);
              $typesId=sp_get_child_terms(4);
             // $this->assign('$termId',$termId);
               $this->assign('termname',$new);
                $this->assign('tme',$tme[0]["name"]);
                $this->assign('sourceId',$id);
              $this->assign('sort',$sort);
              $this->assign('ArticleList',$arr);
              $this->assign('type_term',$typesId);
              $this->assign('authorName',$authorName);
              $this->display();

          }
  // 文章点赞
    public function do_like(){


    	$id = I('get.id',0,'intval');//posts表中id

    	$posts_model=M("Posts");

    	$can_like=sp_check_user_action("posts$id",1);

    	if($can_like){
    		$posts_model->save(array("id"=>$id,"post_like"=>array("exp","post_like+1")));
    		$this->success("赞好啦！");
    	}else{
    		$this->error("您已赞过啦！");
    	}
    }

}