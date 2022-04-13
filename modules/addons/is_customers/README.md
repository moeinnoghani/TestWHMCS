# Iranserver Campaign 1401
## Custom Addon Moulde for WHMCS



### Features

- Validate Email and Check Client Emails
- Send VerifyCode to Client's Email and Set Expiration Time
- Show Respone and Errors for Requests
- Send Client History After Send Correct Validation Code
- Generate a Specific Offer Code for Clients


### Installation

You need install WHMCS verison 8.0 and Just Copy "is_customers" directory in modules/addons.

Finally Run Your Localhost and Send Requests.



### Requests

| Details                                  | Method | URL | Parameters           |
|------------------------------------------|--------|-----|----------------------|
| To Send ValidationCode To Client's Email | POST   |   http://localhost/whmcs-8/index.php?m=is_customers&action=IranserverCampaign1401/register  | email                |
| To Get and Show Client History           | GET    | http://localhost/whmcs-8/index.php?m=is_customers&action=IranserverCampaign1401/getClientHistory | email,validationCode |
| To Generate and Send OfferCode to Client's Email                                         | POST   |     | email,validationCode  |


### Response
| Action                         | Response                                                                                                                                                            | Parameters           | URL |
|--------------------------------|---------------------------------------------------------------------------------------------------------------------------------------------------------------------|----------------------|-----|
| Send Email Using EmailApi      | Show Email LocalAPI Respone                                                                                                                                         | email                |     |
| To Get and Show Client History | GET                                                                                                                                                                 | email,validationCode |     |
| Error for non-client's         | [       'errors'  =>  [           'status'  =>  '' ,           'title'  =>  'Email Not Found' ,           'detail'  =>  "you're not a Iranserver client"       ]  ] |                      |     |
