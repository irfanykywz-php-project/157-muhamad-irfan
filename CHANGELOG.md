# ChangeLog
**29 Mei 2024**
- reset password
- add php module [laravel/socialite]
- login with google
- optimize seeders
- fix admin payment only update pending status + refund reveneu if rejected
- file icon by type [image, archive, audio]
- mutator user reveneu conflict with process, fix use original value with code ``getRawOriginal`` 
- file download countdown

**28 Mei 2024**
- rename model files to file
- add banned process on login
- fill pages content

**25 Mei 2024**
- fix payment user page
- fix mutator user reveneu 
- fix query total_earning on profile
- fix register email unique validation

**24 Mei 2024**
- optimize model query
- optimize files view split to component
- admin user [status, delete]
- admin payment [status]
- admin dashboard [total user, total files, total payment, payment pending]
- add js module [croppie]
- profile edit photo upload & crop 

**23 Mei 2024**
- fix payment request [validation]
- add php module [barryvdh/laravel-debugbar]
- create middleware role
- create admin [dashboard, files, payment, user]
- add js module [bootstrap-table, jquery]
- refactory readable use mutator
- page member-payment

**22 Mei 2024**
- profile page [edit, delete]
- profile file [search]
- category page
- download page [reveneu]
- reveneu page
- payment page [request, status]

**21 Mei 2024**
- migration [payment, files, roles, downloaded]
- seeder [files, role, user]
- auth login, register [view]
- process user profile [view]
- process user files [delete, edit]
- member payment page
- search page

**17 Mei 2024**
- refactory routes move to controller
- add migration files
- add model files
- upload & download process
- latest page
- add php module [pharaonic/laravel-readable]

**15 Mei 2024**
- add js module [@hotwired/turbo]

**12 Mei 2024**
- add page file, download, user

**10 Mei 2024**
- add route and view
- use vite
- install bootstrap, bootstrap-icon

**8 Mei 2024**
- init project
