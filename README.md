# Transformers Community

Transformers Community is a dashboard where young people can talk/share things with each other. These are young people who are between 16 and 27 years old and who are engaged in personal development. This could be, for example, insecure young people. The aim is for young people to feel that they are not alone, and to be able to talk about it and share their feelings.

#### First time Setup
```bash
# Clone the repository to your device.
git clone git@github.com:MeesPos/transformers-community.git

# Install composer packages with
composer install

# Install the NPM packages with
npm install

# Build files with npm
npm run dev

# Copy the .env.example and change the copied file name to .env
cp .env.example .env

# Generate an app key (dont use on production or staging)
php artisan key:generate

# ! When you are done with setting up the .env file proceed

# Migrate and seed the tables and data to your database
php artisan migrate --seed
```
#### Setup Environment

##### Database
Add the right database credentials in the ```.env``` file
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=robin-assists
DB_USERNAME=root
DB_PASSWORD=
```

#### Mail server
Add the right mail credentials. [Mailtrap](https://mailtrap.io/) or [Mailhog](https://github.com/mailhog/MailHog) are recommended.
```
MAIL_MAILER=smtp
MAIL_HOST=mailhog
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=noreply@robinassists.me
MAIL_FROM_NAME="${APP_NAME}"
```

#### Pusher
Add the right Pusher credentials. Create an account on [pusher.com](https://pusher.com/) and add the next credentials:
```
PUSHER_APP_CLUSTER=
PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
```

And change the Broadcast driver to Pusher:
```
BROADCAST_DRIVER=pusher
```
