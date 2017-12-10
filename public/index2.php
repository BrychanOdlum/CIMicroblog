<?

require_once('stripe/init.php');

$stripe = array(
  "secret_key"      => "sk_live_VaSWxo9G8rwGycsWSMwE8Vsb",
  "publishable_key" => "pk_live_pBrW3kzIx5iokHC5KOBf09Wj"
);

\Stripe\Stripe::setApiKey($stripe['secret_key']);
?>

<?php
	  
  
?>


<form action="charge.php" method="post">
  <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
          data-key="<?php echo $stripe['publishable_key']; ?>"
          data-description="Access for a year"
          data-amount="30"
          data-currency="gbp"
          data-locale="auto"></script>
</form>