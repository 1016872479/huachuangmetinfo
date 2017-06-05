<?php
namespace Admin\Controller;
use Think\Controller;
class ArticleController extends Controller {
    public function index(){
    

    	
    $tech_article_category = M('tech_article_category');
    $tech_article_category = $tech_article_category->join('met_tech_article  on met_tech_article_category.cat_id = met_tech_article.cat_id ')-> where("met_tech_article_category.cat_pid = 0") -> select();
    //echo $tech_article_category->getLastSql();
    //exit;
   
    $this->assign('tech_article_category',$tech_article_category);

    $this -> display();
       
    }
    public function show()
    {
         $id = I('get.id','','intval');
         $tech_article = M('tech_article');
         $tech_article = $tech_article -> where("cat_id = $id") -> order("is_top desc") -> order("is_show desc")-> select();
         //echo $tech_article->getLastSql();
         //exit;
         //dump($tech_article);
         //exit;
         $this->assign('tech_article',$tech_article);
         $this -> display();
        
        


    }
    public function edit()
    {
        $id = I('get.id','','intval');
        $tech_article = M('tech_article');
        $tech_article = $tech_article -> where("art_id = $id")-> select();
        //dump($tech_article);
        //exit;
        $this->assign('tech_article',$tech_article);
        $this -> display();
    }
    public function update()
    {
        $tech_article = M('tech_article');
        $id = I('get.id','','intval');
        
      $data = I('post.');
      $list = $tech_article->where("art_id=$id")->save($data); 
       if($list)
        {
            $this->success('修改成功',U('Index'));
        }
    }
   


   



}