<?php
namespace Admin\Controller;
use Think\Controller;
class LangController extends Controller {
    public function index(){
   
  $Model = M('lang');
  $list = $Model->select();
 

  $this->assign('list',$list);
  //dump($list);
  $this->display();
       
    }
    public function edit()
    {
    	$id = I('get.id','','intval');
    	//echo $id;
    	$lang_info = M('lang_info');
       	$list = $lang_info->where("lang_id = $id") ->select();
       //dump($list);
       //exit;
       $this->assign('list', $list);
       $this->assign('lang_id', $id);
       
       $this->display();
    }
    public function edit1()
    {
    	$id = I('get.id','','intval');
    	//echo $id;
    	$lang_info = M('lang_info');
       	$list = $lang_info->where("id = $id") ->select();

       $this->assign('list', $list);
       $this->display();
    }
    public function update()
    {
    	$lang_info = M('lang_info');
    	$id = I('get.id','','intval');
    	$lang_id = I('get.lang_id','','intval');
    	
    	$v = I('post.v');
    	
    	
    	$data = array('v' =>$v); 
    	$list = $lang_info->where("id=$id")->save($data); 

    	$mylang_infos = $lang_info -> where("lang_id = $lang_id") -> select();
    	$linkk = array();
    	$linkv = array();
    	foreach($mylang_infos as $mylang_info)
    	{
    		
    		$linkk[] = $mylang_info['k'];
    		$linkv[] = $mylang_info['v'];

    		
    	}
    	$link = array_combine($linkk,$linkv);
    	
    	
    	$newlink =  var_export($link,true);
    	$newlink = "<?php return ".$newlink.";";

    	
    	$Model = M('lang');
    	$langdata = array('link' =>$newlink); 
    	$list = $Model->where("id = $lang_id")->save($langdata);
    	

    	//dump($link);
    
        if($list)
        {
        	
        	 session_start();

    $mylang =  M('lang');
    $mylangs = $mylang->select();
   
   
   $mymark = $mylang -> field('mark') -> select();
   
   $_SESSION['lang']['mark'] = $mymark;
  
  
   foreach($mylangs as $mylang)
{
    $mylanglink = $mylang['link'];
    $mylangmark = $mylang['mark'];
    //dump($mylangmark);
    //1、打开文件资源
    $fp = fopen('Application/Common/Lang/'.$mylangmark.'.php','w+');

    //2、操作文件资源
    fwrite($fp,$mylanglink);

    //3、关闭文件资源
    fclose($fp);
    

}
            $this->success('修改成功',U('Index'));
        }


    	
    	
       
       

    }
    public function insert()
    {

    	// 1.实例化Model类
        $lang = M('lang');

        // 2.创建数据对象
        $res = $lang->create();    // 默认$_POST

        // 3.判断结果
        if ($res) {
            // 4.执行添加操作
            $result = $lang->add();
            	


            // 5.判断是否成功
            if ($result) {
                // echo 'ok';
                $this->success('添加成功',U('lang/index'));
            } else {
                // echo 'no';
                $this->error('添加失败');
            }
    	

    	
    }

    
}
public function langadd()
	{

		// 1.实例化Model类
        $lang_info = M('lang_info');
        $id = I('get.id','','intval');
       

      

       $datas = I('post.');
       $linkk = array();
    	$linkv = array();
      foreach($datas as  $k =>$v)
      {
      		$linkk[] = $k;
      		$linkv[] = $v;

      		$data = array('k' => $k,'v' => $v,'lang_id' =>$id);

      		$list = $lang_info->add($data);
      		
      }
      
      $link = array_combine($linkk,$linkv);
    	
    	
    	$newlink =  var_export($link,true);
    	$newlink = "<?php return ".$newlink.";";

    	
    	$Model = M('lang');
    	$langdata = array('link' =>$newlink); 
    	$list = $Model->where("id = $id")->save($langdata);


    	 if($list)
        {
        	
        	 session_start();

    $mylang =  M('lang');
    $mylangs = $mylang->select();
   
   
   $mymark = $mylang -> field('mark') -> select();
   
   $_SESSION['lang']['mark'] = $mymark;
  
  
   foreach($mylangs as $mylang)
{
    $mylanglink = $mylang['link'];
    $mylangmark = $mylang['mark'];
    //dump($mylangmark);
    //1、打开文件资源
    $fp = fopen('Application/Common/Lang/'.$mylangmark.'.php','w+');

    //2、操作文件资源
    fwrite($fp,$mylanglink);

    //3、关闭文件资源
    fclose($fp);
    

}
            $this->success('添加成功',U('Index'));
        }

      

      
	}
}