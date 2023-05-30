<?php

return [
  'index' => [
    'title' => 'Artitex Gameshop',
    'privacy' => 'Ik ga akkoord met de algemene voorwaarden',
    'bil_info' => 'Deze gegevens als factuurgegevens gebruiken',
    'bil_title' => 'Factuurgegevens',
    'back' => 'Ga Terug',
    'read_mr' => 'Lees meer',
    'from' => 'van',
    'to' => 'aan',
    'or' => 'of',
    'participate' => 'Wil je meepraten?',
    'leave_comment' => 'om een reactie achter te laten',
  ],
  'order' => [
    'success' => 'Bestelling succesvol geplaatst!',
    'update' => 'Bestelling is aangepast',
    'empty' => 'U heeft nog geen bestellingen bij ons 😓',
    'download' => 'Uw bestelling met nummer :orderNumber is nu te downloaden',
  ],
  'cart' => [
    'title' => 'Jouw Winkelwagente',
    'removed' => 'Product succesvol verwijderd',
    'update' => 'Winkelwagen succesvol aangepast',
    'added' => ':attribute zit nu in uw winkelwagentje',
    'continue' => 'Verder Winkelen',
    'add' => 'Voeg toe',
  ],
  'admin' => [
    'status' => [
      'title' => 'Status',
      'create' => 'Status is aangemaakt',
      'edit' => 'Status gewijzigd',
      'removed' => 'Status verwijderd',
    ],
    'order' => [
      'title' => 'Bestelgegevens',
      'create' => 'Administrator bestelling succesvol geplaatst',
      'num' => 'Bestelling nummer',
      'price' => 'Prijs',
      'dis_price' => 'Actie Prijs',
      'subtotal' => 'Subtotaal',
      'total' => 'Totaal te betalen',
      'shipment_cost' => 'Bezorgkosten worden bijberekend bij afrekenen',
    ],
    'category' => [
      'title' => 'Categorie naam',
      'slug' => 'Slug',
      'create' => 'Categorie :attribute aangemaakt!',
      'edit' => ':attribute succesvol aangepast',
    ],
    'product' => [
      'title' => 'Producten',
      'create' => ':attribute aangemaakt!',
      'edit' => 'Product is bewerkt',
      'qty' => 'Aantal',
      'release' => 'Uitgebracht op',
      'excerpt' => 'Korte beschrijving',
      'desc' => 'Beschrijving',
      'min_age' => 'Minimale Leeftijd',
      'all_ages' => 'Geschikt voor alle leeftijden',
      'preorder' => 'Preorder Datum',
      'preorder_now' => 'Preorder Nu',
      'soon_available' => 'Binnenkort beschikbaar',
      'img' => 'Afbeelding',
      'ean' => 'EAN Code',
    ],
    'index' => [
      'download' => 'Download',
      'actions' => 'Acties',
      'create' => 'Maak nieuw item',
      'read' => 'Lees',
      'edit' => 'Bewerk',
      'delete' => 'Verwijder',
      'active' => 'Actief',
      'inactive' => 'Inactief',
      'all_products' => 'Alle producten',
      'no_products' => 'Er zijn geen producten, probeer het een andere keer nog eens',
      'view_all' => 'Zie alles van',
    ],
    'nav' => [
      'category' => 'Categorieen',
      'products' => 'Producten',
      'orders' => 'Bestellingen',
      'status' => 'Statusen',
      'users' => 'Gebruikers',
    ],
  ],
  'checkout' => [
    'payment_succes' => 'Uw betaling is ontvangen',
    'delivery_address' => 'Bezorgadres succesvol ontvangen',
    'shipment_mthd' => 'Zie bezorgopties',
    'pay_btn' => 'Afrekenen',
  ],
  'user' => [
    'title' => 'Klant',
    'create' => 'Uw account is aangemaakt',
    'edit' => 'Je hebt jouw gegevens aangepast',
    'change' => 'Bewerk jouw gegevens',
    'edit_btn' => 'Update jouw profiel',
    'logged_in' => 'Welkom terug',
    'logged_out' => 'Doei!',
    'admin' => 'Admin',
    'uname' => 'Gebruikersnaam',
    'user_id' => 'Klantnummer',
  ],
  'nav' => [
    'admin' => 'Admin Paneel',
    'profile' => 'Jouw Account',
    'login' => 'Inloggen',
    'logout' => 'Uitloggen',
    'register' => 'Registeren',
    'orders' => 'Jouw Bestellingen',
  ],
  'form' => [
    'submit' => 'Verstuur',
    'back' => 'Ga terug',
    'fname' => 'Voornaam',
    'additation' => 'Tussenvoegsel',
    'lname' => 'Achternaam',
    'email' => 'Email',
    'housenmr' => 'Huisnummer',
    'housenmr_ex' => 'Toevoeging huisnummer',
    'postalcode' => 'postcode',
    'streetname' => 'straat naam',
    'comp_name' => 'Bedrijfsnaam',
    'psw' => 'Wachtwoord',
    'comp_id' => 'Company ID',
    'no_acc' => 'Geen account?',
  ],
  'pdf' => [
    'title' => 'Artitex | Gameshop | Bestelling',
    'purchase' => 'Besteld op',
    'payment_mth' => 'Betaal methode',
    'shipping_mth' => 'Verzend methode',
    'product_name' => 'Product naam',
    'btw' => 'BTW (:attribute%)',
  ],
  'artitex' => [
    'title' => 'Artitex',
    'address' => 'Zoomstede 27L',
    'postalcode' => '3431 HK Nieuwegein',
    'country' => 'Nederland',
    'mail' => 'info@artitex.nl',
    'phone' => '030 207 2488',
  ],
  'mail' => [
    'success' => 'De mail is succesvol verzonden',
    'opener' => 'Beste',
    'closer' => 'Met vriendelijke groeten',
  ],
  'error' => [
    'logged_out' => 'U moet ingelogd zijn om te kunnen bestellen',
    'wrong_credentials' => 'Uw verstrekte inloggegevens kunnen niet worden geverifieerd.',
    'cart_empty' => 'Er zit nog niks in jouw winkelwagentje',
    'mail_err' => 'Er is iets fout gegaan, wij hebben u geen mail kunnen sturen',
  ],
];