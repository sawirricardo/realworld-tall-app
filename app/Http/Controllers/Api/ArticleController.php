<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ArticleCollection;
use App\Models\Article;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $findByAuthor = false;
        $user = new \App\Models\User();
        if ($request->has('author') && !$request->isNotFilled('author')) {
            $findByAuthor = true;
            $user = \App\Models\User::firstWhere('username', $request->get('author'));
            if (!$user) {
                throw ValidationException::withMessages(['username' => 'Username not found']);
            }
        }

        return new ArticleCollection(
            Article::with(['author', 'tags'])
                ->when(
                    $findByAuthor,
                    function (Builder $query) use ($request, $user) {
                        return $query->where('user_id', '=', $user->id);
                    }
                )
                ->get()
        );
    }
}
