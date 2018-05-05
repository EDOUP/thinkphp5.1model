<?php
namespace app\index\controller;

use think\Request;
use think\Controller;
use think\View;
use think\facade\Session;
use think\Db;
class Index extends Controller
{
	
    public function index()
    {
		#初始界面
        return '<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} a{color:#2E5CD5;cursor: pointer;text-decoration: none} a:hover{text-decoration:underline; } body{ background: #fff; font-family: "Century Gothic","Microsoft yahei"; color: #333;font-size:18px;} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.6em; font-size: 42px }</style><div style="padding: 24px 48px;"> <h1>:) </h1><p> ThinkPHP V5.1<br/><span style="font-size:30px">12载初心不改（2006-2018） - 你值得信赖的PHP框架</span></p></div><script type="text/javascript" src="https://tajs.qq.com/stats?sId=64890268" charset="UTF-8"></script><script type="text/javascript" src="https://e.topthink.com/Public/static/client.js"></script><think id="eab4b9f840753f8e7"></think>';//初始界面
	
		
	}
	public function index1(){
		#默认模板的地址
		#dump(config());
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

		return  $this->fetch('index1',['email' =>'417431006@qq.com','user' =>'sdad']);
		
		#劣势：前后端未分离
		#return  $this->display('这是一个{$email}字符串{$assign}',['email' =>'417431006@qq.com']);
	}

	public function index2(){
     
     	#数据库操作：查询
  		// $res=Db::connect();
		// dump($res);
		#sql语句查询数据库
		# my_user为建在数据库中的一个表，查询my_user表 id=1 的数据
		//$res=Db::query("select * from my_user where id=?",[1]);
		#sql语句插入
		// $res =Db::execute("insert into my_user set id=?,username=?,password=?,email=?",[2,
		// 	'second',
		// 	md5('second'),
		// 	'second@163.com',
		// 	]);
		#select 返回所有记录 二维数组  where为限制条件 没有为空
		//$res=Db::table('my_user')->where(['id'=>'3'])->select();
		#另一种写法my_user的表前缀my_在databas配置中的prefix
		//$res=Db::name('user')->select();
		#thinkphp提供的初始化函数 第三个参数：是否实例化
		//$res=Db('user',[],false)->select();
		#find 仅返回一条记录 一维数组 没有返回null
		//$res=Db::table('my_user')->where(['id'=>'3'])->find();
		#value 返回一条记录 为某字段的值 不存在返回null
		//$res=Db::table('my_user')->where(['id'=>'2'])->value('username');
		#column 返回一个数组 获取对应的一列值 若查询两个值 后一个为key 不存在返回空数组
		//$res=Db::table('my_user')->column('username','email');
		//dump($res);
		
		#数据库操作：插入 inset insetAll insetGetId:插入后返回id
		$db=Db::name('user');
		$res=$db->insetGetId([

			]);
	}
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
	public  function page1()
	{
		return $this->fetch();
	}
    public function hello($name = 'ThinkPHP5')
    {
        return 'hello,' . $name;
    }
}
