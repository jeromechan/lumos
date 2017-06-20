LUMOS Shadowsocks Management Platform
========

[![Actively Maintained](https://maintained.tech/badge.svg)](https://maintained.tech/)
[![Codacy Badge](https://api.codacy.com/project/badge/Grade/38aaa04713c74a07950440503e035cf9)](https://www.codacy.com/app/jerome.chan369/lumos?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=jeromechan/lumos&amp;utm_campaign=Badge_Grade)

Lumos is an easier way to provide and manage shadowsocks accounts for multiple users.
The name 'lumos' is aimed at remembering the promotion system of Tuniu Corperation which was my first long supported project.

### Requirements
* PHP >= 5.4
* PDO Extension
* Python >= 2.7
* PHP Composer
* Mysql >= 5.0

### Dependency
* https://github.com/mengskysama/shadowsocks/tree/manyuser

### Installation
1. Finish installing the shadowsocks-manyuser packages and start ss service by python 2.7+.
2. Import sql/*.sql to your MySQL Database, pay attention to '.sql' files' content, also you could remove the insert sentences you really hesitate.
3. To edit the database configurations in lib/config.php. If you want to rename your site specific name, $site_url fields could help.
4. You could add numbers of administrator you want to, these store in the table named 'ss_user_admin'.
5. If you want to send mail, just install the mail-gun using composer.phar.
Don't forget to 'cd' into the lumos root directory firstly.
Run:

```
$ curl -sS https://getcomposer.org/installer | php
$ php composer.phar  install
```

### Thanks to
* https://github.com/orvice/ss-panel (PS: LUMOS's mother:d)
* https://github.com/catfan/Medoo (PS: DAO integration technique)
* https://github.com/mengskysama/shadowsocks/tree/manyuser (PS: A powerful Shadowsocks branch which can support multi-users)