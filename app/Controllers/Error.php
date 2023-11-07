<?php
/**
 * Controller Error Class
 */

namespace App\Controllers;

class Error extends \Epack\Controller {

	// Controller before method.
	protected function before() {
		http_response_code(404);
	}

	// Controller index action.
	public function indexAction() {
		\Epack\View::render('404');
	}

}
