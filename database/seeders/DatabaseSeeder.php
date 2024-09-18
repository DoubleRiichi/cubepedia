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
            'username' => "admin",
            'avatar' => "default/avatars/admin.png",
            'email' => "admin@admin.fr", 
            'password' => Hash::make("adminadmin"),
            "status" => "admin",
            "created_at" => now(),
            "updated_at" => now(),
        ]);

        DB::table('user')->insert([
            'username' => "editor",
            'avatar' => "default/avatars/editor.jpg",
            'email' => "editor@editor.fr", 
            'password' => Hash::make("editoreditor"),
            "status" => "editor",
            "created_at" => now(),
            "updated_at" => now(),
        ]);

        DB::table('user')->insert([
            'username' => "user",
            'avatar' => "default/avatars/user.png",
            'email' => "user@user.fr", 
            'password' => Hash::make("useruser"),
            "status" => "user",
            "created_at" => now(),
            "updated_at" => now(),
        ]);

        DB::table("article")->insert([
            'title' => "C++",
            'intro' => "C++ (pronounced **\"C plus plus\"** and sometimes abbreviated as CPP) is a high-level, general-purpose programming language created by Danish computer scientist Bjarne Stroustrup. First released in 1985 as an extension of the C programming language, it has since expanded significantly over time; as of 1997, C++ has object-oriented, generic, and functional features, in addition to facilities for low-level memory manipulation for systems like microcomputers or to make operating systems like Linux or Windows. It is usually implemented as a compiled language, and many vendors provide C++ compilers, including the Free Software Foundation, LLVM, Microsoft, Intel, Embarcadero, Oracle, and IBM.

C++ was designed with systems programming and embedded, resource-constrained software and large systems in mind, with performance, efficiency, and flexibility of use as its design highlights. C++ has also been found useful in many other contexts, with key strengths being software infrastructure and resource-constrained applications, including desktop applications, video games, servers (e.g., e-commerce, web search, or databases), and performance-critical applications (e.g., telephone switches or space probes).

C++ is standardized by the *International Organization for Standardization* (ISO), with the latest standard version ratified and published by ISO in December 2020 as ISO/IEC 14882:2020 (informally known as C++20). The C++ programming language was initially standardized in 1998 as ISO/IEC 14882:1998, which was then amended by the C++03, C++11, C++14, and C++17 standards. The current C++20 standard supersedes these with new features and an enlarged standard library. Before the initial standardization in 1998, C++ was developed by Stroustrup at Bell Labs since 1979 as an extension of the C language; he wanted an efficient and flexible language similar to C that also provided high-level features for program organization.Since 2012, C++ has been on a three-year release schedule with C++23 as the next planned standard.",
            'locked' => 0,
            'user_id' => 1,
            "editor_id" => 1,
            "created_at" => now(),
            "updated_at" => now(),
        ]);


        DB::table("section")->insert([
            "title" => "History",
            "content" => "In 1979, Bjarne Stroustrup, a Danish computer scientist, began work on \"C with Classes\", the predecessor to C++. The motivation for creating a new language originated from Stroustrup's experience in programming for his PhD thesis. Stroustrup found that Simula had features that were very helpful for large software development, but the language was too slow for practical use, while BCPL was fast but too low-level to be suitable for large software development. When Stroustrup started working in AT&T Bell Labs, he had the problem of analyzing the UNIX kernel with respect to distributed computing. Remembering his PhD experience, Stroustrup set out to enhance the C language with Simula-like features. C was chosen because it was general-purpose, fast, portable, and widely used. In addition to C and Simula's influences, other languages influenced this new language, including ALGOL 68, Ada, CLU, and ML.

Initially, Stroustrup's \"C with Classes\" added features to the C compiler, Cpre, including classes, derived classes, strong typing, inlining, and default arguments.

In 1982, Stroustrup started to develop a successor to C with Classes, which he named \"C++\" (++ being the increment operator in C) after going through several other names. New features were added, including virtual functions, function name and operator overloading, references, constants, type-safe free-store memory allocation (new/delete), improved type checking, and BCPL-style single-line comments with two forward slashes (//). Furthermore, Stroustrup developed a new, standalone compiler for C++, Cfront.

In 1984, Stroustrup implemented the first stream input/output library. The idea of providing an output operator rather than a named output function was suggested by Doug McIlroy (who had previously suggested Unix pipes).

In 1985, the first edition of The C++ Programming Language was released, which became the definitive reference for the language, as there was not yet an official standard. The first commercial implementation of C++ was released in October of the same year.

In 1989, C++ 2.0 was released, followed by the updated second edition of The C++ Programming Language in 1991. New features in 2.0 included multiple inheritance, abstract classes, static member functions, const member functions, and protected members. In 1990, The Annotated C++ Reference Manual was published. This work became the basis for the future standard. Later feature additions included templates, exceptions, namespaces, new casts, and a Boolean type.

In 1998, C++98 was released, standardizing the language, and a minor update (C++03) was released in 2003.

After C++98, C++ evolved relatively slowly until, in 2011, the C++11 standard was released, adding numerous new features, enlarging the standard library further, and providing more facilities to C++ programmers. After a minor C++14 update released in December 2014, various new additions were introduced in C++17.[26] After becoming finalized in February 2020, a draft of the C++20 standard was approved on 4 September 2020, and officially published on 15 December 2020.

On January 3, 2018, Stroustrup was announced as the 2018 winner of the Charles Stark Draper Prize for Engineering, \"for conceptualizing and developing the C++ programming language\".

As of December 2022, C++ ranked third on the TIOBE index, surpassing Java for the first time in the history of the index. It ranks third, after Python and C.",
            "article_id" => 1,
            "created_at" => now(),
            "updated_at" => now(),

    ]);

        DB::table("section")->insert([
            "title" => "Philosophy",
            "content" => 
"Throughout C++'s life, its development and evolution has been guided by a set of principles:
- It must be driven by actual problems and its features should be immediately useful in real world programs.
- Every feature should be implementable (with a reasonably obvious way to do so).
- Programmers should be free to pick their own programming style, and that style should be fully supported by C++.
- Allowing a useful feature is more important than preventing every possible misuse of C++.
- It should provide facilities for organising programs into separate, well-defined parts, and provide facilities for combining separately developed parts.
- No implicit violations of the type system (but allow explicit violations; that is, those explicitly requested by the programmer).
- User-created types need to have the same support and performance as built-in types.
- Unused features should not negatively impact created executables (e.g. in lower performance).
- There should be no language beneath C++ (except assembly language).
- C++ should work alongside other existing programming languages, rather than fostering its own separate and incompatible programming environment.
- If the programmer's intent is unknown, allow the programmer to specify it by providing manual control.",
            "article_id" => 1,
            "created_at" => now(),
            "updated_at"=> now(),
        ]);


    DB::table("image")->insert(
        [
            "path" => "default/CPP/logo.png",
            "text" => "C++'s logo",
            "description" => "logo C++",
            "article_id" => 1,
            "section_id" => null,
            "created_at" => now(),
            "updated_at"=> now(),
        ]);

    DB::table("image")->insert(
        [
            "path" => "default/CPP/bjarne.jpg",
            "text" => "Bjarne Stroustrup, the creator of C++, in his AT&T New Jersey office, c.2000",
            "description" => "Bjarne Stroustrup, the creator of C++",
            "article_id" => null,
            "section_id" => 1,
            "created_at" => now(),
            "updated_at"=> now(),
        ]);

    DB::table("image")->insert(
        [
            "path" => "default/CPP/quiz.jpg",
            "text" => "A quiz on C++11 features being given in Paris in 2015",
            "description" => "C++ quiz given in paris",
            "article_id" => null,
            "section_id" => 1,
            "created_at" => now(),
            "updated_at"=> now(),
        ]);

    }


}
