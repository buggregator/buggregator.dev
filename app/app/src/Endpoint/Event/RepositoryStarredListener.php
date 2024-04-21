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
        $repository = 'buggregator/' . $event->repository;

        $phrases = [
            \sprintf("Bazinga! %s stars achieved on %s, thanks to the enigmatic %s 🌟", $event->stars, $repository, $event->author),
            \sprintf("Interesting! %s stars on %s, and %s is the catalyst! 🧪", $event->stars, $repository, $event->author),
            \sprintf("Fascinating! %s stars have accumulated on %s due to the intervention of %s 🚀", $event->stars, $repository, $event->author),
            \sprintf("Oh, gravitational pull must be strong because %s just added another star to %s 🌌", $event->author, $repository),
            \sprintf("This is no string theory, %s stars are real on %s, all thanks to %s 🎻", $event->stars, $repository, $event->author),
            \sprintf("Elementary, my dear %s! Your star has propelled %s to %s stars 🕵️", $event->author, $repository, $event->stars),
            \sprintf("By the hammer of Thor! %s stars on %s now, courtesy of %s ⚡", $event->stars, $repository, $event->author),
            \sprintf("Isn't that spatial! %s stars on %s, and %s is the star-maker 🌠", $event->stars, $repository, $event->author),
            \sprintf("Eureka! %s has reached %s stars, with a quantum boost from %s 🎓", $repository, $event->stars, $event->author),
            \sprintf("I'm not crazy; my mother had me tested – and she would be proud of %s stars on %s, thanks to %s 🧠", $event->stars, $repository, $event->author),
            \sprintf("In an alternate universe, %s may not have starred %s, but in this one, it’s %s stars! 🌍", $event->author, $repository, $event->stars),
            \sprintf("Holy Moly of Science, %s stars on %s! %s, you are officially a part of the hypothesis! 🧬", $event->stars, $repository, $event->author),
            \sprintf("Engage! %s stars on %s. Good job, %s. That was most logical 🖖", $event->stars, $repository, $event->author),
            \sprintf("To infinity and beyond! Well, %s stars on %s, at least, thanks to %s 🚀", $event->stars, $repository, $event->author),
            \sprintf("Live long and prosper, %s. Thanks to you, %s now has %s stars 🖖", $event->author, $repository, $event->stars),
            \sprintf("Congratulations! You've just been promoted to Captain Star for adding the %sth star to %s, %s 🌟", $event->stars, $repository, $event->author),
            \sprintf("Guess what, %s! You’ve altered the space-time continuum by starring %s, now at %s stars! 🕒", $event->author, $repository, $event->stars),
            \sprintf("Huzzah! %s stars are gracing %s, all because of the noble %s 🏰", $event->stars, $repository, $event->author),
            \sprintf("If stars were particles, %s, you’ve just caused a chain reaction on %s! Now at %s stars! ☢️", $event->author, $repository, $event->stars),
            \sprintf("Mark my words, %s, %s will remember your contribution of the %sth star in the annals of science! 📚", $event->author, $repository, $event->stars),

            \sprintf("Houston, we have a problem... %s stars are too many for %s! Kudos to %s 🚀", $event->stars, $repository, $event->author),
            \sprintf("Like a smooth operator, %s slid into %s and left a star, bringing us to %s stars! 💫", $event->author, $repository, $event->stars),
            \sprintf("Magic! Not really, it’s just engineering. Thanks to %s, %s now boasts %s stars 🛠️", $event->author, $repository, $event->stars),
            \sprintf("You must be using that Martian tech, %s, because %s just hit %s stars! 🌌", $event->author, $repository, $event->stars),
            \sprintf("Beep beep! %s, your star on %s has been registered, total count: %s 📡", $event->author, $repository, $event->stars),
            \sprintf("If stars were kisses, %s just smooched %s all the way to %s stars 💋", $event->author, $repository, $event->stars),
            \sprintf("In the words of a space engineer: 'Wow, %s! %s now orbits around %s stars!' 🛸", $event->author, $repository, $event->stars),
            \sprintf("Did you use a laser, %s? Because that star on %s was precisely placed, making it %s stars 🔭", $event->author, $repository, $event->stars),
            \sprintf("Engines to full power! Thanks to %s, %s is soaring with %s stars 🚀", $event->author, $repository, $event->stars),
            \sprintf("This isn’t a joke, %s! You just propelled %s to %s stars with your star! 🌠", $event->author, $repository, $event->stars),
            \sprintf("Like a true pilot, %s steered %s into the realm of %s stars 🚁", $event->author, $repository, $event->stars),
            \sprintf("Knock knock, %s! Who’s there? %s stars on %s, that’s who! 🚪", $event->author, $event->stars, $repository),
            \sprintf("High-five, %s! %s just reached the cosmic level of %s stars ✋", $event->author, $repository, $event->stars),
            \sprintf("If we were playing 'Star Battles,' %s, your move on %s would score %s stars! 🎮", $event->author, $repository, $event->stars),
            \sprintf("With the precision of a finely tuned telescope, %s has zoomed into %s stars on %s 🔭", $event->author, $event->stars, $repository),
            \sprintf("Rocket man %s adding a star! Now, %s has a total of %s stars 🎤", $event->author, $repository, $event->stars),
            \sprintf("Affirmative, %s! Your transmission of a star to %s was successful. We are now at %s stars 📶", $event->author, $repository, $event->stars),
            \sprintf("A tip of the astronaut helmet to %s for boosting %s to %s stars! 🪐", $event->author, $repository, $event->stars),
            \sprintf("Hey %s, did you use a photon torpedo? Because your star just blasted %s to %s stars! 🛸", $event->author, $repository, $event->stars),
            \sprintf("Astronomically awesome, %s! Thanks to you, %s now navigates through %s stars! 🌠", $event->author, $repository, $event->stars),

            \sprintf("Looks like %s just snagged the %sth star on %s! No cats were harmed in the making of this star. 😺", $event->author, $event->stars, $repository),
            \sprintf("What's up, %s? Thanks to your star, %s is almost as popular as cat sandwiches on Melmac—now with %s stars! 🐱", $event->author, $repository, $event->stars),
            \sprintf("Yum! %s, your star on %s tastes as good as a cat—just kidding! We're at %s stars now! 🍽️", $event->author, $repository, $event->stars),
            \sprintf("Hey %s, did you hear? %s just got its %sth star! More fun than a backyard BBQ on Melmac! 🍖", $event->author, $repository, $event->stars),
            \sprintf("Who needs cats when you have stars? Thanks, %s, for giving %s its %sth star! 🌟", $event->author, $repository, $event->stars),
            \sprintf("Stars are the new cats, %s! Thanks for adding one to %s, bringing us to %s stars! 😼", $event->author, $repository, $event->stars),
            \sprintf("Mmm, delicious! %s just added a tasty star to %s, making %s stars. Better than cat casserole! 🍲", $event->author, $repository, $event->stars),
            \sprintf("Just like catnip for ALF, your star on %s is irresistible, %s! Now we're playing with %s stars! 🐾", $repository, $event->author, $event->stars),
            \sprintf("Watch out, cats! %s is on the prowl, giving %s a shiny new star, total %s! 🌠", $event->author, $repository, $event->stars),
            \sprintf("If I had a cat for every star on %s, I'd be stuffed! Thanks to %s, we now have %s stars! 😹", $repository, $event->author, $event->stars),
            \sprintf("ALF here! Just saw %s drop a star on %s, bringing it to %s stars. This place is cooler than Melmac! 🌍", $event->author, $repository, $event->stars),
            \sprintf("Hey %s, your star on %s just made my day! We're at %s stars and counting, just like my cat jokes! 😜", $event->author, $repository, $event->stars),
            \sprintf("Oh, %s! With that star, %s now has %s stars. If only they were as plentiful as cats on Melmac... 🌌", $event->author, $repository, $event->stars),
            \sprintf("Guess what, %s? %s just got its %sth star! It's like a cat chasing a laser pointer—always more fun! 🐈", $event->author, $repository, $event->stars),
            \sprintf("Zowie! %s, thanks to your star, %s is looking stellar with %s stars! 🚀", $event->author, $repository, $event->stars),
            \sprintf("Cat’s out of the bag, %s! Your star makes %s officially cooler than Melmac with %s stars! 🎩", $event->author, $repository, $event->stars),
            \sprintf("If each star was a cat, %s would be paradise! Great job on adding one more, %s! We're now at %s stars. 🌺", $repository, $event->author, $event->stars),
            \sprintf("Shazbot! %s, that star on %s just blew my Melmacian mind! We've got %s stars now! 💥", $event->author, $repository, $event->stars),
            \sprintf("Hey %s, each star on %s is a reminder that there's something better than eating cats—collecting stars! We're at %s now! 🌟", $event->author, $repository, $event->stars),
            \sprintf("Just like a cat with a ball of yarn, %s can’t stop playing with %s, giving it star number %s! 🧶", $event->author, $repository, $event->stars),
        ];

        dump($phrases[\array_rand($phrases)]);
    }
}
