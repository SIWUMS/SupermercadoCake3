<?php
App::uses('AppModel', 'Model');
/**
 * Image Model
 *
 * @property Product $Product
 */
class Image extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'link';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'link' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

	function beforeSave($created){
		//var_dump($this->data['Image']['link']['name']);
		extract($this->data['Image']['link']);
		$filename = $this->data['Image']['link']['name'];
		if($size && !$error){
			move_uploaded_file($tmp_name, WWW_ROOT.'/product_images/'.$filename);
			$this->data['Image']['link'] = '/product_images/'.$filename;
		}
		return true;
	}
	
	
/**
 * hasOne associations
 *
 * @var array
 */
	public $hasOne = array(
		'Product' => array(
			'className' => 'Product',
			'foreignKey' => 'image_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
