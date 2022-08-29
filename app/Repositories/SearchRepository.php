<?php

namespace App\Repositories;

use App\Models\Category;
use App\Models\Product;
use App\Contracts\SearchContract;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;

/**
 * Class ProductRepository
 *
 * @package \App\Repositories
 */
class SearchRepository extends BaseRepository implements SearchContract
{

    /**
     * ProductRepository constructor.
     * @param Product $model
     */
    public function __construct(Product $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }


    /**
     * @param array $params
     * @return mixed
     */
    public function searchProduct($params)
    {
        $search = $params['search'];
        $searchs = Product::where('name', 'like', '%'.$search.'%')
                    ->orWhere('price',$search)->paginate(100);
        return $searchs;
    }

}
