<?php

declare(strict_types=1);

use App\Enums\AITokenType;
use App\Models\Token;
use App\Models\AiModel;

test('token relationships', function () {
    $this->artisan('db:seed', ['--class' => 'AIModelSeeder']);
    $this->artisan('db:seed', ['--class' => 'TokenSeeder']);

    $this->assertNotSame(0, Token::count());
    $this->assertNotSame(0, AiModel::count());

    $token = Token::where('type', AITokenType::WORD)->first();

    expect($token)
        ->toBeInstanceOf(Token::class)
        ->cost_per_token
        ->toEqual(1.00)
        ->aiModel
        ->toBeInstanceOf(AiModel::class)
        ->aiModel
        ->key
        ->toBeString();

});