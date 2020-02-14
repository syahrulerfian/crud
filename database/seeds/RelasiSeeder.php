<?php

use Illuminate\Database\Seeder;
use App\Dosen;
use App\Hobi;
use App\Mahasiswa;
use App\Wali;
class RelasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mahasiswas')->delete();
        DB::table('walis')->delete();
        DB::table('dosens')->delete();
        DB::table('hobis')->delete();
        DB::table('mahasiswa_hobi')->delete();

        //Membuat Data Dosen
        $dosen = Dosen::create(array(
            'nipd' => '123456789',
            'nama' => 'Abdul Mustafa'
        ));
        $this->command->info('Data Dosen Telah Di Isi');

        //Membuat Data Mahaiswa
        $irsyal = Mahasiswa::create(array(
            'nama' => 'Syahrul',
            'nim'  => '145678999',
            'id_dosen' => $dosen->id
        ));

        $Ntut = Mahasiswa::create(array(
            'nama' => 'Entut Marsinah',
            'nim'  => '145678988',
            'id_dosen' => $dosen->id
        ));

        $Icih = Mahasiswa::create(array(
            'nama' => 'Dindaaa',
            'nim'  => '145678988',
            'id_dosen' => $dosen->id
        ));


        $this->command->info('Data Mahasiswa Berasil Diisi');

        // Membuat Data Wali
        $Dadang = Wali::create(array(
            'nama' => 'dadang peloy',
            'id_mahasiswa' => $irsyal->id

        ));

        $ucup = Wali::create(array(
            'nama' => 'ucup nambo',
            'id_mahasiswa' => $Ntut->id
        ));

        $agus = Wali::create(array(
            'nama' => 'ucup nambo',
            'id_mahasiswa' => $Icih->id
        ));

        $this->command->info('Data Wali Berasil Diisi');

        //Membuat Data Hobi
        $melukis_langit = Hobi::create(array('hobi' => 'Melukis Langit'));
        $mandi_hujan = Hobi::create(array('hobi' => 'Mandi Hujan'));
        $ambyar = Hobi::create(array('hobi' => 'Stalking Mantan'));

        $irsyal->hobi()->attach($melukis_langit->id);
        $irsyal->hobi()->attach($ambyar->id);
        $Ntut->hobi()->attach($mandi_hujan->id);
        $Icih->hobi()->attach($ambyar->id);

        $this->command->info('mahasiswa beserta hobi telah diisi');
        
    }
}
