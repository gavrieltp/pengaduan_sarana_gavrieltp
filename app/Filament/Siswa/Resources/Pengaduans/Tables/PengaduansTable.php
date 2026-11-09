<?php

namespace App\Filament\Siswa\Resources\Pengaduans\Tables;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PengaduansTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('category.nama')
                    ->label('Kategori')
                    ->searchable(),
                TextColumn::make('lokasi')
                    ->searchable(),
                TextColumn::make('deskripsi')
                    ->label('Aspirasi')
                    ->wrap(),
                TextColumn::make('status')
                    ->badge()
                    ->label('Status penyelesaian'),
                TextColumn::make('feedback')
                    ->label('Umpan balik')
                    ->placeholder('Belum ada umpan balik')
                    ->wrap(),
                TextColumn::make('updated_at')
                    ->label('Progres terakhir')
                    ->since()
                    ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([])
            ->toolbarActions([]);
    }
}
