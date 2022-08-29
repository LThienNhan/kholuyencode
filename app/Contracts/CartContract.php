<?php

namespace App\Contracts;

/**
 * Interface BrandContract
 * @package App\Contracts
 */
interface CartContract
{
    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */
    public function findProductById(int $id);

   /**
     * @param array $params
     * @return mixed
     */
    public function updateSession($params, $id);
   
       /**
     * @param array $params
     * @return mixed
     */
    public function updateDatabase($params, $id);

     /**
     * @param $id
     * @return bool
     */

    /**
     * @return mixed
     */
    public function clearCartDatabase();


    // /**
    //  * @param array $params
    //  * @return mixed
    //  */
    // public function createBrand(array $params);

    // /**
    //  * @param array $params
    //  * @return mixed
    //  */
    // public function updateBrand(array $params);

    // /**
    //  * @param $id
    //  * @return bool
    //  */
    // public function deleteBrand($id);
}
