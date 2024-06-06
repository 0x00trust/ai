<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\AITokenType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AiModel extends Model
{
    protected $fillable = [
        'title',
        'ai_engine',
        'key',
        'is_active',
    ];

    protected $casts = [
        'ai_engine' => \App\Enums\AIEngine::class,
        'is_active' => 'boolean',
    ];

    public function tokens(): HasMany
    {
        return $this->hasMany(Token::class);
    }

    public function wordToken(): ?Token
    {
        return $this->tokens->firstWhere('type', AITokenType::WORD);
    }

    public function imageToken(): ?Token
    {
        return $this->tokens->firstWhere('type', AITokenType::IMAGE);
    }
}
