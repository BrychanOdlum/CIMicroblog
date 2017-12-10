<?

require_once('stripe/init.php');

$stripe = array(
  "secret_key"      => "sk_live_VaSWxo9G8rwGycsWSMwE8Vsb",
  "publishable_key" => "pk_live_pBrW3kzIx5iokHC5KOBf09Wj"
);

\Stripe\Stripe::setApiKey($stripe['secret_key']);
	

  $token  = $_POST['stripeToken'];

  $customer = \Stripe\Customer::create(array(
      'email' => 'customer@example.com',
      'source'  => $token
  ));

  $charge = \Stripe\Charge::create(array(
      'customer' => $customer->id,
      'amount'   => 30,
      'currency' => 'gbp'
  ));

  echo '<h1>Successfully charged £0.30!</h1>';


?>