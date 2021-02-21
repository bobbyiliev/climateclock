<p align="center">
    <a href="https://climateclock.bobby.sh" target="_blank">
        <img src="https://imgur.com/MGFiwwo.png" width="400">
    </a>
</p>

<div align="center">
    <p>
	    <a name="stars"><img src="https://img.shields.io/github/stars/bobbyiliev/climateclock?style=for-the-badge"></a>
	    <a name="forks"><img src="https://img.shields.io/github/forks/bobbyiliev/climateclock?logoColor=green&style=for-the-badge"></a>
	    <a name="contributions"><img src="https://img.shields.io/github/contributors/bobbyiliev/climateclock?logoColor=green&style=for-the-badge"></a>
	    <a name="madeWith"><img src="https://img.shields.io/badge/Made%20with-Markdown-1f425f.svg?style=for-the-badge"></a>
	    <a name="license"><img src="https://img.shields.io/github/license/bobbyiliev/climateclock?style=for-the-badge"></a>
    </p>
</div>

## 👋 About Climate Clock Discussions

ClimateClock Discussions is an open-source self-hosted climate community discussions forum solution.

A climate community is a group of people who are on a mission to complete a common climate goal. Your team is your community, and this self-hosted solution will empower you to achieve great things!

## 💻 NewRelic Integration

Climate Clock Discussions uses [New Relic APM](https://one.eu.newrelic.com/) to monitor the server status and gather data.

## 🔨 Installation

Climate Clock Discussions is based on [Guild](https://guild.so) and Laravel 8 and Jetstream so you can run it just like a standard Laravel application. Here are 2 ways of running the application:

### ✊ Manual Installation

You can use the LaraSail script to get your Linux server ready for Laravel 8:

https://github.com/thedevdojo/larasail

Once your server is up and running use `git clone` to clone the repositry and do a standard Laravel installation:

* Create a Database:

During the installation we need to use a MySQL database. You will need to create a new database and save the credentials for the next step.

* Update the `.env` file

Copy the `.env.example` file to `.env` and update your Database details in there:

```
APP_URL=http://climateclock.test

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=climateclock
DB_USERNAME=climateclock
DB_PASSWORD=climateclock_password
```

* Composer Install

```
composer install
```

* Install the NPM dependencies:

```
npm install && npm run dev
```

* Migrate Database

```
php artisan migrate
```

## 🧙‍♂️ Events and Queues (Optional)

By default Climate Clock Discussions uses Laravel Events for the Slack and Discord Notifications.

To make things more optimal you can implement the `ShouldQueue` contact to the Notification Listeners so that the notifications are sent via a worker and not at the sime time when a user presses a button. To do that edit these two files:

* `app/Listeners/Notifications/DiscordNotification.php` and update the class to:

```
class DiscordNotification implements ShouldQueue
```

* `app/Listeners/Notifications/SlackNotification.php` and update the class to:

```
class SlackNotification implements ShouldQueue
```

After that you need to specify your queue driver to either `database` or `redis` in your ENV faile or the DigitalOcean App platform, if you decided to go for Redis make sure to update your Redis ENV variables as well!

Finally make sure to set the `php artisan queue:work` command to run at all times so that it could process your queues. If you are using the DigitalOcean App platform you can achieve this with a [Worker Component](https://www.digitalocean.com/docs/app-platform/concepts/worker/).

For more information about Laravel events check out this tutorial here:

**[Laravel Events](https://devdojo.com/course/laravel-events)**

## 🌪 Tails

ClimateClock's frontend was built using **[Tails](http://devdojo.com/tails), a new `kick-ass` drag-and-drop TailwindCSS page builder**!

## 🕸️ Landing Page

A web page showcasing the ClimateClock Discussions:

https://climateclock.bobby.sh

The web page was also built using [Tails](http://devdojo.com/tails).

## 👩‍💻 DevDojo Team

The DevDojo is a resource to learn all things web development and web design. Learn on your lunch break or wake up and enjoy a cup of coffee with us to learn something new.

Join this developer community, and we can all learn together, build together, and grow together.

[Join DevDojo](https://devdojo.com?ref=bobbyiliev)

For more information, please visit https://www.devdojo.com or follow [@thedevdojo](https://twitter.com/thedevdojo) on Twitter.

## 🤲 Contributing

If you are contributing 🍿 please read the [contributing file](https://github.com/bobbyiliev/climateclock/blob/main/CONTRIBUTING.md) before submitting your pull requests.

## 🔐 Security Vulnerabilities

If you discover a security vulnerability within ClimateClock, please send an e-mail to DevDojo's team via this for here [Support](https://devdojo.com/help). All security vulnerabilities will be promptly addressed.

## 📃 License

The Climate Clock Discussions project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
