<?php

namespace Source\Articles;

interface Register {

	public function register(Register $register);
}

class Register {

	public function register(Register $register) {

		$register->register();
	}
}