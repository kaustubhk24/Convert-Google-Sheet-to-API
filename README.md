# Convert-Google-Sheet-to-API

It's very easy to use Google Sheet as API, Just download  and host the index.php file, do not use given example for production as it is free version, it will not be available all the time,

Open Your Google Sheet and Go to File -> Share -> Publish to Web,<br /> 
![image](https://user-images.githubusercontent.com/57136442/162561491-a3537171-fcae-4787-ac2d-39641bd4c90e.png)

then select sheet you want to publish and then select as web page.

<img width="328" alt="image" src="https://user-images.githubusercontent.com/57136442/162561446-03e9685e-dd2a-482c-8d9e-944b6684aea3.png">


Now Google sheet part is done
## Hosting Part
Now if you have hosted index file at suppose example.com then visit
example.com/index.php?

Paramaters will be

```
URL : example.com/index.php?
format : json or xml or array
file : url of google drive you just got when you published as webpage

example :
www.example.com/index.php?format=json&file=https://docs.google.com/your-file-published-url
```
### PLEASE NOTE THAT XML IS NOT WORKING PROPERLY, BUT ARRAY AND JSON WORKING PROPERLY
