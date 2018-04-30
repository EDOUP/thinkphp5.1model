<?php
namespace app\index\controller;

use think\Request;
use think\Controller;
use think\View;
use think\facade\Session;
class Index extends Controller
{
	public function index(){
		#默认模板的地址
		#return view();
		#app/index/view/index/index.html
		
		#传递第一个参数 修改模板文件目录
		#return view('upload');
		#app/index/view/index/upload.html
		#return view('public/upload');
		#app/index/view/public/upload.html
		#如果以./开头 那么找到入口文件同级的目录文件
		#return view('./index.html');
		
		#参数的传递
		#return view('index',['email' =>'417431006@qq.com','user' =>'sdad']);


		#以下是在继承 think\Controller后的功能
		$this->assign('assign','assign传递的值');
		$this->assign('time',time());
		$this->view->assign2='value2';
		//dump($_SERVER);
		
		//session::set('email','1234');
		//return $this->fetch();

		#简单运算
		$this->assign('a','10');
		$this->assign('b','20');

		#数组
		$list=[
			'user1' => [
			'name'=>'php',
			'email'=>'php@qq.com'
			],
			'user2' => [
			'name'=>'java',
			'email'=>'p2434@qq.com'
			],
			'user3' => [
			'name'=>'happy',
			'email'=>'happy@qq.com'
			]
		];
		$this->assign('list',$list);
		$this->assign('empty','这个数组没有数据');

		return $this->fetch('index',['email' =>'417431006@qq.com','user' =>'sdad']);

		#劣势：前后端未分离
		#return  $this->display('这是一个{$email}字符串{$assign}',['email' =>'417431006@qq.com']);
	}

   /* public function index()
    {
		#初始界面
        return '<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} a{color:#2E5CD5;cursor: pointer;text-decoration: none} a:hover{text-decoration:underline; } body{ background: #fff; font-family: "Century Gothic","Microsoft yahei"; color: #333;font-size:18px;} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.6em; font-size: 42px }</style><div style="padding: 24px 48px;"> <h1>:) </h1><p> ThinkPHP V5.1<br/><span style="font-size:30px">12载初心不改（2006-2018） - 你值得信赖的PHP框架</span></p></div><script type="text/javascript" src="https://tajs.qq.com/stats?sId=64890268" charset="UTF-8"></script><script type="text/javascript" src="https://e.topthink.com/Public/static/client.js"></script><think id="eab4b9f840753f8e7"></think>';//初始界面
	
		
	}
*/
	/*
	
	 public function index(Request $request){
		#Request相关
		#查看配置
		//dump(config());		
		//$conf1=['username'=>'sd'];
		//$conf2=['username'=>'addcslashes'];
		//dump(array_merge($conf1,$conf2));
		
		#Request
		//$request =request();
		
		//dump($request->domain());
		//dump($request->controller());
		//dump($request->baseurl());

		//dump($request->param());
	}
*/
	/*public function info($id){
		#测试路由
		// index/index/info/id/5 =>news/5
		echo url('index/index/info',['id'=>10])."<br>";
		return "{$id}";
	}
	*/
	
    public function hello($name = 'ThinkPHP5')
    {
        return 'hello,' . $name;
    }
}
