<?php
namespace Admin\Controller;
use Think\Controller;
class ConfigController extends Controller {
    public function index(){
    	$Config = M('Config');
        $Config = $Config->select();
        //dump($Config);
        //exit;
        $this->assign('Config',$Config);

        $this -> display();
       
    }
    public function edit(){
       $id = I('get.id','','intval');
       //dump($id);
       $Config = M('Config');
       $list = $Config->find($id);
       //dump($list);
       //exit;
       $this->assign('list', $list);
       $this->display();
       
    }
    public function update()
    {
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize   =     31457280 ;// 设置附件上传大小
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->autoSub  = true;
        $upload->subName  = '/admin';
        $upload->rootPath = "./Public/";//文件上传保存的根路径，下面的Upload文件夹放在这里面，./Public/Upload
        $upload->savePath  =      './Uploads/'; // 设置附件上传目录，文件上传上来以后放在了这个文件件里面。
        $info   =   $upload->upload();
       
        $Config = M('Config');
        $id = I('get.id','','intval');
        //echo $id;
        //dump($id);
       
        $con_name = I('post.con_name');
        $con_keywords = I('post.con_keywords');
        $con_des = I('post.con_des');
        $con_logo = $info['upic']['savename'];
        $con_copyright = I('post.con_copyright');
        $con_status = I('post.con_status');
        //dump($con_name);
        $img = $Config -> find($id); 
        

       @unlink("__PUBLIC__/Uploads/admin/".$img['con_logo']);
       
        $data = array('con_name' =>$con_name,'con_keywords' =>$con_keywords,'con_des' =>$con_des,'con_logo' =>$con_logo,'con_copyright' =>$con_copyright,'con_status' =>$con_status); 
       
        $list = $Config->where("con_id=$id")->save($data); 

        if($list)
        {
            $this->success('修改成功',U('Index'));
        }
        //$this -> display('index');
    }
  
    
  
   
}