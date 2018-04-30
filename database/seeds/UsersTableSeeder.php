<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder {

    public function run() {
        //
        $user = new App\User;
        $user->email = 'judge@admin';
        $user->password = bcrypt('123456');
        $user->first_name = 'Judge';
        $user->last_name = 'Champhole';
        $user->address = 'asdasdasdasd';
        $user->birthday = '1997-02-02';
        $user->phone = '0955555555';
        $user->image = '';
        $user->type = 'administrator';
        $user->is_vertified = true;
        $user->is_enabled = true;
        $user->save();

        $user = new App\User;
        $user->email = 'poom@com';
        $user->password = bcrypt('123456');
        $user->first_name = 'Wongpiwat';
        $user->last_name = 'Sangiam';
        $user->address = 'Bangkok, Thailand';
        $user->birthday = '1997-02-02';
        $user->phone = '0955555555';
        $user->type = 'seller';
        $user->image = '';
        $user->is_vertified = true;
        $user->is_enabled = true;
        $user->save();



        $user = new App\User;
        $user->email = 'nut@hotmail.com';
        $user->password = bcrypt('123456');
        $user->first_name = 'supanut';
        $user->last_name = 'thiensuwan';
        $user->address = '19/3 ชุมชน นิรันดร์ ถ.โกศลมหาราช ต.วศิล อ.เมือง จ.เชียงใหม่ 13049 ';
        $user->birthday = '1996-02-02';
        $user->phone = '0830327834';
        $user->type = 'administrator';
        $user->image = '';
        $user->is_vertified = true;
        $user->is_enabled = true;
        $user->save();


        $user = new App\User;
        $user->email = 'surat@hotmail.com';
        $user->password = bcrypt('123456');
        $user->first_name = 'Surat';
        $user->last_name = 'Panittrakul';
        $user->address = '158/3 หมู่ 2 ตำบนบางตะบูนออก อำเภอบ้านแหลม จังหวัดเพชรบุรี 76110';
        $user->birthday = '2003-05-02';
        $user->image = '';
        $user->phone = '0839238902';
        $user->type = 'seller';
        $user->is_vertified = true;
        $user->is_enabled = true;
        $user->save();

        $user = new App\User;
        $user->email = 'sacchonwebtech@speed.th';
        $user->password = bcrypt('123456');
        $user->first_name = 'Sacc';
        $user->last_name = 'Chonlewgern';
        $user->address = 'Bang Kruai District Nonthaburi 11130';
        $user->birthday = '1999-09-09';
        $user->phone = '0337678548';
        $user->image = '';
        $user->type = 'administrator';
        $user->is_vertified = true;
        $user->is_enabled = true;
        $user->save();

        $user = new App\User;
        $user->email = 'starfluke@gmail.com';
        $user->password = bcrypt('123456');
        $user->first_name = 'Surat';
        $user->last_name = 'JunOC';
        $user->address = 'Tambon Bang Khanun, Amphoe Bang Kruai Chang Wat Nonthaburi 11130';
        $user->birthday = '2000-01-02';
        $user->phone = '0786543321';
        $user->image = '';
        $user->type = 'administrator';
        $user->is_vertified = true;
        $user->is_enabled = true;
        $user->save();

        $user = new App\User;
        $user->email = 'marvelman@tu.th';
        $user->password = bcrypt('123456');
        $user->first_name = 'Marvel';
        $user->last_name = 'Manmen';
        $user->address = 'Tambon Na Wang Hin, Amphoe Phanat Nikhom Chang Wat Chon Buri 20140';
        $user->birthday = '1997-07-02';
        $user->phone = '0665461277';
        $user->image = '';
        $user->type = 'organizer';
        $user->is_vertified = true;
        $user->is_enabled = true;
        $user->save();

        $user = new App\User;
        $user->email = 'Jayza888@hotmail.com';
        $user->password = bcrypt('123456');
        $user->first_name = 'Jakarin';
        $user->last_name = 'Pondikul';
        $user->address = 'Phanat Nikhom District Chon Buri';
        $user->birthday = '2008-01-09';
        $user->phone = '0787865455';
        $user->image = '';
        $user->type = 'seller';
        $user->is_vertified = true;
        $user->is_enabled = true;
        $user->save();

        $user = new App\User;
        $user->email = 'boom_in@hotmail.com';
        $user->password = bcrypt('123456');
        $user->first_name = 'Anaphat';
        $user->last_name = 'Pombangmark';
        $user->address = 'Tambon Mon Nang, Amphoe Phanat Nikhom Chang Wat Chon Buri 20140';
        $user->birthday = '1967-10-02';
        $user->phone = '0877199259';
        $user->image = '';
        $user->type = 'seller';
        $user->is_vertified = true;
        $user->is_enabled = true;
        $user->save();

        $user = new App\User;
        $user->email = 'punch_huaterk@pra.ch';
        $user->password = bcrypt('123456');
        $user->first_name = 'Nattanon';
        $user->last_name = 'Bunyasing';
        $user->address = 'Lat Bua Luang District Phra Nakhon Si Ayutthaya';
        $user->birthday = '1997-06-10';
        $user->phone = '0876672133';
        $user->image = '';
        $user->type = 'organizer';
        $user->is_vertified = true;
        $user->is_enabled = true;
        $user->save();

        $user = new App\User;
        $user->email = '11userfake@fake.com';
        $user->password = bcrypt('123456');
        $user->first_name = 'Umakorn';
        $user->last_name = 'Boychobmark';
        $user->address = 'Lat Yao District Nakhon Sawan';
        $user->birthday = '1995-03-02';
        $user->phone = '0673345123';
        $user->image = '';
        $user->type = 'seller';
        $user->is_vertified = true;
        $user->is_enabled = true;
        $user->save();

        $user = new App\User;
        $user->email = 'thetoyke@hotmail.com';
        $user->password = bcrypt('123456');
        $user->first_name = 'Toy';
        $user->last_name = 'DuckStation';
        $user->address = 'Nong Bua Lam Phu';
        $user->birthday = '1997-02-02';
        $user->phone = '0978555355';
        $user->image = '';
        $user->type = 'organizer';
        $user->is_vertified = true;
        $user->is_enabled = true;
        $user->save();

        $user = new App\User;
        $user->email = 'ggdragon99@gmail.com';
        $user->password = bcrypt('123456');
        $user->first_name = 'Jarukio';
        $user->last_name = 'Dego';
        $user->address = 'Lom Kao District Phetchabun';
        $user->birthday = '1977-07-06';
        $user->phone = '0897787676';
        $user->image = '';
        $user->type = 'organizer';
        $user->is_vertified = true;
        $user->is_enabled = true;
        $user->save();

        $user = new App\User;
        $user->email = 'kannonroksud@webtech.ku';
        $user->password = bcrypt('123456');
        $user->first_name = 'Kanoon';
        $user->last_name = 'Rokrakkernjud';
        $user->address = 'Mueang Ratchaburi District Ratchaburi';
        $user->birthday = '2011-11-09';
        $user->phone = '0781741313';
        $user->image = '';
        $user->type = 'organizer';
        $user->is_vertified = true;
        $user->is_enabled = true;
        $user->save();


        // factory(App\User::class, 9)->create();

    }
}
