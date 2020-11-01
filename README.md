# iucto_connect
Use to get info about currency, Payment methods and Rounding types.

#####Install via composer
```
composer require jendasv/iucto-connect-library:dev-main
```

###How to use
```
require 'vendor/autoload.php';

use iuctoConnect\IuctoConnectLib;

$connector = new IuctoConnectLib("youApiKey");
```


### Methods
####getCurrency() 
```
$connector->getCurrency()->getResults();
```
####getPaymentType()
```
$connector->getPaymentType()->getResults();
```
####getPaymentType()
```
$connector->getRoundingType()->getResults();
```
Base data type output is object.

You can get assoc array with argument value "true". 
```
$connector->getRoundingType()->getResults(true);
```
You can also get whole response from your request if you want
```
$connector->getRoundingType()->getResponse();
```