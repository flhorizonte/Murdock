<?php

namespace Source\Crud;

interface Register {

	public function register(Register $register);
}

class Register {

	public function __construct(Register $register) {

		$register->register();
	}

	public function register(Register $register) {}
}