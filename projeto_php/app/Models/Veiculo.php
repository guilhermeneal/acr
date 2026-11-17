<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Veiculo extends Model
{
    use HasFactory;

    protected $fillable = [
        'categoria_id',
        'marca',
        'modelo',
        'ano',
        'preco',
        'quilometragem',
        'descricao',
        'imagem_url',
        'vendido',
    ];

    protected function casts(): array
    {
        return [
            'ano' => 'integer',
            'preco' => 'decimal:2',
            'quilometragem' => 'integer',
            'vendido' => 'boolean',
        ];
    }

    public function categoria(): BelongsTo
    {
        return $this->belongsTo(Categoria::class);
    }
}
