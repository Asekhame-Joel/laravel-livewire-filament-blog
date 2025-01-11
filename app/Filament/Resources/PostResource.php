<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Filament\Resources\PostResource\RelationManagers;
use App\Models\Category;
use App\Models\Post;
use Filament\Actions\SelectAction;
use Filament\Forms;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make([
                    TextInput::make('title')->maxLength(255)->required()
                        ->live(onBlur: true)
                        ->afterStateUpdated(function (forms\Set $set, ?string $state) {
                            if ($state === 'edit') {
                                return; // Exit without setting the slug if the state is 'edit'
                            }
                            $set('slug', Str::slug($state));
                        }),
                    TextInput::make('slug')->unique(ignoreRecord: true)->required()->maxLength(150),
                ])->columns(),
                Section::make([
                    RichEditor::make('content')->required()->fileAttachmentsDirectory('post/images'),
                    Group::make([
                        FileUpload::make(name: 'image')->image()->directory('post/thumbnails'),
                        DateTimePicker::make('published_at'),
                        Checkbox::make(name: 'featured')->label('Feature Post'),
                    ]),
                    Select::make('categories')->relationship('categories', 'title')->label('Category')->multiple()->searchable()->preload(),
                    Select::make('author')->relationship('author', 'email')->label('Author Name')->searchable()->preload()
                ])->columns(2)->collapsible()


            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [

        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
