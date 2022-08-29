<?php

namespace App\Contracts;

/**
 * Interface CategoryContract
 * @package App\Contracts
 */
interface SearchContract
{
    /**
     * @param int $params
     * @return mixed
     */
    public function searchProduct($params);
}
