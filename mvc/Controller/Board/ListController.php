<?php

namespace Board;

class ListController extends \Controller
{
	public function index()
	{
		$data = [
			'k1' => 'v1',
			'k2' => 'v2',
		];
		App::render("board/list", $data);
	}
}