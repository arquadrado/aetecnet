<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
	public function category()
	{
		return $this->belongsTo('App\Category');
	}

    public function images()
    {
        return $this->hasMany('App\ProjectImage');
    }
}

/*
 *
 *IDEIA
	Sacar todas images associadas a um projecto e povoar o panel com elas.
	No edit podem se adicionar mais imagens da maneira tradicional que vao aparecer na lista quando forem submetidas.
	No edit podem-se remover imagens que já estavam associadas ao projecto.
	Aquando do submit, compara-se o array de imagens inicial, com o array de imagens que foi submetido(sem contar
	com as novas imagens), e removem-se da base de dados as que estiverem em falta.

 */