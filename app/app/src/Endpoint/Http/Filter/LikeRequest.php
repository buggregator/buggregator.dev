<?php

declare(strict_types=1);

namespace App\Endpoint\Http\Filter;

use Spiral\Filters\Attribute\Input\Post;
use Spiral\Filters\Model\FilterDefinitionInterface;
use Spiral\Filters\Model\HasFilterDefinition;
use Spiral\Filters\Model\Filter;
use Spiral\Validation\Laravel\FilterDefinition;

final class LikeRequest extends Filter implements HasFilterDefinition
{
    #[Post]
    public string $key;

    public function filterDefinition(): FilterDefinitionInterface
    {
        return new FilterDefinition(validationRules: [
            'key' => 'required|string',
        ]);
    }
}
