<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        DB::table('user')->insert([
            'username' => "lain",
            'avatar' => "https://preview.redd.it/e8cqv5rgfvr91.jpg?auto=webp&s=0c85af69a65c64121a7024c3eb9ce05c222f49f5",
            'email' => "a@a.fr", 
            'password' => Hash::make("aaaaaaaa"),
            "status" => "admin",
        ]);

        DB::table("article")->insert([
            'title' => "Yggdra_Union",
            'intro' => "Yggdra Union: We'll Never Fight Alone[a] is a tactical role-playing game for the Game Boy Advance and PlayStation Portable, developed by Sting Entertainment as the second episode of the Dept. Heaven saga of games. Atlus USA localized and published both versions of the game in North America. 505 Games published the Game Boy Advance version in a limited number of European countries, such as Italy and France. A Nintendo DS side-game was released in Japan on December 3, 2009, as Yggdra Unison: Seiken Buyuuden. An updated version with bonus features was released in Japan for mobile platforms and Nintendo Switch in April 2019 and March 2020, respectively. A Windows version was released in early access on February 6, 2023, with a full release following on July 27, 2023, alongside a western release for Nintendo Switch.
                        The game is a tactical RPG with an overhead view of a 2D map, managing miniature versions of the units. A card system dictating unit movement and potential skills plays into both enemy and ally turns, as well as the \"Union\" formation system, in which massive battles can take place between several platoons. There are also some real time elements included during actual battle sequences, such as being able to control how units attack the enemy.",
            'locked' => 0,
            'user_id' => 1,
            "editor_id" => 1,
        ]);


        DB::table("section")->insert([
            "title" => "Gameplay",
            "content" => "The game follows a linear succession of battles. Within each battle, units are displayed on a grid of spaces which decide where the characters can move. The player and the computer take turns in which movements are determined and one attack can be executed against an opposing character. The player may choose to end their turn at any time. Unions are the eponymous game play mechanic. Unlike most games, the player is allowed one attack per turn. Attacks are performed in formations called unions. Most unions involve multiple units, but it is possible to attack with a \"union\" of one unit. Forming unions allows more than one unit to join the battle, allowing for battles between as many as eighty soldiers, grouped into up to five individual battles between two units named 'clashes'. Depending on the gender of the unit, the formation required for a union will be different. Males have an x-shaped formation, whereas females have a plus-shaped formation. Linked unions, which become available during the fifteenth battlefield, allow units within the core union to apply their union pattern to extend the overall union.",
            "article_id" => 1,

        ]);

        DB::table("section")->insert([
            "title" => "Plot",
            "content" => 
"######Story

The story of Yggdra Union starts with the Princess of Fantasinia, Yggdra, fleeing her besieged home with the family heirloom, the Holy Sword Gran Centurio. Throughout the story, the idea that justice lies with the Holy Sword[1] is used to drive Yggdra and her army forward through their plight, as well as to provide explanation to them for the acts they commit. It is constantly used as justification for their acts, particularly those situations in which civilians are slaughtered during the war.

The story mainly details Yggdra's reclamation of her kingdom from the Bronquian Empire, and her eventual uniting of the entire world under her sovereignty, with quite a few stops along the way leading to an intricate and involving plot. The ending is split off based on the player's actions, one ending essentially being a game over and the other two being open ended with Yggdra either pursuing the ideal that justice lies with the holy sword, or sacrificing it to achieve universal peace.

In the PSP version, additions were made to the story that further develop the Dept. Heaven universe and story, deeply tying the game into mythological elements first developed by Riviera, with the more direct appearance of Diviners, and Grim Angels, and passing mention of Malice, Hector and The Seven Magi. With the events of Yggdra Union's PSP ending where the Royal Army attack Ragnarok, this is now cemented into the canon storyline, marking Yggdra Union as a prequel to Riviera: The Promised Land.
[home](/)",
            "article_id" => 1,
        ]);


        DB::table("image")->insert([
            "path" => "https://upload.wikimedia.org/wikipedia/en/a/a1/Yggdra_Union_-_We%27ll_Never_Fight_Alone_Coverart.png",
            "description" => "Cover art of the GBA version.",
            "section_id" => 1,
        ]);

        DB::table("image")->insert([
            "path" => "https://www.retroplace.com/pics/psp/packshots/136790--yggdra-union-well-never-fight-alone.png",
            "description" => "Cover art of the PSP version.",
            "section_id" => 1,
        ]);

        
        DB::table("image")->insert([
            "path" => "https://lparchive.org/Yggdra-Union/Update%2017/1-BF14-001.jpg",
            "description" => "Map of the world",
            "section_id" => 2,
        ]);

        DB::table("image")->insert([
            "path" => "https://tcrf.net/images/d/d0/YggdraUnion-title.png",
            "description" => "Title Screen",
            "article_id" => 1,
        ]);

        DB::table("comment")->insert([
            "post" => "everything seems to be in order, any thoughts?",
            "user_id" => 1,
            "article_id" => 1,
        ]);

        DB::table("comment")->insert([
            "post" => "Will add more content when I get more free time, lol.",
            "user_id" => 1,
            "article_id" => 1,
        ]);
    }
}
