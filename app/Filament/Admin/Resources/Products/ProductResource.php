<?php

namespace App\Filament\Admin\Resources\Products;

use App\Filament\Admin\Resources\Products\Pages\CreateProduct;
use App\Filament\Admin\Resources\Products\Pages\EditProduct;
use App\Filament\Admin\Resources\Products\Pages\ListProducts;
use App\Filament\Admin\Resources\Products\Schemas\ProductForm;
use App\Filament\Admin\Resources\Products\Tables\ProductsTable;
use App\Models\Product;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Actions\EditAction as ActionsEditAction;
use Filament\Actions\BulkActionGroup as ActionsBulkActionGroup;
use Filament\Actions\DeleteBulkAction as ActionsDeleteBulkAction;
use AmidEsfahani\FilamentTinyEditor\TinyEditor;
use Filament\Schemas\Components\Section as ComponentsSection;
use Filament\Support\Icons\Heroicon;
use Illuminate\Support\Str;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;
    protected static string | \BackedEnum | null $navigationIcon = Heroicon::ShoppingBag;
    protected static ?string $modelLabel = 'Produto';
    protected static ?string $pluralModelLabel = 'Produtos';
    protected static ?string $navigationLabel = 'Produtos';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->components([
                ComponentsSection::make('Informações Básicas')->components([
                    Select::make('category_id')
                        ->label('Categoria')
                        ->relationship('category', 'name')
                        ->required()
                        ->searchable()
                        ->preload(),

                    TextInput::make('name')
                        ->label('Nome do Produto')
                        ->required()
                        ->live(onBlur: true)
                        ->afterStateUpdated(fn(string $operation, $state, callable $set) => $operation === 'create' ? $set('slug', Str::slug($state)) : null)
                        ->maxLength(255),

                    TextInput::make('slug')
                        ->required()
                        ->unique(ignoreRecord: true)
                        ->maxLength(255),

                    TextInput::make('price')
                        ->label('Preço')
                        ->required()
                        ->numeric()
                        ->default(0)
                        ->prefix('R$'),

                    Toggle::make('is_active')
                        ->label('Ativo')
                        ->default(true),
                ])->columns(2)->collapsible(),

                ComponentsSection::make('Detalhes')->components([
                    Textarea::make('description')
                        ->label('Descrição Curta')
                        ->rows(3)
                        ->maxLength(255),

                    TinyEditor::make('long_description')
                        ->label('Descrição Completa (Página do Produto)')
                        ->columnSpanFull(),

                    TagsInput::make('features')
                        ->label('Benefícios / Features')
                        ->placeholder('Digite e aperte Enter para adicionar')
                        ->helperText('Estes itens aparecerão como checkmarks na tela do produto.')
                        ->columnSpanFull(),
                ])->collapsible(),

                ComponentsSection::make('Galeria de Imagens')->components([
                    Repeater::make('images')
                        ->label('Galeria de Imagens')
                        ->relationship('images')

                        // 1. Coloca o nome do arquivo no cabeçalho do card (perto da lixeira)
                        ->itemLabel(fn(array $state): ?string => isset($state['path']) ? basename($state['path']) : 'Nova Imagem')

                        ->schema([
                            FileUpload::make('path')
                                ->label('Imagem')
                                ->image()
                                ->imageEditor()
                                ->directory('products/gallery')
                                ->required()
                                ->columnSpan(3)
                                ->getUploadedFileNameForStorageUsing(
                                    fn(\Livewire\Features\SupportFileUploads\TemporaryUploadedFile $file): string =>
                                    (string) str($file->getClientOriginalName())
                                        ->beforeLast('.')
                                        ->slug() . '-' . uniqid() . '.' . $file->extension()
                                ),

                            Toggle::make('is_main')
                                ->label('Imagem Principal (Capa)?')
                                ->default(false)
                                ->columnSpan(1),
                        ])
                        ->grid(2)
                        ->defaultItems(1)
                        ->addActionLabel('Adicionar outra imagem')
                        ->reorderableWithButtons()
                        ->columnSpanFull(),
                ])->collapsible(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nome')
                    ->searchable(),

                TextColumn::make('category.name')
                    ->label('Categoria')
                    ->sortable(),

                TextColumn::make('price')
                    ->label('Preço')
                    ->money('BRL')
                    ->sortable(),

                IconColumn::make('is_active')
                    ->label('Ativo')
                    ->boolean(),
            ])
            ->filters([
                //
            ])
            ->actions([
                ActionsEditAction::make(),
            ])
            ->bulkActions([
                ActionsBulkActionGroup::make([
                    ActionsDeleteBulkAction::make(),
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
            'index' => ListProducts::route('/'),
            'create' => CreateProduct::route('/create'),
            'edit' => EditProduct::route('/{record}/edit'),
        ];
    }
}
