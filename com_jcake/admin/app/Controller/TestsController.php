<?php


App::uses('AppController', 'Controller');


class TestsController extends AppController {

/**
 * This controller use User model
 *
 * @var array
 */
	public $uses = array('User');

/**
 * Displays a view
 *
 * @Author : Ahmad Nabulsi
 * @Email : a7mad24@gmail.com
 * @Date : 11/04/2014
 */
 
	public function index() {
		//set page title in joomla toolbar 
		JToolbarHelper::title('Test Index');

    }
/**
 * Displays a view
 *
 * @Author : Ahmad Nabulsi
 * @Email : a7mad24@gmail.com
 * @Date : 11/04/2014
 */
    public function index2() {
         
		$users = $this->User->find('all');
        
        $this->set('users',$users);
    }
/**
 * Displays a view
 *
 * @Author : Ahmad Nabulsi
 * @Email : a7mad24@gmail.com
 * @Date : 11/04/2014
 */
    public function index3() {
       
		return $this->redirect(array(
            'controller' => 'tests',
            'action' => 'index2',
            'full_base' => true
        ));
           
    }
    
}
