<?php
App::uses('AppController', 'Controller');

class HomesController extends AppController {
	public $layout = "home_layout";


public function beforefilter() {
	parent::beforefilter();
	$this->Auth->allow("index");
	}


/*
	For home page
*/
public function index(){

}


}