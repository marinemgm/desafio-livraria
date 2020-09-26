<?php

namespace App\Services;

use App\Models\Livro;
use Illuminate\Support\Facades\Log;
use Throwable;

class LivroService
{
    public static function store($request)
    {
        try {
            return Livro::create($request);
        } catch (Throwable $th) {
            Log::error($th->getMessage());
            return null;
        }
    }

    public static function update($request, $livro)
    {
        try {
            return $livro->update($request);
        } catch (Throwable $th) {
            Log::error($th->getMessage());
            return null;
        }
    }

    public static function destroy($livro)
    {
        try {
            $livro->livros()->detach();
            return $livro->delete();
        } catch (Throwable $th) {
            Log::error($th->getMessage());
            return null;
        }
    }
} 