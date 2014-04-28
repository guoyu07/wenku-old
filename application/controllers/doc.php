<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 文库的主控制类
 * @author heimonsy
 *
 */
class Doc extends MY_Controller {
	
	//用来传递到视图中的数据
	private $datas = array();
	
	public function __construct() {
		parent::__construct();
		
		$this->load->model('user_model');
		if($this->user_model->is_login()){
			//如果用户登录了，则显示用户的登录信息
			$this->datas['is_login'] = true;
			$this->datas['user_nickname'] = $this->user_model->user_info('nickname');
			$this->datas['user_face'] = $this->user_model->user_info('face');
		} else {
			$this->datas['is_login'] = false;
		}

	}
	
	
	/**
	 * 首页
	 */
	function index() {
		$this->datas['nav'] = 'index';  //用来在导航上输出class="active"
		
		$this->load->view("common/header.php", $this->datas);
		$this->load->view("doc/index.php");
		$this->load->view("common/footer.php");
		
	}
	
	/**
	 * 文库页
	 */
	function lists() {
		$this->datas['nav'] = 'list';
		$this->load->view("common/header.php", $this->datas);
		$this->load->view("doc/list.php");
		$this->load->view("common/footer.php");
	}
	
	/**
	 * 搜索
	 */
	function search() {
		$this->load->view("common/header.php", $this->datas);
		$this->load->view("doc/search.php");
		$this->load->view("common/footer.php");
	}

	/**
	 * 显示
	 */
	function view() {
		$this->datas['nav'] = 'list';
		$this->load->view("common/header.php", $this->datas);
		$this->load->view("doc/view.php");
		$this->load->view("common/footer.php");
	}
}