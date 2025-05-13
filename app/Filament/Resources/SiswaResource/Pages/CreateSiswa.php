<?php

namespace App\Filament\Resources\SiswaResource\Pages;

use App\Filament\Resources\SiswaResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use App\Models\User;

class CreateSiswa extends CreateRecord
{
    protected static string $resource = SiswaResource::class;
    
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $user = User::create([
            'name' => $data['nama'],
            'email' => $data['nis'] . '@sija.com',
            'password' => bcrypt($data['password']),
        ]);

        $user->assignRole('Siswa');
        $data['user_id'] = $user->id;

        unset($data['email'], $data['password']);
        
        return $data;
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

}
