## PC-Assist WebApp
This page allows you to download a ready to use version of the PC-Assist app. 

### Pairing Service
Cloudradar GmbH – the creators of Plexus – host a public pairing service that redirects to your Plexus server. 
This allows you to use the pre-compiled version of PC-Assist without compiling in the url of your server and without the need to host the downloads.

The app always connects to `GET https://pc-assist.app/pairing/{code}`. 
It's your duty to create pairing codes and deposit the URL of your Plexus server before the remote side starts the app.
If the code is valid, a 302 redirect is returned and the app connects to your Plexus server

### Create pairing codes
With a simple HTTP post request you create a pairing code. The code is valid for 10 minutes.

Example using form data:
```shell
curl https://pc-assist.app/pairing \
  -F url=https:/plexus.example.com
  
{
  "success": true,
  "code": "tes5il",
  "pairing_url": "https://pc-assist.app/pairing/tes5il",
  "redirect_url": "https:/plexus.example.com"
} 
```

Example using json:
````shell
curl -Ss https://pc-assist.app/pairing \
  --data-raw '{"url":"https://plexus.example.com"}' \ 
  -H "content-type:application/json"
  
{
  "success": true,
  "code": "mz7rwc",
  "pairing_url": "https://pc-assist.app/pairing/mz7rwc",
  "redirect_url": "https://plexus.example.com/mz7rwc"
}
````

### Rate limit
You can create a new pairing code every five seconds per remote address.
If you send faster, HTTP 429 is returned.
