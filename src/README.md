# Nectar PHP7 SDK

Nectar provides the quickest way to integrate with the MPESA {daraja} SDKs. This repository contains the PHP7.1+ wrapper API around Nectar REST MPESA API.

## Getting Started

Please ensure that you have PHP7.1+ installed to use these bindings.

### Examples


```
$key = '5ce0189ba8ce979e354c280560988c49';
$secret = '4185ec490c5dd1da62688554c291641f';
$nectar = new Nectar($key, $secret);

# create user
echo $nectar->getUserFactory()->createUser("George", "Micheal", "george",
    "password", "0703133894", "george@gmail.com",
    "https://nectar-avatar-images.s3.amazonaws.com/1557909926.jpeg");

# get user
echo $nectar->getUserFactory()->getUser('first');

# update user
echo $nectar->getUserFactory()->updateUser("a51d5ecddfa5041096ea0c37e6de1fdf", "Another George", "Micheal", "george",
    "password", "0703133894", "george@gmail.com",
    "https://nectar-avatar-images.s3.amazonaws.com/1557909926.jpeg");

# delete user
echo $nectar->getUserFactory()->deleteUser('89ca63d93e317c33e2a2e62f7212bb2e');

# get keywords
echo $nectar->getKeywordsFactory()->getKeywords();

# create keywords
echo $nectar->getKeywordsFactory()->createKeywords(['NEW'], 'https://nectar.software/log.php', Env::live);

# delete keywords
echo $nectar->getKeywordsFactory()->deleteKeyword('bf62210b4df2bda52c200103b290566c');

# get banks
echo $nectar->getBanksFactory()->getBanks();

# create account
echo $nectar->getAccountFactory()->createAccount('3ec0192b733cd6d65bd9f5543dd41e5f', '76823454295');

# get account
echo $nectar->getAccountFactory()->getAccount('28831286994bd9d781292a4f085b3331');

# update account
echo $nectar->getAccountFactory()->updateAccount('28831286994bd9d781292a4f085b3331',
    '3ec0192b733cd6d65bd9f5543dd41e5f', '6578234234');

# delete account
echo $nectar->getAccountFactory()->deactivateAccount('28831286994bd9d781292a4f085b3331');

# get credentials
echo $nectar->getCredentialsFactory()->getCredentials();

# activate credentials
echo $nectar->getCredentialsFactory()->activateCredentials('984c1e6735cc32583308ff3df675c28b');

# deactivate credentials
echo $nectar->getCredentialsFactory()->deactivateCredentials('984c1e6735cc32583308ff3df675c28b');

# prompt stk push
echo $nectar->getSTKPushTransactionsFactory()->promptSTKPushPayment(PaymentType::mpesa_stk_push,
    '254703133896', 'https://nectar.software/log.php', 'Sweater',
    'Payment for Sweater', 100, '28831286994bd9d781292a4f085b3331', Env::live);

# poll stk push
echo $nectar->getSTKPushTransactionsFactory()->pollSTKPushTransaction(PaymentStatusType::mpesa_stk_poll,
    'b871e5878b6b627f3b80756b19e0ae8c');

# poll c2b transactions
echo $nectar->getC2BTransactionsFactory()->pollTransactions(PaymentStatusType::mpesa_poll,
    'NEU998F3UJ', 'https://nectar.software/log.php', Env::live);

```

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details.
