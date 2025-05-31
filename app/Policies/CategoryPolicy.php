<?php

namespace App\Policies;

use App\Models\Category;
use App\Models\User;

class CategoryPolicy
{
    public function viewAny(User $user): bool
    {
        return true; // Всі можуть переглядати категорії
    }

    public function view(User $user, Category $category): bool
    {
        return true; // Всі можуть переглядати окрему категорію
    }

    public function create(User $user): bool
    {
        return $user->isAdmin(); // Тільки адмін може створювати категорії
    }

    public function update(User $user, Category $category): bool
    {
        return $user->isAdmin(); // Тільки адмін може редагувати категорії
    }

    public function delete(User $user, Category $category): bool
    {
        return $user->isAdmin(); // Тільки адмін може видаляти категорії
    }
} 