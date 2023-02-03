<?php

namespace App\Policies;

use App\Models\Product;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return true;

        //return $user->id ==1;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Product $product)
    {
        //if($user->id == 1){  que el usuario 1 solo pueda pueda ver los pares
            //return $product->id %2 == 0;
            //return $product->id;
        //}
        //else{
            //return false;
        //}
        return true;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        if($user->id== 1){
            //return $product->id %2 == 0;
            return true;
        }
        else{
            return false;
        }

        //return $user->id ==1;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Product $product)
    {
        if($user->id== 1){
            //return $product->id %2 == 0;
            return true;
        }
        else{
            return false;
        }

        //return $user->id == $product->user_responsable_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Product $product)
    {
        //solo el usuario 1 (que es el admin) pueda borrar 
        if($user->id== 1){
            //return $product->id %2 == 0;
            return true;
        }
        else{
            return false;
        }

        //return ($user->id ==1) ? true : false;
    }

    public function changeprice(User $user, Product $product){ // una funcion de ejemplo, que nos dice que pueden cambiar de precio solo el usuario cuyo nombre es alba
        return $user->name = "alba";
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Product $product)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Product $product)
    {
        //
    }
}
