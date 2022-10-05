# Employbrand Ambassador PHP SDK

Connect your app to the Employbrand Ambassador application with the easy-to-use PHP SDK. When instantiating the EmploybrandAmbassador class, you must provide the company ID and company access token. You can get these credentials form in the Employbrand Hub under 'Advanced > Employbrand API > Ambassador'.  

## Installation
```bash
composer require employbrand/ambassador-php-sdk
```

## Usage
Creating the client.
```php
$client = new EmploybrandAmbassadorClient($companyId, $accessToken);
$client->...
```

Example
```php
$client = new EmploybrandAmbassadorClient($companyId, $accessToken);

# Get
$candidate = $client->candidates()->getById(1);

# Update
$candidate->firstName = 'Harry';
$client->candidates()->update($candidate->id, $candidate);

# List
$list = $client->candidates()->list();
$list->query(['active' => true]);

$list->page(1); // get the first page
$list->all(); // load all results (multiple API calls)
```


## Documentation
This SDK is build based on the documentation publicly available at https://documentation.ambassador.employbrand.app/.
