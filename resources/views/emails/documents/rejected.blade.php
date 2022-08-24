@component('mail::message')
# Annulation d'un document.

Votre commande a été annulée pour cause de non-verifcation de certaines informations.

Prière de patienter pour plus des précisions.

Merci,<br>
{{ config('app.name') }}
@endcomponent
