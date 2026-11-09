<?php

namespace App\Filament\Siswa\Resources\Pengaduans;

use App\Filament\Siswa\Resources\Pengaduans\Pages\ListPengaduans;
use App\Filament\Siswa\Resources\Pengaduans\Pages\CreatePengaduan;
use App\Filament\Siswa\Resources\Pengaduans\Schemas\PengaduanForm;
use App\Filament\Siswa\Resources\Pengaduans\Tables\PengaduansTable;
use App\Models\Pengaduan;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class PengaduanResource extends Resource
{
    protected static ?string $model = Pengaduan::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $navigationLabel = 'Riwayat Aspirasi';

    protected static ?string $recordTitleAttribute = 'lokasi';

    protected static ?string $modelLabel = 'aspirasi';

    protected static ?string $pluralModelLabel = 'riwayat aspirasi';

    public static function form(Schema $schema): Schema
    {
        return PengaduanForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PengaduansTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->where('user_id', auth()->id());
    }

    public static function canViewAny(): bool
    {
        return auth()->user()?->role === 'siswa';
    }

    public static function canCreate(): bool
    {
        return auth()->user()?->role === 'siswa';
    }

    public static function canView(Model $record): bool
    {
        return auth()->user()?->role === 'siswa'
            && (int) $record->user_id === (int) auth()->id();
    }

    public static function canEdit(Model $record): bool
    {
        return false;
    }

    public static function canDelete(Model $record): bool
    {
        return false;
    }

    public static function getPages(): array
    {
        return [
            'index' => ListPengaduans::route('/'),
            'create' => CreatePengaduan::route('/create'),
        ];
    }
}
