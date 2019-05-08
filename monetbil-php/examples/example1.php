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
  $nom=htmlspecialchars($_GET["firstname"]);
  $prenom=htmlspecialchars($_GET["lastname"]);
  $telephone=htmlspecialchars($_GET["telephone"]);
  $email=htmlspecialchars($_GET["email"]);
 
  require_once '../monetbil.php';


  /** 
 Service key
BAdvCrQ8ZJFqFY3ZqGmn3HIHQ59TdjKO
Service secret
aa0qChQJnVQgd6wtorJg2V7zL0HsC5AHdMaFVB7cgK4p6VQLRHaoUUcYZ0kj4PR5*/



// Setup Monetbil arguments
Monetbil::setAmount($montant);
Monetbil::setCurrency('XAF');
Monetbil::setLocale('en'); // Display language fr or en
Monetbil::setPhone($telephone);
Monetbil::setCountry('');
Monetbil::setItem_ref(''.rand(1,1000000));
Monetbil::setPayment_ref(rand(1,1000000000000000000));
Monetbil::setUser(rand(1,1000000));
Monetbil::setFirst_name($nom);
Monetbil::setLast_name($prenom);
Monetbil::setEmail($email);
Monetbil::setLogo('../../mosquedon/images/mosque.png');

// Start a payment
// You will be redirected to the payment page
Monetbil::startPayment();
 }


