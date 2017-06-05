<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
    	/*
    	$user = M('user');

        //获取数据总条数
        $count = $user -> count();

        //实例化分页类
        $page = new \Think\Page($count, 5);

        //获取limit参数
        $limit = $page -> firstRow. ','.$page -> listRows;

        //执行查询
        $arr = $user -> limit($limit) -> select();

       
        $show = $page -> show();

        $this -> assign('arr', $arr);
        
       
        $this -> assign('show', $show);

        $this -> display();

        */
       session_start();
       if(!empty($_SESSION['adminname']))

       {
       		$user = M('user');
       		$user = $user->select();
       
        	$this->assign('user',$user);

       	$this -> display('index');
       }else
       {
       	$this -> display('login');
       }
       
    }
    public function index1()
    {
    	 $product = M('product');
       $products = $product->select();
       //echo $product -> _sql();
       //exit;


    	$this->assign('products',$products);
    	dump($products);
    	exit;
    	$this->display();
    }
    public function loginout()
    {
    	$_SESSION['adminname'] = Null;
    	$this->success('退出成功',U('Index'));
    }
    public function dologin()
    {
    	// 1.实例化model类
        $user = M('user');

        // 2.获取id并查询数据
      
        $username =I('post.username');
        $password =I('post.password');
        
        $data = $user->where("username='$username' and password='$password'")->select();

       
        //var_dump($data);
       

        if($data){
        	 // 3.分配
        $user = $user->select();
       	session_start();
       	$_SESSION['adminname'] = $username;
        $this->success('登录成功',U('Index'));
    }else
    {
    	$this -> display('login');
    }
       
       
    }
    public function add()
    {
    	// 1.实例化model类
    	$user = M('user');

    	// 2.创建数据对象
    	
    	$res = $user->create();	// 没有参数默认是$_POST数据

    	// 3.判断创建数据对象的结果
    	/*
			遇到问题：
				第一步：关闭跳转
				第二部：输出SQL语句
				第三部：将SQL语句放在命令行下执行，根据错误信息改变
    	*/
    	if ($res) {
    		// 4.执行添加操作
    		$result = $user->add();

    		// 5.判断添加是否成功
    		if ($result) {
    			// echo '添加成功';
    			$this->success('添加成功',U('Index'));
    		} else {
    			// echo '失败';
    			$this->error('添加失败');
    		}
    	} else {
    		echo $user->getError();
    	}
    }


//语言的测试
    public function lang(){
    //
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



    
    $this->assign('lang',L());
    $this->assign('mylangs',$mylangs);
  
    
    $this->display();
}
}