<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    // public static function canAccess(): bool
    // {
    //     return auth()->user()->hasRole('super_admin');
    // }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                TextInput::make('name')
                ->required()
                ->label('Name'),
                TextInput::make('email')
                    ->required()
                    ->email()
                    ->label('Email'),
                TextInput::make('password')
                    ->required()
                    ->label('Password')
                    ->dehydrated(fn ($state) => !empty($state))
                    ->maxLength(255),
                TextInput::make('ni')
                    ->label('NI(Nomor Induk)')
                    ->minLength(5)
                    ->maxLength(255),
                TextInput::make('kontak')
                    ->label('Kontak')
                    ->maxLength(255),
                TextInput::make('alamat'),
                Select::make('role')
                    ->relationship('roles', 'name')
                    ->preload(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('name')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('roles.name')
                    ->label('Role')
                    ->sortable()
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
