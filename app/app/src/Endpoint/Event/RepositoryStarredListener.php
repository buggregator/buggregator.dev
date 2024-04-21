<?php

declare(strict_types=1);

namespace App\Endpoint\Event;

use App\Github\Event\RepositoryStarred;
use Spiral\Events\Attribute\Listener;

final readonly class RepositoryStarredListener
{
    #[Listener]
    public function __invoke(RepositoryStarred $event): void
    {
        $phrases = [
            'Blink and you’ll miss it! Another %d-th star just landed in %s repository.',
            'Shine bright like a... well, you know. Thanks for the %d-th star in %s repository!',
            'The %d-th star has been spotted in %s repository! Telescope not required.',
            'Star light, star bright, %d-th star we see tonight. Thanks for the star in %s repository!',
            'Another %d-th star? You must be orbiting us by now!',
            'We’re seeing stars! Thanks for the %d-th star!',
            'Thanks for the %d-th star! %s repository is now officially a constellation.',
            'Someone just starred our repository! That\'s one small click for you, one giant leap for our morale.',
            'Look up! There’s a new %d-th star in our %s repository. Thanks!',
            'We just got a %d-th star in our %s repository! No autographs please, just code.',
            'Thanks for the %d-th star! We’re over the moon!',
            'A %d-th star? For us? You shouldn’t have... but we’re glad you did!',
            'You threw the %d-th star into our universe. Gravitational pull increasing!',
            'Someone thinks we\'re super! Another %d-th star in the bag.',
        ];

        $phrase = $phrases[\array_rand($phrases)];

        dump(\sprintf($phrase, $event->stars, 'buggregator/' . $event->repository));
    }
}
