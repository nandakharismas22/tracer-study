<?php

namespace App\Imports;

use App\Models\Alumni;
use App\Models\Perusahaan;
use App\Models\Universitas;
use App\Models\User;
use Exception;
use Hash;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\ToCollection;

class AlumniImport implements ToCollection
{
    public function collection(Collection $rows)
    {
        DB::beginTransaction();

        set_time_limit(600); 

        try {
            foreach ($rows as $index => $row) {
                Log::info($index . '-' .  $row);

                $nisn = str_replace(' ', '', strtoupper($row[0] . $row[1]. $row[2]. $row[3] . $row[4]));
                $linear = $row[5];
                $pengguna = User::where('username', $nisn)
                ->first();

                if($pengguna && $linear){
                    $alumni = Alumni::where('pengguna_uuid', $pengguna->uuid)
                    ->first();

                    $check = Alumni::where('uuid', $alumni->uuid)
                    ->whereHas('universitas')
                    ->first();

                    if($check){
                        DB::table('alumni_universitas')
                        ->where('alumni_uuid', $alumni->uuid)
                        ->update([
                            'linear' => 1
                        ]);
                    } else {
                        DB::table('alumni_perusahaan')
                        ->where('alumni_uuid', $alumni->uuid)
                        ->update([
                            'linear' => 1
                        ]);
                    }
                } 
            }
        // foreach ($rows as $index => $row) {
        //     if($index > 1){
        //         Log::info($index . '-' .  $row);

        //         $jenisKelamin = strtoupper($row[0]);
        //         $nama = strtoupper($row[1]);
        //         $nisn = strtoupper($row[2] . $row[3] . $row[4] . $row[5] . $row[6]);
        //         $instansi = str_replace(')', '', strtoupper($row[12]));

        //         $pengguna = User::create(([
        //             'username' => $nisn,
        //             'password' => Hash::make('smenda123')
        //         ]));

        //         $alumni = Alumni::create([
        //             'pengguna_uuid' => $pengguna->uuid,
        //             'nama' => $nama,
        //             'jenis_kelamin' => $jenisKelamin
        //         ]);

        //         if($row[7] == '√' || $row[9] == '√'){
        //             $wirausaha = (str_contains($instansi, 'wirausaha') || $row[9]) == '√' ? 1 : 0;

        //             $perusahaan = Perusahaan::where('nama', $instansi)
        //             ->first();

        //             if(!$perusahaan){
        //                 $perusahaan = Perusahaan::create([
        //                     'nama' => $instansi
        //                 ]);
        //             }

        //             $perusahaan->alumni()->attach($alumni->uuid, ['wirausaha' => $wirausaha]);

        //         } else if ($row[8] == '√'){
        //             if (str_contains($instansi, '-')){
        //                 $instansi = explode('-', $instansi);
        //                 $jurusan = $instansi[1];
        //                 $instansi = $instansi[0];
        //             } else {
        //                 $instansi = explode('(', $instansi);

        //                 if(count($instansi) > 1){
        //                     if($index > 465){
        //                         $jurusan = trim($instansi[1]);
        //                         $instansi = trim($instansi[0]);
        //                     } else {
        //                         $jurusan = trim(preg_replace('/[0-9]/', '', $instansi[0]));
        //                         $instansi = trim(count($instansi) == 2 ? $instansi[1] : $instansi[2]);
        //                     }
    
        //                     $universitas = Universitas::where('nama', $instansi)
        //                     ->first();
    
        //                     if(!$universitas){
        //                         $universitas = Universitas::create([
        //                             'nama' => $instansi
        //                         ]);
        //                     }
    
        //                     $universitas->alumni()->attach($alumni->uuid, ['jurusan' => $jurusan]);
        //                 }
        //             }
        //         }
        //     }
        // }
        DB::commit();
        } catch(Exception $e){
            DB::rollBack();
        }
    }
}
