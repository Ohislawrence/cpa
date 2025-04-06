@component('mail::message')
# Tenant Creation Failed

A critical error occurred while attempting to create a new tenant account.

**Business Name:** {{ $businessName }}  
**Subdomain:** {{ $subdomain }}  
**Email:** {{ $email }}  
**Timestamp:** {{ $timestamp }}  

## Error Details
**Message:**  
{{ $errorMessage }}

**Location:**  
{{ $errorDetails['file'] }}:{{ $errorDetails['line'] }}

@component('mail::panel')
**Stack Trace:**  
<pre>{{ $errorDetails['trace'] }}</pre>
@endcomponent

@component('mail::button', ['url' => route('admin.tenants.index')])
View Tenants Dashboard
@endcomponent

**Action Required:**  
Please investigate this failure and either:
- Fix the issue and retry creation
- Contact the customer if manual intervention is needed

Thanks,  
{{ config('app.name') }}
@endcomponent