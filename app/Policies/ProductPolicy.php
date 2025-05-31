<?php

namespace App\Policies;

use App\Models\Product;
use App\Models\User;

class ProductPolicy
{
    public function viewAny(User $user): bool
    {
        return true; // Всі можуть переглядати список продуктів
    }

    public function view(User $user, Product $product): bool
    {
        return true; // Всі можуть переглядати окремий продукт
    }

    public function create(User $user): bool
    {
        return true; // Всі авторизовані користувачі можуть створювати продукти
    }

    public function update(User $user, Product $product): bool
    {
        return $user->isAdmin() || $product->isOwnedBy($user);
    }

    public function delete(User $user, Product $product): bool
    {
        return $user->isAdmin() || $product->isOwnedBy($user);
    }
} 