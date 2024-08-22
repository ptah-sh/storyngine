<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StoryResource\Pages;
use App\Filament\Resources\StoryResource\RelationManagers;
use App\Models\Story;
use App\Models\Vendor;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class StoryResource extends Resource
{
    protected static ?string $model = Story::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('headline')->required()->afterStateUpdated(fn ($state, $set) => $set('slug', Str::slug($state . '-' . now()->format('Y-m-d'))))->lazy(),
                Forms\Components\TextInput::make('slug')->readOnly()->required(),
                Forms\Components\Textarea::make('summary')->required(),
                Forms\Components\Group::make([
                    Forms\Components\Select::make('vendor_id')
                        ->preload()
                        ->relationship('vendor', 'name')
                        ->searchable()
                        ->required(),
                    Forms\Components\Radio::make('mood')
                        ->options(['positive' => '😊 Positive', 'neutral' => '😐 Neutral', 'negative' => '😠 Negative'])
                        ->required(),
                ])->columns(2),
                Forms\Components\TextInput::make('source')->url()->required(),
                Forms\Components\DatePicker::make('published_at')->time()->afterStateUpdated(fn ($state, $get, $set) => $set('slug', Str::slug($get('headline') . '-' . \Carbon\Carbon::parse($state)->format('Y-m-d'))))->lazy(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('headline'),
                Tables\Columns\TextColumn::make('slug'),
                Tables\Columns\TextColumn::make('published_at')->dateTime(),
            ])
            ->filters([
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
            'index' => Pages\ListStories::route('/'),
            'create' => Pages\CreateStory::route('/create'),
            'edit' => Pages\EditStory::route('/{record}/edit'),
        ];
    }
}
