@extends('layouts.app')

@section('title', 'João Caggaro')

@section('content')
    <div class="main-wrapper">
        <main id="joao-cagarro">
            <header class="main-header">
                <h1 class="h1-logo">Azorean<span class="sr-only">Art</span><span>r</span><span>t</span></h1>
            </header>
            <div class="lang-switch">
                <a href="{{ route('joao-cagarro')  }}" class="lang-link" aria-label="Switch to English version"
                   title="Switch to English version">EN</a>
                <span class="lang-separator">|</span>
                <a href="{{ route('joao-cagarro-pt')  }}" class="lang-link active"
                   aria-label="Mudar para a versão em português"
                   title="Mudar para a versão em português">PT</a>
            </div>
            <section class="hero-joao gradient-darkpurple-overlay">
                <header class="hero-content wrapper">

                    <p class="eyebrow">Aventura Ilustrada dos Açores</p>
                    <h1 class="product-title">João Cagarro e o Segredo de Santa Bárbara</h1>
                    <p class="product-subtitle">
                        Um romance gráfico cheio de mistério, passado em São Jorge, onde a história da ilha,
                        as grutas escondidas, os documentos perdidos e o Oceano Atlântico se juntam numa história
                        açoriana
                        inesquecível.
                    </p>
                    <div class="hero-actions">
                        <a href="#order-book" class="button primary">Comprar agora</a>
                        <a href="#about-book" class="button secondary">Descobrir a história</a>
                    </div>

                    <p class="hero-note">
                        Disponível em edições de capa mole em inglês e português. Enviado a partir dos Açores.
                    </p>


                </header>

                <img src="{{ asset('photos/JC & M Walking the trails-xl.png') }}"
                     srcset="{{ asset('photos/JC & M Walking the trails-xl.png') }} 1200w,
                  {{ asset('photos/JC & M Walking the trails-lg.png') }} 800w,
                  {{ asset('photos/JC & M Walking the trails-md.png') }} 400w"
                     sizes="(max-width: 600px) 100vw, (max-width: 1200px) 50vw, 1200px"
                     alt="João Cagarro e Maria a caminhar pelos trilhos de São Jorge, nos Açores, ilustração de Pieter Adriaans"
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
                            <strong>João Cagarro e o Segredo de Santa Bárbara</strong> acompanha João, um cagarro algo
                            desastrado, mas
                            aventureiro, e a sua amiga Maria na ilha de São Jorge, nos Açores.
                        </p>

                        <p>
                            Quando um homem misterioso quase morre durante um mergulho noturno perigoso, João e Maria
                            descobrem um
                            rasto de pistas: uma carteira perdida, documentos antigos e um mapa escondido. A
                            investigação leva-os a
                            uma gruta secreta, por baixo da Igreja de Santa Bárbara, e a um mistério com séculos de
                            história,
                            envolvendo povoadores flamengos, naufrágios e tesouros escondidos.
                        </p>

                        <p>
                            À medida que mergulham nas profundezas do oceano e do passado, percebem que não estão
                            sozinhos. Há mais
                            alguém à procura do segredo... e disposto a tudo para o obter.
                        </p>

                        <p>
                            Tendo como pano de fundo as paisagens impressionantes de São Jorge, esta história ilustrada
                            junta ambiente
                            açoriano, aventura e imaginação histórica num livro cultural único para leitores, visitantes
                            e amantes das
                            ilhas.
                        </p>
                    </div>

                    <aside class="content-side">
                        <div class="info-card">
                            <h3>Detalhes do Livro</h3>
                            <ul class="info-list alt">
                                <li><strong>Formato:</strong> Capa mole</li>
                                <li><strong>Extensão:</strong> 42 páginas</li>
                                <li><strong>Tamanho:</strong> A4</li>
                                <li><strong>Cenário:</strong> São Jorge, Açores</li>
                                <li><strong>Línguas:</strong> Inglês / Português</li>
                            </ul>

                        </div>
                        <div class="purchase-card">
                            <h3>Encomendar o livro</h3>

                            <p>
                                Escolha a edição de capa mole em inglês ou português, ou ambas, e faça a sua encomenda
                                online.
                            </p>

                            <ul class="info-list alt">
                                <li><strong>Preço:</strong> a partir de €14,00</li>
                                <li><strong>Pagamento:</strong> pagamento seguro através da Mollie</li>
                                <li><strong>Envio:</strong> calculado de acordo com o destino e o peso</li>
                            </ul>

                            <a href="#order-book" class="button primary">Comprar agora</a>
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
                    <p class="eyebrow">O Que o Torna Especial</p>
                    <h2>Uma história enraizada nos Açores</h2>
                </header>

                <div class="feature-grid">
                    <article class="feature-card">
                        <h3>Passado em São Jorge</h3>
                        <p>
                            Das Velas a Santa Bárbara, passando pela paisagem costeira da ilha, a história está
                            profundamente ligada
                            a lugares reais dos Açores.
                        </p>
                    </article>

                    <article class="feature-card">
                        <h3>História e ficção</h3>
                        <p>
                            O livro inspira-se na história da ilha, nas antigas rotas marítimas, nas ligações flamengas
                            e nas lendas
                            escondidas no passado atlântico.
                        </p>
                    </article>

                    <article class="feature-card">
                        <h3>Arte de Pieter Adriaans</h3>
                        <p>
                            Criado no universo mais alargado da Azorean Art, este projecto combina narrativa visual,
                            identidade local
                            e um forte sentido de lugar.
                        </p>
                    </article>
                </div>
            </section>
            <section class="section wrapper">
                <header class="section-heading">
                    <p class="eyebrow">Ideal Para</p>
                    <h2>Leitores, visitantes e a diáspora açoriana</h2>
                </header>

                <div class="audience-grid">
                    <div class="audience-card">
                        <h3>Visitantes dos Açores</h3>
                        <p>
                            Uma recordação ilustrada com significado, vinda de São Jorge — algo entre romance gráfico,
                            lembrança
                            cultural e objecto artístico.
                        </p>
                    </div>
                    <div class="audience-card">
                        <h3>Famílias açorianas no estrangeiro</h3>
                        <p>
                            Uma história de lugar, memória e identidade insular para açorianos e descendentes que vivem
                            nos Estados
                            Unidos,
                            no Canadá e noutros países.
                        </p>
                    </div>
                    <div class="audience-card">
                        <h3>Amantes da história insular</h3>
                        <p>
                            Ideal para leitores atraídos pelo Atlântico, pelo folclore, pela descoberta, pelas grutas
                            escondidas e
                            pelo mistério histórico.
                        </p>
                    </div>
                </div>
            </section>
            <section class="contact-page gradient-darkpurple-overlay" id="order-book">
                <header class="section-heading checkout-heading">
                    <p class="eyebrow">Comprar o livro</p>
                    <h2>Encomendar João Cagarro</h2>
                    <p>
                        Selecione a versão no idioma pretendido, introduza os dados de envio e continue para o pagamento
                        seguro.
                    </p>
                    <img src="{{ asset('/photos/Cagarro Logo 2025-small.png') }}" alt="Logótipo João Cagarro"
                         class="joao-logo">
                </header>

                <form class="shop-checkout-form" action="{{ route('checkout.store', [], false) }}" method="POST">
                    @csrf

                    <div class="fields">

                        <div class="field full">
                            <h3>Escolha a sua edição</h3>
                            <p class="form-description">
                                Pode encomendar uma ou ambas as versões linguísticas.
                            </p>
                        </div>

                        @foreach ($product->variants as $variant)
                            <div class="field field-border">
                                <div class="field qty-field">
                                    <input type="hidden" name="quantity[{{ $variant->id }}]" value="0">

                                    <p>{{ $variant->title }}</p>

                                    <button type="button" class="button icon circle qty-minus">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                             viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                             stroke-linecap="round" stroke-linejoin="round"
                                             class="icon icon-tabler icons-tabler-outline icon-tabler-minus">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                            <path d="M5 12l14 0"/>
                                        </svg>
                                    </button>

                                    <input
                                        type="number"
                                        name="quantity[{{ $variant->id }}]"
                                        value="{{ old('quantity.' . $variant->id, 0) }}"
                                        min="0"
                                        step="1"
                                        inputmode="numeric"
                                        class="qty-input"
                                    >

                                    <button type="button" class="button icon circle qty-plus">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                             viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                             stroke-linecap="round" stroke-linejoin="round"
                                             class="icon icon-tabler icons-tabler-outline icon-tabler-plus">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                            <path d="M12 5l0 14"/>
                                            <path d="M5 12l14 0"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        @endforeach

                        @error('quantity')
                        <p class="error-msg">{{ $message }}</p>
                        @enderror

                        <div class="field half">
                            <label for="customer_name">Nome <span class="form-required">* obrigatório</span></label>
                            <input type="text" id="customer_name" name="customer_name"
                                   placeholder="Introduza o seu nome"
                                   value="{{ old('customer_name') }}">
                            @error('customer_name')
                            <p class="error-msg">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="field half">
                            <label for="customer_email">E-mail <span class="form-required">* obrigatório</span></label>
                            <input type="email" id="customer_email" name="customer_email"
                                   placeholder="Introduza o seu e-mail"
                                   title="Introduza um endereço de e-mail válido!"
                                   required
                                   value="{{ old('customer_email') }}">
                            @error('customer_email')
                            <p class="error-msg">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="field half">
                            <label for="customer_phone">Telefone</label>
                            <input type="text" name="customer_phone" id="customer_phone"
                                   placeholder="Introduza o seu número de telefone"
                                   title="Introduza um número de telefone válido!"
                                   value="{{ old('customer_phone') }}">
                            @error('customer_phone')
                            <p class="error-msg">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="field half">
                            <label for="shipping_address_line_1">
                                Morada, linha 1 <span class="form-required">* obrigatório</span>
                            </label>
                            <input type="text" name="shipping_address_line_1" id="shipping_address_line_1"
                                   placeholder="Introduza a sua morada (rua, número)"
                                   value="{{ old('shipping_address_line_1') }}" required>
                        </div>

                        <div class="field half">
                            <label for="shipping_address_line_2">Morada, linha 2</label>
                            <input type="text" name="shipping_address_line_2" id="shipping_address_line_2"
                                   placeholder="Informação adicional (apartamento, andar, etc.)"
                                   value="{{ old('shipping_address_line_2') }}">
                        </div>

                        <div class="field half">
                            <label for="shipping_city">
                                Localidade / Cidade <span class="form-required">* obrigatório</span>
                            </label>
                            <input type="text" name="shipping_city" id="shipping_city"
                                   placeholder="Introduza a sua localidade ou cidade"
                                   value="{{ old('shipping_city') }}" required>
                        </div>

                        <div class="field half">
                            <label for="shipping_postal_code">
                                Código postal <span class="form-required">* obrigatório</span>
                            </label>
                            <input type="text" name="shipping_postal_code" id="shipping_postal_code"
                                   placeholder="Introduza o seu código postal"
                                   value="{{ old('shipping_postal_code') }}" required>
                        </div>

                        <div class="field half">
                            <label for="shipping_country">
                                País <span class="form-required">* obrigatório</span>
                            </label>
                            <input type="text" name="shipping_country" id="shipping_country"
                                   placeholder="Introduza o seu país"
                                   value="{{ old('shipping_country') }}" required>
                        </div>

                        <div class="field half">
                            <label for="shipping_zone_id">Zona de envio:</label>
                            <select id="shipping_zone_id" name="shipping_zone_id">
                                @foreach ($shippingZones as $zone)
                                    <option
                                        value="{{ $zone->id }}" {{ old('shipping_zone_id') == $zone->id ? 'selected' : '' }}>
                                        {{ $zone->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="field last-field">
                            <div class="field">
                                <ul class="actions">
                                    <li><input type="submit" value="Continuar para o pagamento" class="button primary"/>
                                    </li>
                                    <li><input type="reset" value="Limpar" class="clear-form"/></li>
                                </ul>
                            </div>
                        </div>

                        <div class="field full shipping-rates">
                            <h3>Custos de envio</h3>
                            @foreach ($shippingZones as $zone)
                                <p><strong>{{ $zone->name }}</strong></p>

                                <ul class="info-list alt">
                                    @foreach ($zone->shippingRates as $rate)
                                        <li>
                                            Até {{ $rate->weight_to_grams }} gram:
                                            €{{ number_format($rate->amount_cents / 100, 2, ',', '.') }}
                                        </li>
                                    @endforeach
                                </ul>
                            @endforeach
                        </div>
                    </div>
                </form>
            </section>
        </main>
        <script>
            document.addEventListener('DOMContentLoaded', () => {

                document.querySelectorAll('.qty-field').forEach(selector => {

                    const input = selector.querySelector('.qty-input');
                    const minus = selector.querySelector('.qty-minus');
                    const plus = selector.querySelector('.qty-plus');

                    minus.addEventListener('click', () => {
                        let value = parseInt(input.value, 10);

                        if (isNaN(value)) {
                            value = 0;
                        }

                        input.value = Math.max(0, value - 1);
                        input.dispatchEvent(new Event('change'));
                    });

                    plus.addEventListener('click', () => {
                        let value = parseInt(input.value, 10);

                        if (isNaN(value)) {
                            value = 0;
                        }

                        input.value = value + 1;
                        input.dispatchEvent(new Event('change'));
                    });

                    input.addEventListener('input', () => {

                        // allow empty when typing
                        if (input.value === '') {
                            return;
                        }

                        let value = parseInt(input.value, 10);

                        if (isNaN(value) || value < 0) {
                            input.value = 0;
                        }
                    });

                    input.addEventListener('blur', () => {

                        // if user leaves an empy field
                        if (input.value.trim() === '') {
                            input.value = 0;
                            return;
                        }

                        let value = parseInt(input.value, 10);

                        if (isNaN(value) || value < 0) {
                            input.value = 0;
                        }
                    });

                });

            });
        </script>
@endsection
