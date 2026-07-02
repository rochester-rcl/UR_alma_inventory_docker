# UR_alma_inventory_php_desktop

-Alma Inventory API application that can be launched using [PHP Desktop](https://github.com/cztomczak/phpdesktop) on Windows.   
For background on the application, see the [Ex Libris Developer Blog post](https://developers.exlibrisgroup.com/blog/Shelf-Inventory-using-Alma-APIs).

-Intent is to deploy this app on a small scale for use on stacks staff laptops and is not intended to be deployed at scale in its current state.

---

## Prerequisites

- [PHP Desktop Chrome 130.1 for Windows](https://github.com/cztomczak/phpdesktop/releases/tag/chrome-v130.1)
- Git
- An Ex Libris Alma API key with **read-only** access to the **Bibs** and **Configuration** APIs

## Configuration

- Add project files to ```www``` PHP Desktop folder.
- Download the ```cacert.pem``` file and place in ```www``` directory from [CA certificates extracted from Mozilla](https://curl.se/docs/caextract.html)
- Modify ```php.ini``` in the ```php``` folder to point to the CA certs and activate additional extensions:
```
[curl]
curl.cainfo = "cacert.pem"

[openssl]
openssl.cafile = "cacert.pem"

; Extensions
...
extension=mbstring
extension=curl
extension=pdo_mysql

extension_mbstring=on      
extension_curl=on          ; extension=curl
extension_simplexml=on     ; extension=simplexml
extension_xml=on           ; extension=xml
extension_openssl=on       ; extension=openssl
```
- In PHP Desktop, modify settings.json file to adjust app window size.
- Configure your Alma API key in ```key.php```.