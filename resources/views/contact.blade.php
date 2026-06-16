@extends('layouts.app')

@section('title', 'Contact us')

@section('content')
    <div class="main-wrappper">
        <main>
            <header class="main-header">
                <h1 class="h1-logo">Azorean<span class="sr-only">Art</span><span>r</span><span>t</span></h1>
            </header>
            <section class="contact-page gradient-darkpurple-overlay">
                <header>
                    <h1>Contact</h1>
                    <p>Interested in buying an artwork or do you have any questions? <br>
                        Fill in the form below and we will get back to you as soon as possible.</p>
                </header>
                <form class="contact-form" action="{{ route('contact.send', [], false) }}" method="POST">
                    @csrf
                    <div class="fields">
                        <div class="field half">
                            <label for="first_name">First name <span class="form-required">* required</span></label>
                            <input type="text" id="first_name" name="first_name" placeholder="Enter your first name"
                                   required>
                        </div>

                        <div class="field half">
                            <label for="last_name">Last name <span class="form-required">* required</span></label>
                            <input type="text" id="last_name" name="last_name" placeholder="Enter your last name"
                                   required>
                        </div>

                        <div class="field half">
                            <label for="email">Email <span class="form-required">* required</span></label>
                            <input type="email" id="email" name="email" placeholder="Enter your email" required>
                        </div>

                        <div class="field half">
                            <label for="phone">Phone</label>
                            <input type="text" id="phone" name="phone" placeholder="Enter your phone number">
                        </div>

                        <div class="field half">
                            <label for="address">Address</label>
                            <input type="text" id="address" name="address"
                                   placeholder="Enter your address (street, number)">
                        </div>

                        <div class="field half">
                            <label for="city">City (and state)</label>
                            <input type="text" id="city" name="city" placeholder="Enter your city/state">
                        </div>

                        <div class="field half">
                            <label for="postal_code">ZIP / Postal Code</label>
                            <input type="text" id="postal_code" name="postal_code" placeholder="Enter your postal code">
                        </div>

                        <div class="field half">
                            <label for="country">Country</label>
                            <input type="text" id="country" name="country" placeholder="Enter your country">
                        </div>

                        <div class="field">
                            <label for="message">Message</label>
                            <textarea name="message" id="message" rows="4"
                                      placeholder="Your message">{{ old('message') }}</textarea>
                        </div>

                        <div class="field last-field">
                            {{--                        <p class="errors-msg"></p>--}}
                            {{--                        <div class="g-recaptcha" data-sitekey="6LfUEvQpAAAAABZlIBzegXpvRMnnVGGwtCKaUMZ2"></div>--}}
                            <ul class="actions">
                                <li><input type="submit" value="Send Message" class="button primary"/></li>
                                <li><input type="reset" value="Clear" class="clear-form"/></li>
                            </ul>
                        </div>
                    </div>
                </form>

            </section>
        </main>
        <div class="response-wrapper @if(session('success')) active @endif">
            <div class="response">
                <h2>
                    @if(session('success'))
                        {{ session('success') }}
                    @endif
                </h2>
                <button class="button primary" id="response-button">Close</button>
            </div>
        </div>

        <script>
            document.getElementById('response-button').addEventListener('click', function () {
                document.querySelector('.response-wrapper').classList.remove('active');
            });
        </script>

        @endsection
    </div>
