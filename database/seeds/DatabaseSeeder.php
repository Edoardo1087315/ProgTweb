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
                'programma' => 'il programma e....', 'societa' => 'Acompany_SPA', 'luogo' => 'Marche', 'data' => '2020-04-02', 'orario' => '13:00:00', 'nome' => 'Siroloinfesta', 'bigl_tot' => 50, 'bigl_acquis' => 30, 'Xcord' => 43.52326767058058, 'Ycord' => 13.61859637087946, 'prezzo' => 5.5, 'image' => 'id1.jpg', 'categoria' => 'fiera',],
            ['EventId' => 2, 'descrizione' => 'l evento sara tenuto dalla compagnia Acompany_spa e si terra nel pieno di numana......',
                'programma' => 'il programma el....', 'societa' => 'Acompany_SPA', 'luogo' => 'Marche', 'data' => '2021-04-03', 'orario' => '14:00:00', 'nome' => 'Numanainfesta', 'bigl_tot' => 60, 'bigl_acquis' => 20, 'Xcord' => 43.51377802112318,  'Ycord' =>  13.621389640095025, 'prezzo' => 7.70, 'image' => 'id2.jpg', 'categoria' => 'concerto',],
            ['EventId' => 3, 'descrizione' => 'l evento sara tenuto dalla compagnia Acompany_spa e si terra nel pieno di marcelli......',
                'programma' => 'il programma e....', 'societa' => 'Acompany_SPA', 'luogo' => 'Marche', 'data' => '2020-04-03', 'orario' => '16:00:00', 'nome' => 'Marcelliinfesta', 'bigl_tot' => 50, 'bigl_acquis' => 35, 'Xcord' => 43.49270264554944, 'Ycord' =>  13.627656476192364, 'prezzo' => 5.5, 'image' => 'id3.jpg', 'categoria' => 'fiera',],
            ['EventId' => 4, 'descrizione' => 'l evento sara tenuto dalla compagnia Acompany_spa e si terra nel pieno di ancona......',
                'programma' => 'il programma e....', 'societa' => 'Acompany_SPA', 'luogo' => 'Marche', 'data' => '2020-05-03', 'orario' => '11:00:00', 'nome' => 'Anconainfesta', 'bigl_tot' => 50, 'bigl_acquis' => 28, 'Xcord' => 43.61684042232536,  'Ycord' => 13.517164188104534, 'prezzo' => 5.5, 'image' => 'id4.jpg', 'categoria' => 'fiera',],
            ['EventId' => 5, 'descrizione' => 'l evento sara tenuto dalla compagnia Acompany_spa e si terra nel pieno di recanati......',
                'programma' => 'il programma e....', 'societa' => 'Acompany_SPA', 'luogo' => 'Marche', 'data' => '2020-04-01', 'orario' => '12:00:00', 'nome' => 'Recanatiinfesta', 'bigl_tot' => 50, 'bigl_acquis' => 10, 'Xcord' => 43.401981976197696, 'Ycord' =>  13.550544369408698, 'prezzo' => 5.5, 'image' => 'id5.jpg', 'categoria' => 'opera',],
            ['EventId' => 6, 'descrizione' => 'l evento sara tenuto dalla compagnia Bcompany_spa e si terra nel pieno di bologna......',
                'programma' => 'il programma e....', 'societa' => 'Bcompany_SPA', 'luogo' => 'Emilia Romagna', 'data' => '2020-06-03', 'orario' => '12:00:00', 'nome' => 'Bolognainfesta', 'bigl_tot' => 50, 'bigl_acquis' => 10, 'Xcord' => 44.4912593790442, 'Ycord' =>  11.341633881953609, 'prezzo' => 5.5, 'image' => 'id6.jpg', 'categoria' => 'opera',],
            ['EventId' => 7, 'descrizione' => 'l evento sara tenuto dalla compagnia Bcompany_spa e si terra nel pieno di pisa......',
                'programma' => 'il programma e....', 'societa' => 'Bcompany_SPA', 'luogo' => 'Toscana', 'data' => '2020-04-07', 'orario' => '17:00:00', 'nome' => 'Pisainfesta', 'bigl_tot' => 50, 'bigl_acquis' => 10, 'Xcord' => 43.71574430158182,  'Ycord' => 10.395286094714342, 'prezzo' => 5.5, 'image' => 'id7.jpg', 'categoria' => 'musica dal vivo',],
            ['EventId' => 8, 'descrizione' => 'l evento sara tenuto dalla compagnia Bcompany_spa e si terra nel pieno di fermo.........',
                'programma' => 'il programma e....', 'societa' => 'Bcompany_SPA', 'luogo' => 'Marche', 'data' => '2020-04-10', 'orario' => '18:00:00', 'nome' => 'Fermoinfesta', 'bigl_tot' => 50, 'bigl_acquis' => 10, 'Xcord' => 43.16100567679694,  'Ycord' => 13.715903917768545, 'prezzo' => 5.5, 'image' => 'id8.jpg','categoria' => 'musica dal vivo',],
            ['EventId' => 9, 'descrizione' => 'l evento sara tenuto dalla compagnia Bcompany_spa e si terra nel pieno di Roma.........',
                'programma' => 'il programma e....', 'societa' => 'Bcompany_SPA', 'luogo' => 'Lazio', 'data' => '2020-10-03', 'orario' => '19:00:00', 'nome' => 'Romainfesta', 'bigl_tot' => 50, 'bigl_acquis' => 10, 'Xcord' => 41.90185246953253, 'Ycord' =>  12.461605832526827, 'prezzo' => 5.5, 'image' => 'id9.jpg','categoria' => 'concerto',],
            ['EventId' => 10, 'descrizione' => 'l evento sara tenuto dalla compagnia Ccompany_spa e si terra nel pieno di Milano.........',
                'programma' => 'il programma e....', 'societa' => 'Ccompany_SPA', 'luogo' => 'Lombardia', 'data' => '2020-08-03', 'orario' => '12:00:00', 'nome' => 'Milanoinfesta', 'bigl_tot' => 50, 'bigl_acquis' => 10, 'Xcord' => 45.46783847345808, 'Ycord' => 9.182281474315426, 'prezzo' => 5.5, 'image' => 'id10.jpg','categoria' => 'concerto',],
            ['EventId' => 11, 'descrizione' => 'l evento sara tenuto dalla compagnia Ccompany_spa e si terra nel pieno di castelfidardo............',
                'programma' => 'il programma e....', 'societa' => 'Ccompany_SPA', 'luogo' => 'Marche', 'data' => '2020-09-03', 'orario' => '20:00:00', 'nome' => 'Castelfidardoinfesta', 'bigl_tot' => 50, 'bigl_acquis' => 10, 'Xcord' => 43.46366342840654, 'Ycord' => 13.549512050402843, 'prezzo' => 5.5, 'image' => 'id11.jpg', 'categoria' => 'teatro',],
            ['EventId' => 12, 'descrizione' => 'l evento sara tenuto dalla compagnia Ccompany_spa e si terra nel pieno di Sirolo............',
                'programma' => 'il programma e....', 'societa' => 'Ccompany_SPA', 'luogo' => 'Marche', 'data' => '2020-04-14', 'orario' => '21:00:00', 'nome' => 'Siroloinfesta2', 'bigl_tot' => 50, 'bigl_acquis' => 10, 'Xcord' => 43.52326767058058, 'Ycord' => 13.61859637087946, 'prezzo' => 5.5, 'image' => 'id12.jpg', 'categoria' => 'teatro',],
            ['EventId' => 13, 'descrizione' => 'l evento sara tenuto dalla compagnia Ccompany_spa e si terra nel pieno di Ancona............',
                'programma' => 'il programma e....', 'societa' => 'Ccompany_SPA', 'luogo' => 'Marche', 'data' => '2020-12-03', 'orario' => '22:00:00', 'nome' => 'Anconainfesta2', 'bigl_tot' => 50, 'bigl_acquis' => 10, 'Xcord' => 43.61684042232536,  'Ycord' => 13.517164188104534, 'prezzo' => 5.5, 'image' => 'id13.jpg', 'categoria' => 'fiera',],
        ]);

        DB::table('ticket')->insert([
            ['TransId' => 1, 'data_acquisto' => '2020-05-12', 'prezzo' => 5.5, 'quantita' => 2, 'username' => 'andri', 'eventid' => 1]
        ]);
    }

}
