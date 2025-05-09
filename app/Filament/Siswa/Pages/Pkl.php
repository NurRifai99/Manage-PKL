<?php

namespace App\Filament\Siswa\Pages;

use App\Models\User;
use Filament\Pages\Page;
use Filament\Tables\Columns\Column;
use Filament\Tables\Table;

class Pkl extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.siswa.pages.pkl';


    protected static ?string $title = 'Pkl';


    public function getData(){
           return User::all();
    }

}

