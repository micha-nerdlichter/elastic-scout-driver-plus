<?php
declare(strict_types=1);

namespace ElasticScoutDriverPlus;

use ElasticAdapter\Documents\Document;
use ElasticAdapter\Search\Highlight;
use ElasticScoutDriverPlus\Factories\LazyModelFactory;
use Illuminate\Database\Eloquent\Model;

final class Match
{
    /**
     * @var LazyModelFactory
     */
    private $lazyModelFactory;
    /**
     * @var Document
     */
    private $document;
    /**
     * @var Highlight|null
     */
    private $highlight;
    /**
     * @var float|null
     */
    private $score;

    public function __construct(
        LazyModelFactory $lazyModelFactory,
        Document $document,
        ?Highlight $highlight = null,
        ?float $score = null
    ) {
        $this->lazyModelFactory = $lazyModelFactory;
        $this->document = $document;
        $this->highlight = $highlight;
        $this->score = $score;
    }

    public function model(): ?Model
    {
        $documentId = $this->document()->getId();
        return $this->lazyModelFactory->makeById($documentId);
    }

    public function document(): Document
    {
        return $this->document;
    }

    public function highlight(): ?Highlight
    {
        return $this->highlight;
    }

    public function score(): ?float
    {
        return $this->score;
    }
}
