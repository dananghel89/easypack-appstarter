<?php
/**
 * Controller Home Class
 */

namespace App\Controllers;

class Home extends \Epack\Controller {

	// Controller index action.
	public function indexAction() {
		$args = [
			'name' => 'EasyPack Framework',
		];

		\Epack\View::render('welcome', $args);
	}

}
