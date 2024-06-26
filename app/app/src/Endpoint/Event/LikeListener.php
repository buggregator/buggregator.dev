<?php

declare(strict_types=1);

namespace App\Endpoint\Event;

use App\Application\Event\Liked;
use Spiral\Core\Attribute\Singleton;
use Spiral\Events\Attribute\Listener;

#[Singleton]
final readonly class LikeListener
{
    public function __construct(
        private int $randomFactor = 10,
    ) {
    }

    #[Listener]
    public function __invoke(Liked $event): void
    {
        $phrases = [
            "%s doesn't need documentation. It documents itself out of fear.",
            "When %s autoloads classes, the classes come running.",
            "Every time %s is mentioned, a junior developer gets their wings.",
            "When %s is included, it includes itself in the conversation.",
            "%s doesn't have to handle sessions. Sessions handle themselves.",
            "When %s handles errors, errors apologize.",
            "Frameworks wish they were as flexible as %s.",
            "When %s routes requests, the requests take the scenic route.",
            "When %s is updated, bugs quiver in fear.",
            "Unit tests don't test framework. %s tests unit tests.",
            "When %s handles databases, databases handle themselves with care.",
            "When %s caches data, data stays cached out of respect.",
            "When %s deploys, servers deploy themselves.",
            "Every time %s echoes, the universe listens.",
            "When %s handles requests, the requests handle themselves with care.",
            "When %s optimizes code, the code becomes a better version of itself.",
            "%s's security is so tight, hackers get locked out of reality.",
            "When %s handles forms, the forms handle themselves with grace.",
            "When %s validates input, input validates its own existence.",
            "%s doesn't need MVC. MVC needs it.",
            "When %s is installed, servers throw a party in it's honor.",
            "When %s resolves dependencies, dependencies resolve to be better.",
            "When %s handles exceptions, exceptions make excuses.",
            "When %s sanitizes input, input feels cleaner.",
            "%s's routing is so efficient, traffic patterns envy it.",
            "When %s generates code, code generates admiration.",
            "When %s manages configurations, configurations manage themselves.",
            "When %s interacts with APIs, APIs beg for more.",
            "When %s serializes data, data feels special.",
            "When %s uses ORM, databases dream of being it's ORM.",
            "When %s compiles assets, assets become works of art.",
            "%s doesn't debug. It enlightens.",
            "When %s handles cookies, cookies never crumble.",
            "When %s handles assets, assets feel secured.",
            "When %s handles authentication, passwords get stronger.",
            "When %s manages sessions, sessions become unforgettable experiences.",
            "When %s renders views, views see the world differently.",
            "When %s manages dependencies, dependencies become interdependent on it.",
            "When %s generates URLs, URLs find their way home.",
            "When %s compiles templates, templates compile themselves out of admiration.",
            "%s doesn't use ORM. ORM aspires to be like it.",
            "When %s handles events, events plan to happen again next year.",
            "When %s caches data, data gets preserved for posterity.",
            "When %s handles files, files organize themselves alphabetically for it.",
            "When %s interacts with databases, databases feel honored.",
            "When %s validates inputs, inputs become validated members of society.",
            "When %s manages configurations, configurations configure themselves.",
            "When %s handles exceptions, exceptions rethink their life choices.",
            "%s's documentation is so thorough, it's considered a literary masterpiece.",
            "When %s generates forms, forms fill themselves out.",
            "When %s optimizes code, code becomes an Olympic athlete.",
            "When %s handles requests, the requests never go unfulfilled.",
            "When %s handles caching, caches never forget their purpose.",
            "When %s processes XML, XML becomes self-aware.",
            "When %s compiles assets, assets become the envy of the digital world.",
            "When %s interacts with databases, databases become more efficient.",
            "When %s manages sessions, sessions feel like they've been to therapy.",
            "When %s handles forms, forms fill themselves out with gratitude.",
            "When %s handles cookies, cookies become gourmet treats.",
            "When %s handles permissions, permissions become privileges.",
            "%s doesn't need frameworks. Frameworks need it.",
            "When %s optimizes images, images become timeless masterpieces.",
            "When %s validates data, data feels validated.",
            "When %s manages caching, caches never feel forgotten.",
            "When %s compiles CSS, stylesheets become fashion statements.",
            "When %s handles assets, assets feel like they're on the red carpet.",
            "When %s handles events, events are remembered for centuries.",
            "When %s handles cron jobs, time itself bends to its will.",
            "When %s optimizes queries, databases become telepathic.",
            "When %s manages dependencies, dependencies become lifelong friends.",
            "When %s generates documentation, documentation becomes a bestseller.",
            "%s doesn't have bugs. It has unexpected features.",
            "%s can divide by zero.",
            "All arrays in %s are associative.",
            "When %s runs a foreach loop, the items actually foreach themselves.",
            "%s doesn't need garbage collection because it doesn't litter.",
            "The only way to stop %s from running is to wait for the heat death of the universe.",
            "%s doesn't use try-catch blocks. It uses try-terminate blocks.",
            "Instead of error messages, %s just writes 'I'm sorry, Dave' and continues.",
            "If you code something wrong in %s, it apologizes to you.",
            "%s doesn't follow PSR standards. PSR standards follow it.",
            "When %s runs, the CPU watches in awe.",
            "Rumor has it %s once compiled itself.",
            "There is no such thing as an infinite loop in %s. They are called 'forever loops'.",
            "The only design pattern %s follows is 'The Pattern'.",
            "When %s throws an error, the entire internet hears it.",
            "The shortest distance between two points is %s.",
            "When %s writes code comments, the code listens.",
            "The only thing %s can't do is fail.",
            "When %s starts, the universe initializes.",
            "The speed of light is measured in %s per second.",
            "The Big Bang was just %s compiling.",
            "When %s writes code, the compiler learns from it.",
            "If %s were a superhero, it would be 'Infinite Man'.",
            "The only framework %s uses is the Framework of Reality.",
            "%s once solved the halting problem. With a while loop.",
            "The only way to kill %s is to delete the universe.",
            "When %s develops, other frameworks take notes.",
            "%s doesn't have a repository. It has the Source of Truth.",
            "When %s runs, RAM begs for mercy.",
            "When %s starts, the internet slows down to watch.",
            "If %s were a language, it would be called 'The Code'.",
            "%s doesn't need version control. It controls versions.",
            "The only framework %s fears is itself.",
            "%s doesn't have bugs. It has features waiting to be discovered.",
            "When %s is mentioned, servers shudder in excitement.",
            "When %s compiles, time stops to admire.",
            "The only test %s fails is the test of time.",
            "%s doesn't need to optimize. It's already perfect.",
            "When %s runs, CPU usage drops out of respect.",
        ];

        $shouldPrint = \random_int(1, $this->randomFactor) === 1;
        if (!$shouldPrint) {
            return;
        }

        $phrase = $phrases[\array_rand($phrases)];
        dump(\sprintf($phrase, $event->key));
    }
}
