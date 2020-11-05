<?php

namespace App\Support\Contracts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;


abstract Class RepositoryAbstract
{

    /**
     * @return Collection|null
     */
    abstract public function all() : ?Collection;



    /**
     * @param array $data
     * @return Model|null
     */
    abstract public function create(array $data) : ?Model;


    /**
     * @param Model $model
     * @param array $data
     * @return int|null
     */
    abstract public function update(Model $model , array $data) : ?int;


    /**
     * @param int $id
     * @return Model|null
     */
    abstract public function find(int $id) : ?Model;


    /**
     * @param Model $model
     * @return bool|null
     */
    abstract public function delete(Model $model) : ?bool;

}
