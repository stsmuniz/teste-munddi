<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
	protected $geometry = ['position'];

	protected $geometryAsText = true;

	public function newQuery($excludeDeleted = true)
	{
		if (!empty($this->geometry) && $this->geometryAsText === true)
		{
			$raw = '';
			foreach ($this->geometry as $column)
			{
				$raw .= 'AsText(`' . $this->table . '`.`' . $column . '`) as `' . $column . '`, ';
			}
			$raw = substr($raw, 0, -2);
			return parent::newQuery($excludeDeleted)->addSelect('*', \DB::raw($raw));
		}
		return parent::newQuery($excludeDeleted);
	}
}
