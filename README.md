# Nectar API PHP SDK

The Nectar PHP API allows integration with the Nectar API and the generation of cloud based STS Ed 2 (STS6) valid tokens.

## Getting Started

Please ensure that you have PHP7.2+ installed to use these bindings.

## Installation

Use the package manager [composer](https://getcomposer.org) to install this package.

```bash
composer require nectar/nectar-php-sdk
```

### Usage

```
<?php

require __DIR__ . '/vendor/autoload.php';
use Nectar\Php\Sdk\Nectar;

$key = '5f16bc28-e5cf-4088-b07f-9ea90b3572a2';
$secret = '99a16bed-8461-4fe0-ab5d-8fd44d4e5308';
$nectar = new Nectar($key, $secret);

# get token
echo $nectar->getTokensFactory()->getToken('590e9044-823f-4904-8c9e-4028b4b0116e');

# get user
echo $nectar->getUserFactory()->getUser();

$firstName = 'first_name';
$lastName = 'last_name';
$username = 'username';
$password = 'password';
$phoneNo = '0700100100';
$imageUrl = 'https://image.url';
$email = 'user@email.com';
$activated = true;

# create user
echo $nectar->getUserFactory()->createUser($firstName, $lastName, $username,
                                            $password, $phoneNo, $imageUrl,
                                            $email, $activated);

# update user
echo $nectar->getUserFactory()->createUser($firstName, $lastName, $username,
                                            $password, $phoneNo, $imageUrl,
                                            $email, $activated);

# delete user
echo $nectar->getUserFactory()->deleteUser();

# create public key
$name = "Public Key";
$key = "MIICIjANBgkqhkiG9w0BAQEFAAOCAg8AMIICCgKCAgEAgZqr+BXGwQWe5UMY5CLM6a+XbFIZT0CAy/hx8Adhlb0PrwiQ9w4NNy9YMGTyvVTRyKBRgEjFNTJKBBDPFpWJyMa5BmL3JKmGZIYyWaggAILC2QbnEo2GqKbGfys3kiD/HfKCbxwohhNLieI+ULXw46IIriUEQCtx+AZyYTr620E26u1ANMvKzJLZQxTawUDNgy9S/YHSpMMftTF3LbEK5F2J33tLEbRBOVY4fvPL8w3YCx1Wu911+xz7UyVjdLDn26YoSl7+Fz5zZdwdhRMr+hDF8CInhbtAb1/cptFW4VBFVjDmHWn61bHUITbLWK5WRUzYoFWso4yOFYuq7JSMVYBKJE+27aMKZgPWiVrYaZVROxWoge7H//O+/NpWhyj9/K2Mzo6QzcLPTmw/1KN7CvIFIXDo+5wNZ+XFHuDeOaWrd2sMKvqXpEusdZYiuxy0e7Sze8/O5ada3BgFiM50DR1AIjZGONKEfAi2cGRXpBfCBUAU64RMeevobkrDzOSXCDy19o9wTfk4eRiWsuPIGm6zsJqA73+dW0KcSylBF5eaoPQbw/8WJjWClqlpQLfiKwnL2mjk6oFDAtVBfeRNjwd7Dyy1TvdbRJ5QwkfSHuwU2TphwPu/uMRJPOxvtMwgC3LXKnFEB2O9EzEDCrPmv6rOJn1i0tByDcNT0gL49MMCAwEAAQ==";
$activated = true;
echo $nectar->getPublicKeysFactory()->createPublicKey($name, $key, $activated);

# get public keys
echo $nectar->getPublicKeysFactory()->getPublicKeys($activated);

# activate public keys
echo $nectar->getPublicKeysFactory()->activatedPublicKey('6897b9fb-3c54-440a-b802-e3765156df88');

# deactivate public keys
echo $nectar->getPublicKeysFactory()->deactivatePublicKey('6897b9fb-3c54-440a-b802-e3765156df88');

# get notifications
echo $nectar->getNotificationsFactory()->getNotifications();

# set notification read status
$ref = "931ef4e4-b375-40d8-b58e-c1874792ce64";
$status = true;
$timestamp = 1606754076302;
echo $nectar->getNotificationsFactory()->setNotificationReadStatus($ref, $status, $timestamp);

# get credits
echo $nectar->getCreditsFactory()->getCredits();

# get transactions
echo $nectar->getCreditsFactory()->getTransactions();

# get credentials
echo $nectar->getCredentialsFactory()->getCredentials('d41879ff-cb85-4bef-89a1-6c3cd7e2dd58');

# activate credentials
echo $nectar->getCredentialsFactory()->activateCredentials('d41879ff-cb85-4bef-89a1-6c3cd7e2dd58');

# deactivate credentials
echo $nectar->getCredentialsFactory()->deactivateCredentials('d41879ff-cb85-4bef-89a1-6c3cd7e2dd58');

# get configurations
echo $nectar->getConfigurationsFactory()->getConfiguration('47693f75-b77f-4280-b00f-9c0d90111a63', true);

# activate configurations
echo $nectar->getConfigurationsFactory()->activateConfiguration('ac3380d8-5d85-4161-92e5-03c1dc62de3d');

# deactivate configurations
echo $nectar->getConfigurationsFactory()->deactivateConfiguration('ac3380d8-5d85-4161-92e5-03c1dc62de3d');

// -- class 0 params ---
$tokenId = DateTime::createFromFormat('Y-m-d\TH:i:s', '2020-01-15T10:20:00');
$amount = 10; 
$isStid = false;
$randomNo = 5;
$drn = '47500150231';
$configRef = 'cbf43d1f-8c2d-44a0-95a9-9c3c13ec846c';
$debug = false;

# generate electricity token
echo $nectar->getTokensFactory()->generateElectricityToken($tokenId, $amount, $isStid, $randomNo, $drn, $configRef, $debug);

# generate water token
echo $nectar->getTokensFactory()->generateWaterToken($tokenId, $amount, $isStid, $randomNo, $drn, $configRef, $debug);

# generate gas token
echo $nectar->getTokensFactory()->generateGasToken($tokenId, $amount, $isStid, $randomNo, $drn, $configRef, $debug);

// --- class 1 params ---
$tokenId = DateTime::createFromFormat('Y-m-d\TH:i:s', '2020-01-15T10:20:00');
$control = '68719476735';
$manufacturerCode = 21;
$isStid = false;
$drn = '47500150231';
$configRef = 'cbf43d1f-8c2d-44a0-95a9-9c3c13ec846c';
$debug = false;

# generateInitiateMeterTestDisplay10Token
echo $nectar->getTokensFactory()->generateInitiateMeterTestDisplay10Token($tokenId, $control, $manufacturerCode, $isStid, $drn, $configRef, $debug);

$control = '268435455';
$manufacturerCode = 1234;

# generateInitiateMeterTestDisplay11Token
echo $nectar->getTokensFactory()->generateInitiateMeterTestDisplay11Token($tokenId, $control, $manufacturerCode, $isStid, $drn, $configRef, $debug);

// --- class 2,0 params ---
$tokenId = DateTime::createFromFormat('Y-m-d\TH:i:s', '2020-01-15T10:20:00');
$maximumPowerLimit = 100;
$randomNo = 5;
$isStid = false;
$drn = '47500150231';
$configRef = 'cbf43d1f-8c2d-44a0-95a9-9c3c13ec846c';
$debug = false;

# generateSetMaximumPowerLimitToken
echo $nectar->getTokensFactory()->generateSetMaximumPowerLimitToken($tokenId, $maximumPowerLimit, $randomNo, $isStid, $drn, $configRef, $debug);

// --- class 2,1 params ---
$tokenId = DateTime::createFromFormat('Y-m-d\TH:i:s', '2020-01-15T10:20:00');
$register = 0;
$randomNo = 5; 
$isStid = false;
$drn = '47500150231';
$configRef =  'cbf43d1f-8c2d-44a0-95a9-9c3c13ec846c';
$debug = false;

# generateClearCreditToken
echo $nectar->getTokensFactory()->generateClearCreditToken($tokenId, $register, $randomNo, $isStid, $drn, $configRef, $debug);

// --- class 2,2 params ---
$tokenId = DateTime::createFromFormat('Y-m-d\TH:i:s', '2020-01-15T10:20:00');
$tariffRate = 10;
$randomNo = 5;
$isStid = false;
$drn = '47500150231';
$configRef =  'cbf43d1f-8c2d-44a0-95a9-9c3c13ec846c';
$debug = false;

# generateSetTariffRateToken
echo $nectar->getTokensFactory()->generateSetTariffRateToken($tokenId, $tariffRate, $randomNo, $isStid, $drn, $configRef, $debug);


// --- class 2,3-4 params ---
$tokenId = DateTime::createFromFormat('Y-m-d\TH:i:s', '2020-01-15T10:20:00'); 
$newVendingKey = '0abc12def3456789';
$newSupplyGroupCode = '000046'; 
$newTariffIndex = '01';
$newKeyRevisionNo = 1;
$newKeyType = 0;
$newKeyExpiryNo = 255;
$newDrn = '47500150231';
$newIssuerIdentificationNo = '600727';
$ro = 0;
$isStid = false;
$drn = '47500150231';
$configRef =  'cbf43d1f-8c2d-44a0-95a9-9c3c13ec846c';
$debug = false;

# generateSet1stSectionDecoderKeyToken
echo $nectar->getTokensFactory()->generateSet1stSectionDecoderKeyToken($tokenId, $newVendingKey, $newSupplyGroupCode, $newTariffIndex,
                                                                        $newKeyRevisionNo, $newKeyType, $newKeyExpiryNo, $newDrn, $newIssuerIdentificationNo, $ro, 
                                                                        $isStid, $drn, $configRef, $debug);

# generateSet2ndSectionDecoderKeyToken
echo $nectar->getTokensFactory()->generateSet2ndSectionDecoderKeyToken($tokenId, $newVendingKey, $newSupplyGroupCode, $newTariffIndex,
                                                                        $newKeyRevisionNo, $newKeyType, $newKeyExpiryNo, $newDrn, $newIssuerIdentificationNo, $ro, 
                                                                        $isStid, $drn, $configRef, $debug);

// --- class 2,5 params ---
$tokenId = DateTime::createFromFormat('Y-m-d\TH:i:s', '2020-01-15T10:20:00');
$pad = 10;
$randomNo = 5;
$isStid = false;
$drn = '47500150231';
$configRef =  'cbf43d1f-8c2d-44a0-95a9-9c3c13ec846c';
$debug = false;

# generateClearTamperConditionToken
echo $nectar->getTokensFactory()->generateClearTamperConditionToken($tokenId, $pad, $randomNo, $isStid, $drn, $configRef, $debug);

// --- class 2,6 params ---
$tokenId = DateTime::createFromFormat('Y-m-d\TH:i:s', '2020-01-15T10:20:00');
$mppul = 10;
$randomNo = 5;
$isStid = false;
$drn = '47500150231';
$configRef =  'cbf43d1f-8c2d-44a0-95a9-9c3c13ec846c';
$debug = false;

# generateSetMaximumPhasePowerUnbalanceLimitToken
echo $nectar->getTokensFactory()->generateSetMaximumPhasePowerUnbalanceLimitToken($tokenId, $mppul, $randomNo, $isStid, $drn, $configRef, $debug);

// --- class 2,7 params ---
$tokenId = DateTime::createFromFormat('Y-m-d\TH:i:s', '2020-01-15T10:20:00'); 
$wmFactor = 10;
$randomNo = 5;
$isStid = false;
$drn = '47500150231';
$configRef =  'cbf43d1f-8c2d-44a0-95a9-9c3c13ec846c';
$debug = false;

# generateSetWaterMeterFactorToken
echo $nectar->getTokensFactory()->generateSetWaterMeterFactorToken($tokenId, $wmFactor, $randomNo, $isStid, $drn, $configRef, $debug);
```

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details

