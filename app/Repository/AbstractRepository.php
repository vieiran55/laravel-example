<?php

namespace App\Repository;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

abstract class AbstractRepository
{

  /**
   * @var Model
   */
  private $model;

  public function __construct(Model $model)
  {
    $this->model = $model;
  }

  public function selectConditions($conditions)
  {
    $expressions = explode(';', $conditions);

    $where = '';

    foreach ($expressions as $e) {
      $exp = explode(':', $e);

      $this->model = $this->model->where($exp[0], $exp[1], $exp[2]);
    }
    return $where;
  }

  public function selectFilter($filters)
  {
    $this->model = $this->model->selectRaw($filters);
    //$products = $products->select($fields);
  }

  public function getResult(){
    return $this->model;
  }
}
