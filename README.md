# Simple PHP MVC Project

This is a basic and simple project structure of MVC Design Pattern in PHP using Twig Template Engine, with other functions (Optional), as database connection Oracle (10g or 11g), MySQL (^5.5), MongoDB (^3.6), and authentication with MySQL.

**[note]** In this project, It's not focusing on front-end, and used only basic components of Bootstrap 4.3.

## Requiriments
* PHP 7.0 or higher
* Composer Dependency Manager

### To work database connections tests
* PHP Module PDO(mysql and oci)
* PHP Module mongodb

### Application's Structure
<ul>
  <li>App</li>
    <ul>
      <li>controller</li>
      <li>core</li>
      <li>model</li>
        <ul style="list-style-type: circle;">
          <li>db</li>
          <li>entity</li>
          <li>finder</li>
        </ul>
      <li>view</li>
    </ul>
  <li>public</li>
    <ul style="list-style-type: circle;">
      <li>css</li>
      <li>fonts</li>
      <li>img</li>
      <li>js</li>
    </ul>
  <li>vendor</li>
    <ul style="list-style-type: circle;">
      <li>bin</li>
      <li>composer</li>
      <li>mongod</li>
      <li>symphony</li>
      <li>twig</li>
      <li>...</li>
  </ul>
</ul>

<br>

<h4>For authentication with MySQL(inform the correct params in \php-mvc\App\core\config.ini), and follow these commands:</h4>
<blockquote>
CREATE database yourdbname;

USE yourdbname;

CREATE TABLE users (
  id bigint(20) NOT NULL AUTO_INCREMENT,
  username varchar(30) NOT NULL,
  password varchar(500) NOT NULL,
  status bit(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (id)
);

INSERT INTO users 
(username, password, status)
VALUES ('yourusername', 'bcryptedPassword', 1);
</blockquote>
(In insert command, You can use Controller Bcryptgenerator on the project to generate a bcryptedPassword, or other Bcrypter on the internet.)

<h5>In project root path:</h5>
<blockquote>composer update</blockquote>

<h5>and then</h5>
run project, and go to http://localhost/php-mvc
