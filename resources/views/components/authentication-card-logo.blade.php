@php
    $company = App\Models\Company::first();
@endphp
<a href="/">
    <img src="{{ asset($company->logo ?? '../../../assets/images/logo/logo.png') }}" height="120px" width="220px"/>
</a>
