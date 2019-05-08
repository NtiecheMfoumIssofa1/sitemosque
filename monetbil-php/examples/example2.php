<?php

/*
  This program is free software: you can redistribute it and/or modify
  it under the terms of the GNU General Public License as published by
  the Free Software Foundation, either version 3 of the License or any later version.
  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.
  You should have received a copy of the GNU General Public License
  along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

if(isset($_GET["montant"])){

  $montant=intval(htmlspecialchars(trim($_GET["montant"])));
  $nom=isset($_GET["firstname"]);
  $prenom=isset($_GET["lastname"]);
  $telephone=isset($_GET['telephone']);
  $email=isset($_GET["email"]);
require_once '../monetbil.php';

// Setup Monetbil arguments
$monetbil_args = array(
    'amount' => $montant,
    'phone' => $telephone,
    'locale' => 'en', // Display language fr or en
    'country' => 'CM',
    'currency' => 'XAF',
    'item_ref' => ''.rand(1,1000000),
    'payment_ref' => rand(1,1000000000000000000),
    'user' => 12,
    'first_name' => $nom,
    'last_name' => $prenom,
    'email' => $email,
    'logo' => '../../mosquedon/images/mosque.png'
);

// Start a payment
// You will be redirected to the payment page
Monetbil::startPayment($monetbil_args);
}
