<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('AppController', 'Controller');
App::uses('Xml', 'Utility');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class QueryController extends AppController {

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array();

/**
 * Displays a view
 *
 * @param mixed What page to display
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
 */
	public function index() {
		
		$config = array(
			'publisher' => '5197159109751598',
			'query' => 'java',
			'location' => 'toronto, Ontario',
			'country' => 'ca',
		);
		
		$buildQuery = 'http://api.indeed.com/ads/apisearch?publisher='.$config['publisher'].'&q='.$config['query'].'&l='.$config['location'].'&sort=&radius=&st=&jt=&start=&limit=&fromage=&filter=&latlong=1&co='.$config['country'].'&chnl=&userip=1.2.3.4&useragent=Mozilla/%2F4.0%28Firefox%29&v=2';
	
		// Query Indded
		$xml = Xml::build($buildQuery);
		
		// Convert to array
		$xml = json_decode(json_encode((array)$xml), TRUE);
		
		$this->set('buildQuery', $buildQuery);
		$this->set('result', $xml);
	}
}
