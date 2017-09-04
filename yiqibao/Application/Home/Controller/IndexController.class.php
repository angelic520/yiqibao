<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
				
				
				
		$this->display('luyan_detail');
    }

	
    
    public function pjdetail(){
    	
    	
    	$this->display('detail');
    }
    
	public function lydetail(){
		
		
		$this->display('index');
	}
	
	
    function downfile()
	{
	$file=$_GET['filename']; //文件名
	$file = C('VIEW_PATH').'Index/pdf/'.$file;
	header("Content-type:application/octet-stream");
	$fileName = basename($file);
	header("Content-Disposition:attachment;filename={$fileName}");
	header("Content-ranges:bytes");
	header("Content-length:" . filesize($file));
	readfile($file);
	}
	
}