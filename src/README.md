# Bees PHP7 SDK

Bees provides the quickest way to integrate with the MPESA {daraja} SDKs. This repository contains the PHP7.1+ wrapper API around Bees REST MPESA API.

## Getting Started

Please ensure that you have PHP7.1+ installed to use these bindings.

### Examples


```
$key = '5ce0189ba8ce979e354c280560988c49';
$secret = '4185ec490c5dd1da62688554c291641f';
$bees = new Bees($key, $secret);

# create user
echo $bees->getUserFactory()->createUser("George", "Micheal", "george",
    "password", "0703133894", "george@gmail.com",
    "https://bees-avatar-images.s3.amazonaws.com/1557909926.jpeg");

# get user
echo $bees->getUserFactory()->getUser('first');

# update user
echo $bees->getUserFactory()->updateUser("a51d5ecddfa5041096ea0c37e6de1fdf", "Another George", "Micheal", "george",
    "password", "0703133894", "george@gmail.com",
    "https://bees-avatar-images.s3.amazonaws.com/1557909926.jpeg");

# delete user
echo $bees->getUserFactory()->deleteUser('89ca63d93e317c33e2a2e62f7212bb2e');

# get keywords
echo $bees->getKeywordsFactory()->getKeywords();

# create keywords
echo $bees->getKeywordsFactory()->createKeywords(['NEW'], 'https://bees.software/log.php', Env::live);

# delete keywords
echo $bees->getKeywordsFactory()->deleteKeyword('bf62210b4df2bda52c200103b290566c');

# get banks
echo $bees->getBanksFactory()->getBanks();

# create account
echo $bees->getAccountFactory()->createAccount('3ec0192b733cd6d65bd9f5543dd41e5f', '76823454295');

# get account
echo $bees->getAccountFactory()->getAccount('28831286994bd9d781292a4f085b3331');

# update account
echo $bees->getAccountFactory()->updateAccount('28831286994bd9d781292a4f085b3331',
    '3ec0192b733cd6d65bd9f5543dd41e5f', '6578234234');

# delete account
echo $bees->getAccountFactory()->deactivateAccount('28831286994bd9d781292a4f085b3331');

# get credentials
echo $bees->getCredentialsFactory()->getCredentials();

# activate credentials
echo $bees->getCredentialsFactory()->activateCredentials('984c1e6735cc32583308ff3df675c28b');

# deactivate credentials
echo $bees->getCredentialsFactory()->deactivateCredentials('984c1e6735cc32583308ff3df675c28b');

# prompt stk push
echo $bees->getSTKPushTransactionsFactory()->promptSTKPushPayment(PaymentType::mpesa_stk_push,
    '254703133896', 'https://bees.software/log.php', 'Sweater',
    'Payment for Sweater', 100, '28831286994bd9d781292a4f085b3331', Env::live);

# poll stk push
echo $bees->getSTKPushTransactionsFactory()->pollSTKPushTransaction(PaymentStatusType::mpesa_stk_poll,
    'b871e5878b6b627f3b80756b19e0ae8c');

# poll c2b transactions
echo $bees->getC2BTransactionsFactory()->pollTransactions(PaymentStatusType::mpesa_poll,
    'NEU998F3UJ', 'https://bees.software/log.php', Env::live);

```

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details.
