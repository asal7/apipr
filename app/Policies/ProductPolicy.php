<?php

namespace App\Policies;

use App\User;
use App\Products;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any products.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the products.
     *
     * @param  \App\User  $user
     * @param  \App\Products  $products
     * @return mixed
     */
    public function view(User $user, Products $products)
    {
        return $user->id==$products->user_id;
    }

    /**
     * Determine whether the user can create products.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the products.
     *
     * @param  \App\User  $user
     * @param  \App\Products  $products
     * @return mixed
     */
    public function update(User $user, Products $products)
    {
        //
    }

    /**
     * Determine whether the user can delete the products.
     *
     * @param  \App\User  $user
     * @param  \App\Products  $products
     * @return mixed
     */
    public function delete(User $user, Products $products)
    {
        //
    }

    /**
     * Determine whether the user can restore the products.
     *
     * @param  \App\User  $user
     * @param  \App\Products  $products
     * @return mixed
     */
    public function restore(User $user, Products $products)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the products.
     *
     * @param  \App\User  $user
     * @param  \App\Products  $products
     * @return mixed
     */
    public function forceDelete(User $user, Products $products)
    {
        //
    }
}
