<?php

declare(strict_types=1);

namespace App\Endpoint\Event;

use App\Github\Event\NewRelease;
use Spiral\Events\Attribute\Listener;

final readonly class NewReleaseListener
{
    #[Listener]
    public function __invoke(NewRelease $event): void
    {
        $phrases = [
            "Hold onto your hats! Version %s of %s has just dropped!",
            "Big news! %s version %s is now live and ready to rock!",
            "What's cooking? It's %s version %s, served hot and fresh!",
            "Out with the old, in with the new! %s version %s is here!",
            "Upgrade time! Dive into version %s of %s today!",
            "Version %s of %s is out! Update your systems, and let the magic begin!",
            "Just released: %s v%s! It's time to level up your game.",
            "Breaking news! Version %s of %s is now available for download!",
            "The future is now! Meet version %s of %s.",
            "Get ready to explore new territories with %s version %s!",
            "Unwrap the newest gift: %s version %s! It's ready for you.",
            "Hey there, version %s of %s just landed! Check it out!",
            "It’s showtime! Version %s of %s is hitting the spotlight.",
            "Fresh out of the dev oven: %s version %s!",
            "Let’s celebrate! Version %s of %s is here and it's spectacular!",
            "New release alert: %s v%s! See what's new and improved.",
            "Version %s of %s just made its grand entrance!",
            "Be the first to try out version %s of %s. It’s waiting for you!",
            "Cheers to new beginnings with %s version %s!",
            "Version %s of %s has arrived! Join the evolution."
        ];

        $phrase = $phrases[\array_rand($phrases)];

        dump(\sprintf($phrase, $event->version, 'buggregator/' . $event->repository));
    }
}
