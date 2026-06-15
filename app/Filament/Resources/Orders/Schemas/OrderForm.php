<?php

namespace App\Filament\Resources\Orders\Schemas;

use App\Enums\OrderPaymentStatusEnum;
use App\Enums\OrderStatusEnum;
use App\Models\ProductVariant;
use App\Models\ShippingRate;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Wizard;
use Filament\Schemas\Components\Wizard\Step;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use App\Services\OrderPricingService;

class OrderForm
{

    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Wizard::make([
                    Step::make('Order details')
                        ->schema([
                            TextInput::make('order_number')
                                ->default(fn() => 'ORD-' . now()->format('Ymd') . '-' . random_int(1000, 9999))
                                ->disabled()
                                ->dehydrated()
                                ->required(),

                            Select::make('status')
                                ->options(OrderStatusEnum::class)
                                ->default(OrderStatusEnum::PENDING)
                                ->required(),

                            Select::make('payment_status')
                                ->options(OrderPaymentStatusEnum::class)
                                ->default(OrderPaymentStatusEnum::PENDING)
                                ->required(),

                            Select::make('payment_method')
                                ->options([
                                    'cash' => 'Cash',
                                    'mollie' => 'Mollie',
                                    'stripe' => 'Stripe',
                                    'bank_transfer' => 'Bank transfer',
                                ])
                                ->default('mollie')
                                ->required(),

                            TextInput::make('payment_reference'),

                            TextInput::make('currency')
                                ->default('EUR')
                                ->required(),

                            Textarea::make('notes')
                                ->columnSpanFull(),
                        ])
                        ->columns(2),

                    Step::make('Customer')
                        ->schema([
                            TextInput::make('customer_name')
                                ->required(),

                            TextInput::make('customer_email')
                                ->email()
                                ->required(),

                            TextInput::make('customer_phone')
                                ->tel(),
                        ])
                        ->columns(2),

                    Step::make('Shipping')
                        ->schema([
                            TextInput::make('shipping_name')
                                ->columnSpanFull(),

                            TextInput::make('shipping_address_line_1')
                                ->required(),

                            TextInput::make('shipping_address_line_2'),

                            TextInput::make('shipping_postal_code')
                                ->required(),

                            TextInput::make('shipping_city')
                                ->required(),

                            TextInput::make('shipping_country')
                                ->required(),

                            Select::make('shipping_zone_id')
                                ->relationship('shippingZone', 'name')
                                ->searchable()
                                ->preload()
                                ->live()
                            ,
                        ])
                        ->columns(2),

                    Step::make('Items')
                        ->schema([
                            Repeater::make('items')
                                ->relationship()
                                ->mutateRelationshipDataBeforeCreateUsing(
                                    fn(array $data): array => app(OrderPricingService::class)->calculateOrderItemData($data)
                                )
                                ->mutateRelationshipDataBeforeSaveUsing(
                                    fn(array $data): array => app(OrderPricingService::class)->calculateOrderItemData($data)
                                )
                                ->schema([
                                    Select::make('product_variant_id')
                                        ->label('Product variant')
                                        ->options(
                                            ProductVariant::query()
                                                ->where('is_active', true)
                                                ->pluck('title', 'id')
                                        )
                                        ->searchable()
                                        ->required()
                                        ->live()
                                        ->afterStateUpdated(function ($state, Set $set) {
                                            $variant = ProductVariant::find($state);

                                            $set('title_snapshot', $variant?->title);
                                            $set('unit_price_cents', $variant?->price_cents ?? 0);
                                            $set('unit_weight_grams', $variant?->weight_grams ?? 0);
                                            $set('quantity', 1);
                                            $set('total_cents', $variant?->price_cents ?? 0);
                                            $set('total_weight_grams', $variant?->weight_grams ?? 0);
                                        }),

                                    TextInput::make('title_snapshot')
                                        ->label('Title')
                                        ->required(),

                                    TextInput::make('quantity')
                                        ->numeric()
                                        ->minValue(1)
                                        ->default(1)
                                        ->required()
                                        ->live()
                                        ->afterStateUpdated(function ($state, Get $get, Set $set) {
                                            $quantity = (int)$state;
                                            $unitPrice = (int)$get('unit_price_cents');
                                            $unitWeight = (int)$get('unit_weight_grams');

                                            $set('total_cents', $quantity * $unitPrice);
                                            $set('total_weight_grams', $quantity * $unitWeight);
                                        }),

                                    TextInput::make('unit_price_cents')
                                        ->label('Unit price')
                                        ->numeric()
                                        ->required()
                                        ->live()
                                        ->afterStateUpdated(function ($state, Get $get, Set $set) {
                                            $quantity = (int)$get('quantity');
                                            $set('total_cents', $quantity * (int)$state);
                                        }),

                                    TextInput::make('unit_weight_grams')
                                        ->label('Unit weight')
                                        ->numeric()
                                        ->default(0)
                                        ->live()
                                        ->afterStateUpdated(function ($state, Get $get, Set $set) {
                                            $quantity = (int)$get('quantity');
                                            $set('total_weight_grams', $quantity * (int)$state);
                                        }),

                                    TextInput::make('total_cents')
                                        ->label('Line total')
                                        ->numeric()
                                        ->disabled()
                                        ->dehydrated()
                                        ->required(),

                                    TextInput::make('total_weight_grams')
                                        ->label('Total weight')
                                        ->numeric()
                                        ->disabled()
                                        ->dehydrated()
                                        ->required(),
                                ])
                                ->columns(3)
                                ->defaultItems(1)
                                ->addActionLabel('Add item'),
                        ]),

                    Step::make('Totals')
                        ->schema([
                            Placeholder::make('subtotal_preview')
                                ->label('Subtotal')
                                ->content(fn(Get $get) => self::formatMoney(self::subtotal($get('items') ?? []))),

                            Placeholder::make('weight_preview')
                                ->label('Total weight')
                                ->content(fn(Get $get) => self::totalWeight($get('items') ?? []) . ' g'),

                            Placeholder::make('shipping_preview')
                                ->label('Shipping')
                                ->content(fn(Get $get) => self::formatMoney(
                                    self::shipping($get('shipping_zone_id'), self::totalWeight($get('items') ?? []))
                                )),

                            Placeholder::make('total_preview')
                                ->label('Total')
                                ->content(fn(Get $get) => self::formatMoney(
                                    self::subtotal($get('items') ?? [])
                                    + self::shipping($get('shipping_zone_id'), self::totalWeight($get('items') ?? []))
                                )),

                            Hidden::make('subtotal_cents')
                                ->dehydrated(),

                            Hidden::make('shipping_cents')
                                ->dehydrated(),

                            Hidden::make('total_cents')
                                ->dehydrated(),
                        ])
                        ->columns(2),
                ])
                    ->columnSpanFull(),
            ]);
    }

    private static function subtotal(array $items): int
    {
        return collect($items)->sum(fn($item) => (int)($item['total_cents'] ?? 0));
    }

    private static function totalWeight(array $items): int
    {
        return collect($items)->sum(fn($item) => (int)($item['total_weight_grams'] ?? 0));
    }

    private static function shipping(?int $shippingZoneId, int $weightGrams): int
    {
        if (!$shippingZoneId || $weightGrams <= 0) {
            return 0;
        }

        return (int)ShippingRate::query()
            ->where('shipping_zone_id', $shippingZoneId)
            ->where('weight_from_grams', '<=', $weightGrams)
            ->where('weight_to_grams', '>=', $weightGrams)
            ->value('amount_cents');
    }

    private static function formatMoney(int $cents): string
    {
        return '€ ' . number_format($cents / 100, 2, ',', '.');
    }

}
