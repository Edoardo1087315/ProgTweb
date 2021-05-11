<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user')->insert([
            ['nome' => 'andrea', 'cognome' => 'andreotti', 'email' => 'ciaociao@gmail.com', 'username' => 'andri', 'password' => 'andri', 'data_nascita' =>1999-04-03,'telefono' => 3387747111,'sitoweb' => 'ciaociao.it','role' => 1,],
            ['nome' => 'marco', 'cognome' => 'marchetti', 'email' => 'ciaociao2@gmail.com', 'username' => 'marco', 'password' => 'marco', 'data_nascita' =>1999-05-03,'telefono' => 3386747111,'sitoweb' => 'ciaociaoo.it','role' => 2,]
             ]);
   

        DB::table('event')->insert([
            ['ID' => 0, 'descrizione' => 'ciaociaoquestoeventosara...',
                'programma' => 'il programma e....', 'societa' => 'acem', 'luogo' => 'sirolo', 'data' =>2020-04-03, 'nome' => 'nomeevento', 'bigl_disp' => 50, 'bigl_acquis' => 10, 'Xcord' => 7.12310, 'Ycord' => 5.12340,  'prezzo' => 5.5,],
            ['ID' => 1, 'descrizione' => 'ciaociaoquestoeventosara...',
                'programma' => 'il programma e....', 'societa' => 'acem', 'luogo' => 'sirolo', 'data' =>2021-04-03, 'nome' => 'nomeevento', 'bigl_disp' => 50, 'bigl_acquis' => 10, 'Xcord' => 7.12310, 'Ycord' => 5.12340,  'prezzo' => 5.5,]
            
        ]);
    }
   }
