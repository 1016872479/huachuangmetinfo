<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
    	
       $product = M('product');
       $products = $product->select();
       //echo $product -> _sql();
       //exit;


    	$this->assign('products',$products);
    	//dump($products);
    	exit;
    	$this->display();
    	

    }
}