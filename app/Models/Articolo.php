<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Categoria;

/**
 * Articolo Model
 *
 * This class represents an Article/Item entity in the application.
 * It serves as the bridge between the database table and the application logic,
 * providing an eloquent interface for database operations.
 *
 * @package App\Models
 */
class Articolo extends Model
{
    protected $table = 'articoli';

    protected $fillable = [
        'titoli',
        'contenuto',
        'categoria_id',
        'immagine'
    ];
    
    public function categoria(): BelongsTo
    {
        /**
         * Get the category that this article belongs to.
         * 
         * This defines a many-to-one relationship where many articles (Articolo)
         * belong to a single category (Categoria). While this is technically a one-to-one
         * relationship at the database level (one article points to one category), it is
         * classified as a BelongsTo relationship from the inverse perspective of HasOne.
         * 
         * The key difference:
         * - BelongsTo: The foreign key is on THIS model (Articolo)
         * - HasOne: The foreign key is on the RELATED model (Categoria)
         * 
         * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
         */
        return $this->belongsTo(Categoria::class);
    }
}
