<?php

use Illuminate\Database\Capsule\Manager as Capsule;

	if(!Capsule::schema()->hasTable('usuarios')){
		Capsule::schema()->create('usuarios',function($table){
			$table -> increments('id');
			$table -> string('usuario',20);
			$table -> string('senha',160); 
		});

	}

	if(!Capsule::schema()->hasTable('contatos')){
		Capsule::schema()->create('contatos', function ($table){
			$table -> increments('id');
			$table -> string('nome',50);
			$table -> string('telefone',21);
			$table -> string('endereco',200);
			$table -> integer('id_usuario')->unsigned();
			$table->foreign('id_usuario')->references('id')->on('usuarios');
		});
	}



?>