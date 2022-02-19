# The Rick and Morty API PHP Client

[![Latest Stable Version](http://poser.pugx.org/phpunit/phpunit/v)](https://packagist.org/packages/nickbeen/rick-and-morty-api-php)
[![PHP Version Require](http://poser.pugx.org/phpunit/phpunit/require/php)](https://packagist.org/packages/nickbeen/rick-and-morty-api-php)
[![License](http://poser.pugx.org/phpunit/phpunit/license)](https://packagist.org/packages/nickbeen/rick-and-morty-api-php)

An API wrapper written in PHP for the Rick and Morty API at [https://rickandmortyapi.com]().

Get all the information about characters, episodes and locations of Rick and Morty with this PHP client without messing around with Curl calls and JSON responses. This library does not return the same JSON provided by the API, but wraps everything in convenient PHP class objects. The Rick and Morty API is made by [Axel Fuhrmann](https://github.com/afuh).

## Requirements

* PHP >= 8.0
* JSON extension (enabled by default since PHP 8.0)

## Installation

Install the library into your project with Composer.

```
composer require nickbeen/rick-and-morty-php-api
```

## Usage

Initiate a `Character`, `Episode` or `Location` model and use the available tools to list, retrieve or search within that model. The library returns a `NotFoundException` when using invalid arguments, retrieving nonexistent models or if the Rick and Morty API is not available. Implement a try block to handle the exception in your application in the best possible way. 

### Collections

Requests for all characters, episodes and locations as well as queries with search parameters will return a `Collection` object containing an array with results.

#### Collection object

| Field | Type | Description |
| ----- | ---- | ----------- |
| info | [Info](#info-object) | Information about the collection |
| results | [Character[]](#characters)<br>[Episode[]](#episodes)<br>[Location[]](#locations) | Array containing characters, episodes or locations |

#### Info object

| Field | Type | Description |
| ----- | ---- | ----------- |
| count | integer | The length of the response |
| pages | integer | The amount of pages |
| next | ?string | Link to the next page (if it exists) |
| prev | ?string | Link to the previous page (if it exists) |

**Usage**

For instructions for the usage of collections, check the sections [Characters](#characters), [Episodes](#episodes) and [Locations](#locations) for more details and examples.

### Api

This library contains a useful method to return all the endpoints of the Rick and Morty API in an `Api` object.

#### Api object

| Field | Type | Description |
| ----- | ---- | ----------- |
| characters | string | Endpoint used for retrieving characters |
| episodes | string | Endpoint used for retrieving episodes |
| locations | string | Endpoint used for retrieving locations |

**Usage**

Retrieve an `Api` object containing the endpoints for retrieving characters, episodes and locations.

```php
$api = new Api();
$api->get();

echo $api->characters;
echo $api->episodes;
echo $api->locations;
```

### Characters

Retrieve any character from Rick and Morty, browse through all the characters or use search parameters to find a specific character.

#### Character object

| Field | Type | Description |
| ----- | ---- | ----------- |
| id | integer  | The id of the character |
| name | string | The name of the character |
| status | string | The status of the character |
| species | string | The species of the character |
| type | string | The type or subspecies of the character |
| gender | string | The gender of the character |
| origin | [Origin](#origin-object) | Name and link to the character's origin location endpoint |
| location | [Location](#location-object) | Name and link to the character's last known location endpoint |
| image | string | Link to the character's image |
| episode | string[] | List of episodes in which this character appeared |
| url | string | Link to the character's own URL endpoint |
| created | string | Time at which the character was created in the database |

#### Origin object

| Field | Type | Description |
| ----- | ---- | ----------- |
| name | string | The name of the character |
| url | string | Url to the character's last known location endpoint |

#### Location object

| Field | Type | Description |
| ----- | ---- | ----------- |
| name | string | The name of the character's origin location |
| url | string | Url to the character's origin location endpoint |

#### List characters

Retrieve a `Collection` object with next 20 characters from the first page.

```php
$characters = new Character();
$characters->get();

foreach ($characters->results as $character) {
    echo $character->name;
}
```

Retrieve a `Collection` object with next 20 characters from the second page.

```php
$characters = new Character();
$characters->page(2)
    ->get();

foreach ($characters->results as $character) {
    echo $character->name;
}
```

#### Get character

Retrieve a `Character` object with id 1.

```php
$character = new Character();
$character->get(1);

echo $character->name;
```

#### Get multiple characters

Retrieve an array containing `Character` objects with id 1 and 2.

```php
$characters = new Character();
$characters->get(1,2);

foreach ($characters as $character) {
    echo $character->name;
}
```

#### Search characters

It is possible to search for characters based on search parameters such as species and name. For gender and status you can use a Gender enum object and Status enum object for auto-completion in an IDE.

| Method | Type | Description |
| ----- | ---- | ----------- |
| withGender | [Gender](#gender-object) | Filter by given gender |
| withName | string | Filter by given name |
| withSpecies | string | Filter by given species |
| withStatus | [Status](#status-object) | Filter by given status |
| withType | string | Filter by given type |

#### Gender object

| Field | Type | Description |
| ----- | ---- | ----------- |
| Gender::FEMALE() | string | Female |
| Gender::GENDERLESS() | string | Genderless |
| Gender::MALE() | string | Male |
| Gender::UNKNOWN() | string | Unknown |

#### Status object

| Field | Type | Description |
| ----- | ---- | ----------- |
| Status::ALIVE() | string | Alive |
| Status::DEAD() | string | Dead |
| Status::UNKNOWN() | string | Unknown |

Retrieve a `Collection` with all alive male Ricks.

```php
$characters = new Character();
$characters->withGender(Gender::MALE())
    ->withName('Rick')
    ->withStatus(Status::ALIVE())
    ->get();

foreach ($characters->results as $character) {
    echo $character->name;
}
```

### Episodes

Retrieve any episode from Rick and Morty, browse through all the episodes or use search parameters to find a specific episode.

#### Episode object

| Field | Type | Description |
| ----- | ---- | ----------- |
| id | integer | The id of the episode |
| name | string | The name of the episode |
| air_date | string | The air date of the episode |
| episode | string | The code of the episode |
| characters | string[] | List of characters who have been seen in the episode |
| url | string | Link to the episode's own URL endpoint |
| created | string | Time at which the episode was created in the database |

#### List episodes

Retrieve a `Collection` object with first 20 episodes from the first page.

```php
$episodes = new Episode();
$episodes->get();

foreach ($episodes->results as $episode) {
    echo $episode->name;
}
```

Retrieve a `Collection` object with next 20 episodes from the second page.

```php
$episode = new Episode();
$episode->page(2)
    ->get();

foreach ($episodes->results as $episode) {
    echo $episode->name;
}
```

#### Get episode

Retrieve an `Episode` object with id 1.

```php
$episode = new Episode();
$episode->get(1);

echo $episode->name;
```

#### Get multiple episodes

Retrieve an array containing `Episode` objects with id 1 and 2.

```php
$episodes = new Episode();
$episodes->get(1,2);

foreach ($episodes as $episode) {
    echo $episode->name;
}
```

#### Search episodes

It is possible to search for episodes based on search parameters such as episode code (e.g. S01E01) and name.

| Method | Type | Description |
| ----- | ---- | ----------- |
| withEpisode | string | Filter by given episode code |
| withName | string | Filter by given name |

Retrieve a `Collection` object with all episodes from season 1.

```php
$episodes = new Episode();
$episodes->withEpisode('S01')
    ->get();

foreach ($episodes->results as $episode) {
    echo $episode->name;
}
```

### Locations

Retrieve any location from Rick and Morty, browse through all the featured locations or use search parameters to find a specific location.

**Location object**

| Field | Type | Description |
| ----- | ---- | ----------- |
| id | integer | The id of the location |
| name | string | The name of the location |
| type | string | The type of the episode |
| dimension | string | The dimension in which the location is located |
| residents | string[] | List of characters who have been seen in the location |
| url | string | Link to the location's own URL endpoint |
| created | string | Time at which the location was created in the database |

#### List locations

Retrieve a `Collection` object with first 20 locations from the first page.

```php
$locations = new Location();
$locations->get();

foreach ($locations->results as $location) {
    echo $location->name;
}
```

Retrieve a `Collection` object with next 20 locations from the second page.

```php
$locations = new Location();
$locations->page(2)
    ->get();

foreach ($locations->results as $location) {
    echo $location->name;
}
```

#### Get location

Retrieve a `Location` object with id 1.

```php
$location = new Location();
$location->get(1);

echo $location->name;
```

#### Get multiple locations

Retrieve an array containing `Location` objects with id 1 and 2.

```php
$locations = new Location();
$locations->get(1,2);

foreach ($locations as $location) {
    echo $location->name;
}
```

#### Search locations

It is possible to search for locations based on search parameters such as dimension and name.

| Method | Type | Description |
| ----- | ---- | ----------- |
| withDimension | string | Filter by given dimension |
| withName | string | Filter by given name |
| withType | string | Filter by the given type |

Retrieve a `Collection` object with all locations within dimension C-137.

```php
$location = new Location();
$location->withDimension('Dimension C-137')
    ->get();

foreach ($locations->results as $location) {
    echo $location->name;
}
```

## FAQ

### What are the limits of the API?
The API is open and requires no authentication. According to the R implementation [Mortyr](https://github.com/MikeJohnPage/mortyr), the API allows 10.000 requests per IP address per day after which any request will result in a 429 (Too Many Requests) response.

### Can I get more than 20 results per page in a Collection?

The API returns 20 results per page by design and this cannot be adjusted. It is however possible to return more than 20 results by manually inserting more than 20 ids in the `get()` method. 

### How about extra filters?

Not possible, this library already offers all the available filters currently provided by the API.

### Why is the code of the episode called `episode` in the Episode model?

It looks like an oopsie from the creator of the Rick And Morty API. There is an unresolved [pull request](https://github.com/afuh/rick-and-morty-api/issues/94) to rename the field to `code`.

## License

This library is licensed under the MIT License (MIT). See the [LICENSE](LICENSE.md) for more details.
