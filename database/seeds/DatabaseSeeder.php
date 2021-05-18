<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {
        DB::table('user')->insert([
            ['nome' => 'andrea', 'cognome' => 'andreotti', 'email' => 'ciaociao@gmail.com', 'username' => 'andri', 'password' => 'andri', 'data_nascita' => '1999-04-03', 'telefono' => 3387747111, 'sitoweb' => 'ciaociao.it', 'role' => 'user',],
            ['nome' => 'Acompany_SPA', 'cognome' => '', 'email' => 'Acompany_SPA@gmail.com', 'username' => 'Acompany_SPA', 'password' => 'Acompany_SPA', 'data_nascita' => '1999-05-03', 'telefono' => 3386747112, 'sitoweb' => 'Acompany_SPA.it', 'role' => 'company',],
            ['nome' => 'giulio', 'cognome' => 'giulietti', 'email' => 'giuliogiulietti@gmail.com', 'username' => 'giulio', 'password' => 'giulio', 'data_nascita' => '1999-05-03', 'telefono' => 3386747113, 'sitoweb' => 'giulio.it', 'role' => 'user',],
            ['nome' => 'Bcompany_SPA', 'cognome' => '', 'email' => 'Bcompany_SPA@gmail.com', 'username' => 'Bcompany_SPA', 'password' => 'Bcompany_SPA', 'data_nascita' => '1999-05-03', 'telefono' => 3386747114, 'sitoweb' => 'Bcompany_SPA.it', 'role' => 'company',],
            ['nome' => 'Ccompany_SPA', 'cognome' => '', 'email' => 'Ccompany_SPA@gmail.com', 'username' => 'Ccompany_SPA', 'password' => 'Ccompany_SPA', 'data_nascita' => '1999-05-03', 'telefono' => 3386747115, 'sitoweb' => 'Ccompany_SPA.it', 'role' => 'company',],
            ['nome' => 'lucio', 'cognome' => 'lucetti', 'email' => 'luciolucetti@gmail.com', 'username' => 'lucio', 'password' => 'lucio', 'data_nascita' => '1999-05-03', 'telefono' => 3386747116, 'sitoweb' => 'lucio.it', 'role' => 'user',],
            ['nome' => 'riccardo', 'cognome' => 'ricchetti', 'email' => 'riccardoricchetti@gmail.com', 'username' => 'riccardo', 'password' => 'riccardo', 'data_nascita' => '1999-05-03', 'telefono' => 3386747117, 'sitoweb' => 'ciaociaoo.it', 'role' => 'user',],
            ['nome' => 'admin', 'cognome' => 'admin', 'email' => 'admin@gmail.com', 'username' => 'admin', 'password' => 'adminadmin', 'data_nascita' => '1998-05-03', 'telefono' => 3386747118, 'sitoweb' => 'adminadmin.it', 'role' => 'admin',],
        ]);


        DB::table('event')->insert([
            ['EventId' => 1, 'descrizione' => 'l evento sara tenuto dalla compagnia Acompany_spa e si terra nel pieno di sirolo...',
                'programma' => 'il programma e....', 'societa' => 'Acompany_SPA', 'luogo' => 'sirolo', 'data' => '2020-04-02', 'nome' => 'Siroloinfesta', 'bigl_disp' => 50, 'bigl_acquis' => 10, 'Xcord' => 7.12310, 'Ycord' => 5.12340, 'prezzo' => 5.5, 'image' => 'id1.jpg',],
            ['EventId' => 2, 'descrizione' => 'l evento sara tenuto dalla compagnia Acompany_spa e si terra nel pieno di numana......',
                'programma' => 'il programma el....', 'societa' => 'Acompany_SPA', 'luogo' => 'numana', 'data' => '2021-04-03', 'nome' => 'Numanainfesta', 'bigl_disp' => 60, 'bigl_acquis' => 20, 'Xcord' => 7.12320, 'Ycord' => 5.42340, 'prezzo' => 7.70, 'image' => 'id2.jpg',],
            ['EventId' => 3, 'descrizione' => 'l evento sara tenuto dalla compagnia Acompany_spa e si terra nel pieno di marcelli......',
                'programma' => 'il programma e....', 'societa' => 'Acompany_SPA', 'luogo' => 'marcelli', 'data' => '2020-04-03', 'nome' => 'Marcelliinfesta', 'bigl_disp' => 50, 'bigl_acquis' => 10, 'Xcord' => 7.12310, 'Ycord' => 5.12340, 'prezzo' => 5.5, 'image' => 'id3.jpg',],
            ['EventId' => 4, 'descrizione' => 'l evento sara tenuto dalla compagnia Acompany_spa e si terra nel pieno di ancona......',
                'programma' => 'il programma e....', 'societa' => 'Acompany_SPA', 'luogo' => 'ancona', 'data' => '2020-05-03', 'nome' => 'Anconainfesta', 'bigl_disp' => 50, 'bigl_acquis' => 10, 'Xcord' => 7.12310, 'Ycord' => 5.12340, 'prezzo' => 5.5, 'image' => 'id4.jpg',],
            ['EventId' => 5, 'descrizione' => 'l evento sara tenuto dalla compagnia Acompany_spa e si terra nel pieno di recanati......',
                'programma' => 'il programma e....', 'societa' => 'Acompany_SPA', 'luogo' => 'recanati', 'data' => '2020-04-01', 'nome' => 'Recanatiinfesta', 'bigl_disp' => 50, 'bigl_acquis' => 10, 'Xcord' => 7.12310, 'Ycord' => 5.12340, 'prezzo' => 5.5, 'image' => 'id5.jpg',],
            ['EventId' => 6, 'descrizione' => 'l evento sara tenuto dalla compagnia Bcompany_spa e si terra nel pieno di bologna......',
                'programma' => 'il programma e....', 'societa' => 'Bcompany_SPA', 'luogo' => 'bologna', 'data' => '2020-06-03', 'nome' => 'Bolognainfesta', 'bigl_disp' => 50, 'bigl_acquis' => 10, 'Xcord' => 7.12310, 'Ycord' => 5.12340, 'prezzo' => 5.5, 'image' => 'id6.jpg',],
            ['EventId' => 7, 'descrizione' => 'l evento sara tenuto dalla compagnia Bcompany_spa e si terra nel pieno di pisa......',
                'programma' => 'il programma e....', 'societa' => 'Bcompany_SPA', 'luogo' => 'pisa', 'data' => '2020-04-07', 'nome' => 'Pisainfesta', 'bigl_disp' => 50, 'bigl_acquis' => 10, 'Xcord' => 7.12310, 'Ycord' => 5.12340, 'prezzo' => 5.5, 'image' => 'id7.jpg',],
            ['EventId' => 8, 'descrizione' => 'l evento sara tenuto dalla compagnia Bcompany_spa e si terra nel pieno di fermo.........',
                'programma' => 'il programma e....', 'societa' => 'Bcompany_SPA', 'luogo' => 'fermo', 'data' => '2020-04-10', 'nome' => 'Fermoinfesta', 'bigl_disp' => 50, 'bigl_acquis' => 10, 'Xcord' => 7.12310, 'Ycord' => 5.12340, 'prezzo' => 5.5, 'image' => 'id8.jpg',],
            ['EventId' => 9, 'descrizione' => 'l evento sara tenuto dalla compagnia Bcompany_spa e si terra nel pieno di Roma.........',
                'programma' => 'il programma e....', 'societa' => 'Bcompany_SPA', 'luogo' => 'roma', 'data' => '2020-10-03', 'nome' => 'Romainfesta', 'bigl_disp' => 50, 'bigl_acquis' => 10, 'Xcord' => 7.12310, 'Ycord' => 5.12340, 'prezzo' => 5.5, 'image' => 'id9.jpg',],
            ['EventId' => 10, 'descrizione' => 'l evento sara tenuto dalla compagnia Ccompany_spa e si terra nel pieno di Milano.........',
                'programma' => 'il programma e....', 'societa' => 'Ccompany_SPA', 'luogo' => 'milano', 'data' => '2020-08-03', 'nome' => 'Milanoinfesta', 'bigl_disp' => 50, 'bigl_acquis' => 10, 'Xcord' => 7.12310, 'Ycord' => 5.12340, 'prezzo' => 5.5, 'image' => 'id10.jpg',],
            ['EventId' => 11, 'descrizione' => 'l evento sara tenuto dalla compagnia Ccompany_spa e si terra nel pieno di castelfidardo............',
                'programma' => 'il programma e....', 'societa' => 'Ccompany_SPA', 'luogo' => 'castelfidardo', 'data' => '2020-09-03', 'nome' => 'Castelfidardoinfesta', 'bigl_disp' => 50, 'bigl_acquis' => 10, 'Xcord' => 7.12310, 'Ycord' => 5.12340, 'prezzo' => 5.5, 'image' => 'id11.jpg',],
            ['EventId' => 12, 'descrizione' => 'l evento sara tenuto dalla compagnia Ccompany_spa e si terra nel pieno di Sirolo............',
                'programma' => 'il programma e....', 'societa' => 'Ccompany_SPA', 'luogo' => 'sirolo', 'data' => '2020-04-14', 'nome' => 'Siroloinfesta2', 'bigl_disp' => 50, 'bigl_acquis' => 10, 'Xcord' => 7.12310, 'Ycord' => 5.12340, 'prezzo' => 5.5, 'image' => 'id12.jpg',],
            ['EventId' => 13, 'descrizione' => 'l evento sara tenuto dalla compagnia Ccompany_spa e si terra nel pieno di Ancona............',
                'programma' => 'il programma e....', 'societa' => 'Ccompany_SPA', 'luogo' => 'ancona', 'data' => '2020-12-03', 'nome' => 'Anconainfesta2', 'bigl_disp' => 50, 'bigl_acquis' => 10, 'Xcord' => 7.12310, 'Ycord' => 5.12340, 'prezzo' => 5.5, 'image' => 'id13.jpg',],
        ]);

        DB::table('ticket')->insert([
            ['TransId' => 1, 'data_acquisto' => '2020-05-12', 'prezzo' => 5.5, 'quantita' => 2, 'username' => 'andri', 'eventid' => 1]
        ]);
    }

}
