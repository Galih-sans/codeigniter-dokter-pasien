# Codeigniter Dokter dan Pasien

## Contoh penerapan CRUD data Dokter dan Pasien yang berelasi dengan Codeigniter 4

MENU DOKTER
<img src="https://private-user-images.githubusercontent.com/43230707/300314491-472c30cd-3472-46f7-9e9d-c040efe567bf.png?jwt=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJnaXRodWIuY29tIiwiYXVkIjoicmF3LmdpdGh1YnVzZXJjb250ZW50LmNvbSIsImtleSI6ImtleTUiLCJleHAiOjE3MDY0OTQzNzAsIm5iZiI6MTcwNjQ5NDA3MCwicGF0aCI6Ii80MzIzMDcwNy8zMDAzMTQ0OTEtNDcyYzMwY2QtMzQ3Mi00NmY3LTllOWQtYzA0MGVmZTU2N2JmLnBuZz9YLUFtei1BbGdvcml0aG09QVdTNC1ITUFDLVNIQTI1NiZYLUFtei1DcmVkZW50aWFsPUFLSUFWQ09EWUxTQTUzUFFLNFpBJTJGMjAyNDAxMjklMkZ1cy1lYXN0LTElMkZzMyUyRmF3czRfcmVxdWVzdCZYLUFtei1EYXRlPTIwMjQwMTI5VDAyMDc1MFomWC1BbXotRXhwaXJlcz0zMDAmWC1BbXotU2lnbmF0dXJlPWNhNjg5ZDM2MTI1ZDRlMDgxMzdkZjE5MDQzNTI1MjgwMjRlM2MxOTEyODc4MDA0MGQyYWM0Y2VhOWVhM2UyMWYmWC1BbXotU2lnbmVkSGVhZGVycz1ob3N0JmFjdG9yX2lkPTAma2V5X2lkPTAmcmVwb19pZD0wIn0.nfBun5MPwfYtBODtoSmIg2PaWxm38FTF3J_34Sj3lfw" height="50%"/>&nbsp;

ADD DOKTER
<img src="https://private-user-images.githubusercontent.com/43230707/300314845-d6201cac-670d-4984-99a6-cd6245493131.png?jwt=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJnaXRodWIuY29tIiwiYXVkIjoicmF3LmdpdGh1YnVzZXJjb250ZW50LmNvbSIsImtleSI6ImtleTUiLCJleHAiOjE3MDY0OTQyMDUsIm5iZiI6MTcwNjQ5MzkwNSwicGF0aCI6Ii80MzIzMDcwNy8zMDAzMTQ4NDUtZDYyMDFjYWMtNjcwZC00OTg0LTk5YTYtY2Q2MjQ1NDkzMTMxLnBuZz9YLUFtei1BbGdvcml0aG09QVdTNC1ITUFDLVNIQTI1NiZYLUFtei1DcmVkZW50aWFsPUFLSUFWQ09EWUxTQTUzUFFLNFpBJTJGMjAyNDAxMjklMkZ1cy1lYXN0LTElMkZzMyUyRmF3czRfcmVxdWVzdCZYLUFtei1EYXRlPTIwMjQwMTI5VDAyMDUwNVomWC1BbXotRXhwaXJlcz0zMDAmWC1BbXotU2lnbmF0dXJlPWVkZmIwYTA4ZmUzMWI1ZGRiYjU4NzdiNjczNGFiNjViZDdjYzk4MDkxMDRkZTllMDYxMWYyNjc4ZjUwMTdmZDUmWC1BbXotU2lnbmVkSGVhZGVycz1ob3N0JmFjdG9yX2lkPTAma2V5X2lkPTAmcmVwb19pZD0wIn0.nrTczS8OnbpWXmecS3a6YXMGeJ413YaZIvwl_nQs7_w" height="50%"/>&nbsp;

MENU PASIEN
<img src="https://private-user-images.githubusercontent.com/43230707/300314708-b2f0f98c-2945-46e9-95f3-de234b981e72.png?jwt=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJnaXRodWIuY29tIiwiYXVkIjoicmF3LmdpdGh1YnVzZXJjb250ZW50LmNvbSIsImtleSI6ImtleTUiLCJleHAiOjE3MDY0OTQ1MDIsIm5iZiI6MTcwNjQ5NDIwMiwicGF0aCI6Ii80MzIzMDcwNy8zMDAzMTQ3MDgtYjJmMGY5OGMtMjk0NS00NmU5LTk1ZjMtZGUyMzRiOTgxZTcyLnBuZz9YLUFtei1BbGdvcml0aG09QVdTNC1ITUFDLVNIQTI1NiZYLUFtei1DcmVkZW50aWFsPUFLSUFWQ09EWUxTQTUzUFFLNFpBJTJGMjAyNDAxMjklMkZ1cy1lYXN0LTElMkZzMyUyRmF3czRfcmVxdWVzdCZYLUFtei1EYXRlPTIwMjQwMTI5VDAyMTAwMlomWC1BbXotRXhwaXJlcz0zMDAmWC1BbXotU2lnbmF0dXJlPTA5ZjQyZmEzY2RjZWM0YzUwZWFhYzUxNzIyMWEyMDlmNGQ0NmM3NjUxOTU0OGM2Yjk2YjJlNDVjNWJiMzdiZjYmWC1BbXotU2lnbmVkSGVhZGVycz1ob3N0JmFjdG9yX2lkPTAma2V5X2lkPTAmcmVwb19pZD0wIn0.8tmJ1_swNyUgKNopCEhHajxLbz7aHjNowlOfmzwEDCw" height="50%"/>&nbsp;

ADD PASIEN
<img src="https://private-user-images.githubusercontent.com/43230707/300314762-a5a1338e-62ce-4edc-90fc-3fbdc82f5001.png?jwt=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJnaXRodWIuY29tIiwiYXVkIjoicmF3LmdpdGh1YnVzZXJjb250ZW50LmNvbSIsImtleSI6ImtleTUiLCJleHAiOjE3MDY0OTQ1MTksIm5iZiI6MTcwNjQ5NDIxOSwicGF0aCI6Ii80MzIzMDcwNy8zMDAzMTQ3NjItYTVhMTMzOGUtNjJjZS00ZWRjLTkwZmMtM2ZiZGM4MmY1MDAxLnBuZz9YLUFtei1BbGdvcml0aG09QVdTNC1ITUFDLVNIQTI1NiZYLUFtei1DcmVkZW50aWFsPUFLSUFWQ09EWUxTQTUzUFFLNFpBJTJGMjAyNDAxMjklMkZ1cy1lYXN0LTElMkZzMyUyRmF3czRfcmVxdWVzdCZYLUFtei1EYXRlPTIwMjQwMTI5VDAyMTAxOVomWC1BbXotRXhwaXJlcz0zMDAmWC1BbXotU2lnbmF0dXJlPTVjMDAzYjVjODJkODE1ZTFiOGU1ZThhODI0OGFiMTBjZjRlODlhMmNjNDViMThmODBjMTI1OTcxOWZiY2YzMzkmWC1BbXotU2lnbmVkSGVhZGVycz1ob3N0JmFjdG9yX2lkPTAma2V5X2lkPTAmcmVwb19pZD0wIn0.dT8EpAbj8npg25f9KTo41c7K3o5XlOAB8q_JN3BtbOE" height="50%"/>&nbsp;

## Installation & updates

`composer create-project codeigniter4/appstarter` then `composer update` whenever
there is a new release of the framework.

When updating, check the release notes to see if there are any changes you might need to apply
to your `app` folder. The affected files can be copied or merged from
`vendor/codeigniter4/framework/app`.

## Setup

Copy `env` to `.env` and tailor for your app, specifically the baseURL
and any database settings.

## Important Change with index.php

`index.php` is no longer in the root of the project! It has been moved inside the *public* folder,
for better security and separation of components.

This means that you should configure your web server to "point" to your project's *public* folder, and
not to the project root. A better practice would be to configure a virtual host to point there. A poor practice would be to point your web server to the project root and expect to enter *public/...*, as the rest of your logic and the
framework are exposed.

**Please** read the user guide for a better explanation of how CI4 works!

## Repository Management

We use GitHub issues, in our main repository, to track **BUGS** and to track approved **DEVELOPMENT** work packages.
We use our [forum](http://forum.codeigniter.com) to provide SUPPORT and to discuss
FEATURE REQUESTS.

This repository is a "distribution" one, built by our release preparation script.
Problems with it can be raised on our forum, or as issues in the main repository.

## Server Requirements

PHP version 7.4 or higher is required, with the following extensions installed:

- [intl](http://php.net/manual/en/intl.requirements.php)
- [libcurl](http://php.net/manual/en/curl.requirements.php) if you plan to use the HTTP\CURLRequest library

Additionally, make sure that the following extensions are enabled in your PHP:

- json (enabled by default - don't turn it off)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php)
- xml (enabled by default - don't turn it off)
