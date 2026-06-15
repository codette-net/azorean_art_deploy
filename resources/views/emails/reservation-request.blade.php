<h1>New reservation request</h1>

<p><strong>Name:</strong> {{ $data['first_name'] ?? '' }} {{ $data['last_name'] ?? '' }}</p>
<p><strong>Email:</strong> {{ $data['email'] ?? '' }}</p>

@if (!empty($data['phone']))
    <p><strong>Phone:</strong> {{ $data['phone'] }}</p>
@endif

@if (!empty($data['address']))
    <p><strong>Address:</strong> {{ $data['address'] }}</p>
@endif

@if (!empty($data['city']))
    <p><strong>City:</strong> {{ $data['city'] }}</p>
@endif

@if (!empty($data['postal_code']))
    <p><strong>Postal code:</strong> {{ $data['postal_code'] }}</p>
@endif

@if (!empty($data['country']))
    <p><strong>Country:</strong> {{ $data['country'] }}</p>
@endif

<h2>Message</h2>

<p style="white-space: pre-line;">{{ $data['message'] ?? 'No message provided.' }}</p>
