# Twitter Clone

Content Table
=================
<!--ts-->
   * [Technologies](#technologies)
   * [About](#about)
   * [Features](#features)
   * [Installation](#instalation)
   * [Pictures](#pictures)
   * [Status](#status)
<!--te-->

<a name="technologies">**Technologies used**</a>
- Laravel 
- MySQL
- JavaScript
- Blade
- jQuery/Ajax
- Axios
- Tailwind
- JWT

<a name="about">**About**</a>
## The Twitter Clone is a social media and personal project developed in <a href="https://laravel.com/docs/8.x/" target="_blank">laravel</a>, <a href="https://tailwindcss.com" target="_blank">tailwind</a>, <a href="https://jquery.com/" target="_blank">jQuery/Ajax</a>, <a href="https://github.com/axios/axios" target="_blank">Axios</a> and <a href="https://jwt.io/" target="_blank">JWT</a>.

<a name="features">**How it works**</a><br>
- Verified Twitter system
- Friendships
- Cool UX/UI in auth section
- Alternative login (email or phone)
- Comments and replies
- Likes and unlikes (like a tweet, comment or reply)
- Show, edit, remove and retweet tweets
- Notification system to likes, comments, replies and retweets
- Report system
- Building...


<a name="instalation">**Installation**</a><br>
- Clone the repository<br>
```
$ git clone https://github.com/felipebrsk/twitter-clone
```
- Switch to the repo folder<br>
```
$ cd twitter-clone
```
- Install all the dependencies using composer<br>
```
$ composer install
```
- Copy the example env file and make the required configuration changes in the .env file<br>
```
$ cp .env.example .env
```
- Generate a new application key<br>
```
$ php artisan key:generate
```
- Run the database migrations (Set the database connection in .env before migrating)<br>
```
$ php artisan migrate
```
- Run the seeds migrations to see how it works with examples<br>
```
$ php artisan db:seed
```
Or use this code to fresh the database and run the migration with the seeds<br>
```
$ php artisan migrate:fresh --seed
```
- Start the local development server<br>
```
$ php artisan serve
```
You can access in http://localhost:8000
<br>

<a name="pictures">**Pictures**</a>
<img src="https://user-images.githubusercontent.com/75860661/119241839-dec15000-bb2f-11eb-9e2d-c730ac4de3a9.jpeg">
<img src="https://user-images.githubusercontent.com/75860661/119241858-01ebff80-bb30-11eb-85b4-10f9bdd2cdd0.jpeg">
<img src="https://user-images.githubusercontent.com/75860661/119241861-0adcd100-bb30-11eb-979f-29c65bbda4c5.jpeg">
<img src="https://user-images.githubusercontent.com/75860661/119241865-10d2b200-bb30-11eb-802b-672806679132.jpeg">

<a name="status">**Status**</a>
<h4 align="left"> 
	🚧  Twitter - Cloning...  🚧
</h4>
