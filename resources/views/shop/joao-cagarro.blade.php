@extends('layouts.app')

@section('title', 'João Caggaro')

@section('content')
    <div class="main-wrapper">
        <main id="joao-cagarro">
            <header class="main-header">
                <h1 class="h1-logo">Azorean<span class="sr-only">Art</span><span>r</span><span>t</span></h1>
            </header>
            <div class="lang-switch">
                <a href="" class="lang-link active" aria-label="Switch to English version"
                   title="Switch to English version">EN</a>
                <span class="lang-separator">|</span>
                <a href="" class="lang-link" aria-label="Mudar para a versão em português"
                   title="Mudar para a versão em português">PT</a>
            </div>
            <section class="hero-joao gradient-darkpurple-overlay">
                <header class="hero-content wrapper">

                    <p class="eyebrow">Illustrated Adventure from the Azores</p>
                    <h1 class="product-title">João Cagarro and the Secret of Santa Bárbara</h1>
                    <p class="product-subtitle">
                        A mystery-filled graphic novel set on São Jorge, where island history, hidden caves,
                        lost documents and the Atlantic Ocean come together in one unforgettable Azorean story.
                    </p>
                    <div class="hero-actions">
                        <a href="#order-book" class="button primary">Buy now</a>
                        <a href="#about-book" class="button secondary">Discover the Story</a>
                    </div>

                    <p class="hero-note">
                        Available in English and Portuguese softcover editions. Ships from the Azores.
                    </p>
                </header>

                <img src="{{ asset('photos/JC & M Walking the trails-xl.png') }}"
                     srcset="{{ asset('photos/JC & M Walking the trails-xl.png') }} 1200w,
                  {{ asset('photos/JC & M Walking the trails-lg.png') }} 800w,
                  {{ asset('photos/JC & M Walking the trails-md.png') }} 400w"
                     sizes="(max-width: 600px) 100vw, (max-width: 1200px) 50vw, 1200px"
                     alt="João Cagarro and Maria walking the trails of São Jorge in the Azores, artwork by Pieter Adriaans"
                     class="lozad" data-loaded="false">
            </section>

            <section id="about-book" class="section wrapper">
                <header class="section-heading">
                    <p class="eyebrow">About the Book</p>
                    <h2>An Azorean adventure of mystery, history and discovery</h2>
                </header>

                <div class="rj-box">
                    <div class="content-main">
                        <p>
                            <strong>João Cagarro and the Secret of Santa Bárbara</strong> follows João, a slightly
                            clumsy
                            but
                            adventurous shearwater, and his friend Maria on the island of São Jorge in the Azores.
                        </p>

                        <p>
                            When a mysterious stranger nearly dies during a dangerous night dive, João and Maria uncover
                            a
                            trail of
                            clues: a lost wallet, ancient documents and a hidden map. Their investigation leads them to
                            a
                            secret cave
                            beneath the church of Santa Bárbara, and to a centuries-old mystery involving Flemish
                            settlers,
                            shipwrecks and hidden treasures.
                        </p>

                        <p>
                            As they dive into the depths of the ocean and the past, they realize they are not alone.
                            Someone
                            else is
                            after the secret... and will stop at nothing to get it.
                        </p>

                        <p>
                            Set against the dramatic landscapes of São Jorge, this illustrated story blends Azorean
                            atmosphere,
                            adventure and historical imagination into a unique cultural book for readers, visitors and
                            island lovers.
                        </p>
                    </div>

                    <aside class="content-side">
                        <div class="info-card">
                            <ul class="info-list alt">
                                <h3>Book Details</h3>
                                <li><strong>Format:</strong> Softcover</li>
                                <li><strong>Length:</strong> 42 pages</li>
                                <li><strong>Size:</strong> A4</li>
                                <li><strong>Setting:</strong> São Jorge, Azores</li>
                                <li><strong>Languages:</strong> English / Portuguese</li>
                            </ul>

                        </div>
                        <div class="purchase-card">
                            <h3>Order the Book</h3>

                            <p>
                                Choose the English or Portuguese (or both!) softcover edition and place your order
                                online.
                            </p>

                            <ul class="info-list alt">
                                <li><strong>Price:</strong> from €14.00</li>
                                <li><strong>Payment:</strong> Secure checkout via Mollie</li>
                                <li><strong>Shipping:</strong> Calculated by destination and weight</li>
                            </ul>

                            <a href="#order-book" class="button primary">Buy now</a>
                        </div>
                    </aside>
                    <div class="book-cover">
                        <img src="{{ asset('photos/Joao-Cagarro-Cover-xl.jpg') }}"
                             srcset="{{ asset('photos/Joao-Cagarro-Cover-xl.jpg') }} 1200w,
                      {{ asset('photos/Joao-Cagarro-Cover-large.jpg') }} 800w,
                      {{ asset('photos/Joao-Cagarro-Cover-medium.jpg') }} 400w"
                             sizes="(max-width: 600px) 100vw, (max-width: 1200px) 50vw, 1200px"
                             alt="Cover of João Cagarro and the Secret of Santa Bárbara, an illustrated book by Pieter Adriaans set in the Azores"
                             class="lozad" data-loaded="false">
                    </div>
                </div>
            </section>

            <section class="section wrapper">
                <header class="section-heading">
                    <p class="eyebrow">Why It’s Special</p>
                    <h2>A story rooted in the Azores</h2>
                </header>

                <div class="feature-grid">
                    <article class="feature-card">
                        <h3>Set on São Jorge</h3>
                        <p>
                            From Velas to Santa Bárbara and the coastal landscapes of the island, the story is deeply
                            connected to
                            real places in the Azores.
                        </p>
                    </article>

                    <article class="feature-card">
                        <h3>History meets fiction</h3>
                        <p>
                            The book draws inspiration from island history, old sea routes, Flemish connections and
                            legends
                            hidden in
                            the Atlantic past.
                        </p>
                    </article>

                    <article class="feature-card">
                        <h3>Art by Pieter Adriaans</h3>
                        <p>
                            Created within the wider world of Azorean Art, this project combines visual storytelling,
                            local
                            identity
                            and a strong sense of place.
                        </p>
                    </article>
                </div>
            </section>

            <section class="section wrapper">
                <header class="section-heading">
                    <p class="eyebrow">Perfect For</p>
                    <h2>Readers, visitors and the Azorean diaspora</h2>
                </header>

                <div class="audience-grid">
                    <div class="audience-card">
                        <h3>Visitors to the Azores</h3>
                        <p>
                            A meaningful illustrated keepsake from São Jorge — something between a graphic novel, a
                            cultural
                            souvenir
                            and an art object.
                        </p>
                    </div>
                    <div class="audience-card">
                        <h3>Azorean families abroad</h3>
                        <p>
                            A story of place, memory and island identity for Azoreans and descendants living in the
                            United
                            States,
                            Canada and beyond.
                        </p>
                    </div>
                    <div class="audience-card">
                        <h3>Lovers of island history</h3>
                        <p>
                            Ideal for readers drawn to the Atlantic, folklore, discovery, hidden caves and historical
                            mystery.
                        </p>
                    </div>
                </div>
            </section>
            <section class="contact-page gradient-darkpurple-overlay" id="order-book">
                <header class="section-heading checkout-heading">
                    <p class="eyebrow">Buy the Book</p>
                    <h2>Order João Cagarro</h2>
                    <p>
                        Select your preferred language version, enter your shipping details and continue to secure
                        payment.
                    </p>
                    <img src="{{ asset('/photos/Cagarro Logo 2025-small.png') }}" alt="João Cagarro logo" class="joao-logo">
                </header>
                <form class="shop-checkout-form" action="{{ route('checkout.store',[], false) }}" method="POST">
                    @csrf
                    <div class="fields">

                        <div class="field full">
                            <h3>Choose your edition</h3>
                            <p class="form-description">
                                You can order one or both language versions.
                            </p>
                        </div>

                        @foreach ($product->variants as $variant)
                            <div class="field half field-border">
                                <div class="field half">
                                    <input
                                        type="checkbox"
                                        id="variant-{{ $variant->id }}"
                                        name="variant_ids[]"
                                        value="{{ $variant->id }}"
                                        {{ in_array($variant->id, old('variant_ids', [])) ? 'checked' : '' }}
                                    >

                                    <label for="variant-{{ $variant->id }}">
                                        {{ $variant->title }}<br>
                                        <span>€{{ number_format($variant->price_cents / 100, 2) }}</span>
                                    </label>
                                </div>

                                <div class="field quarter">
                                    <label for="quantity-{{ $variant->id }}">Quantity</label>
                                    <input
                                        type="number"
                                        id="quantity-{{ $variant->id }}"
                                        name="quantity[{{ $variant->id }}]"
                                        value="{{ old('quantity.' . $variant->id, 0) }}"
                                        min="0"
                                        max="10"
                                    >
                                </div>
                            </div>
                        @endforeach
                        @error('quantity')
                        <p class="error-msg">{{ $message }}</p>
                        @enderror

                        <div class="field half">
                            <label for="customer_name">Name <span class="form-required">* required</span></label>
                            <input type="text" id="customer_name" name="customer_name" placeholder="Enter your  name"
                                   title="First name must contain only characters!" value="{{ old('customer_name') }}">

                            @error('customer_name')
                            <p class="error-msg">{{ $message }}</p>
                            @enderror

                        </div>
                        <div class="field half">
                            <label for="customer_email">Email <span class="form-required">* required</span></label>
                            <input type="email" id="customer_email" name="customer_email"
                                   placeholder="Enter your email" title="Please enter a valid email address!" required
                                   value="{{ old('customer_email') }}">

                            @error('customer_email')
                            <p class="error-msg">{{ $message }}</p>
                            @enderror

                        </div>
                        <!-- accept phone number with numbers , () and - only -->
                        <div class="field half">
                            <label for="customer_phone">Phone</label>
                            <input type="text" name="customer_phone" id="customer_phone"
                                   placeholder="Enter your phone number" title="Please enter a valid phone number!"
                                   value="{{ old('customer_phone') }}">
                            @error('customer_phone')
                            <p class="error-msg">{{ $message }}</p>
                            @enderror
                        </div>
                        <!-- address  -->
                        <div class="field half">
                            <label for="shipping_address_line_1">Address line 1 <span class="form-required">*
                                        required</span></label>
                            <input type="text" name="shipping_address_line_1" id="shipping_address_line_1"
                                   placeholder="Enter your address (street,number)"
                                   value="{{ old('shipping_address_line_1') }}" required>
                        </div>
                        <div class="field half">
                            <label for="shipping_address_line_2">Address line 2</label>
                            <input type="text" name="shipping_address_line_2" id="shipping_address_line_2"
                                   placeholder="Enter additional address info (apartment, floor, etc.)"
                                   value="{{ old('shipping_address_line_2') }}">
                        </div>
                        <!-- city -->
                        <div class="field half">
                            <label for="shipping_city">City (and state) <span class="form-required">*
                                        required</span></label>
                            <input type="text" name="shipping_city" id="shipping_city"
                                   placeholder="Enter your city/state" value="{{ old('shipping_city') }}" required>
                        </div>
                        <!-- postal code-->
                        <div class="field half">
                            <label for="shipping_postal_code">ZIP / Postal Code <span class="form-required">*
                                        required</span></label>
                            <input type="text" name="shipping_postal_code" id="shipping_postal_code"
                                   placeholder="Enter your postal code" value="{{ old('shipping_postal_code') }}"
                                   required>
                        </div>
                        <!-- country -->
                        <div class="field half">
                            <label for="shipping_country">Country <span class="form-required">*
                                        required</span></label>
                            <input type="text" name="shipping_country" id="shipping_country"
                                   placeholder="Enter your country" value="{{ old('shipping_country') }}" required>
                        </div>
                        <!-- prefered contact method -->
                        <div class="field half">
                            <label for="shipping_zone_ID">Shipping Zone:</label>
                            <select id="shipping_zone_id" name="shipping_zone_id">
                                @foreach (\App\Models\ShippingZone::where('is_active', true)->get() as $zone)
                                    <option value="{{ $zone->id }}" {{ old('shipping_zone_id') == $zone->id ? 'selected' : '' }}>
                                        {{ $zone->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="field last-field">
                            <div class="field">
                                <ul class="actions">
                                    <li><input type="submit" value="Go to checkout" class="button primary"/></li>
                                    <li><input type="reset" value="Clear" class="clear-form"/></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </form>

            </section>
        </main>

@endsection
