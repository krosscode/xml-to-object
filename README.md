# XML to object

This library simply converts XML into an object.

## Getting started

XML to object is very easy to use. **Example:**

```php
// Using composer here, but you can also directly include XmlToObject.php
require_once __DIR__ . '/vendor/autoload.php';

// Import the function
use function KrossCode\XmlToObject\xmlToObject;

// First we need to get the contents of our XML file
$xmlContents = file_get_contents('path/to/xml/file.xml');
if (!$xmlContents) return false; // File couldn't be read

// Now we try to convert the XML to an object
$xmlObject = xmlToObject($xmlContents);
if (!$xmlObject) return false; // XML couldn't be converted to an object

print_r($xmlObject); // Success!
```

## Example

What does the object look like, compared to the XML?

### XML

```xml
<GroceryStore xmlns="https://example.com/schema/base" xmlns:ns3="https://example.com/schema/ns3">
	<Name>Johnny's Green Goods</Name>
	<GroceryCollection>
		<ns3:Grocery id="13">
			<Name>Cucumber</Name>
			<Amount>63</Amount>
			<Price>1.99</Price>
		</ns3:Grocery>
		<ns3:Grocery id="17">
			<Name>Carrot</Name>
			<Amount>24</Amount>
			<Price>1.79</Price>
		</ns3:Grocery>
	</GroceryCollection>
</GroceryStore>
```

### Object (represented in JSON)

```json
{
    "Name": "Johnny's Green Goods",
    "GroceryCollection": {
        "Grocery": [
            {
                "@attributes": {
                    "id": "13"
                },
                "Name": "Cucumber",
                "Amount": "63",
                "Price": "1.99"
            },
            {
                "@attributes": {
                    "id": "17"
                },
                "Name": "Carrot",
                "Amount": "24",
                "Price": "1.79"
            }
        ]
    }
}
```
