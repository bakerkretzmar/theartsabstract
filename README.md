[![Laravel Forge Site Deployment Status](https://img.shields.io/endpoint?url=https%3A%2F%2Fforge.laravel.com%2Fsite-badges%2Fe883aafe-f0c0-4bc9-8f6a-97ee45cb216f%3Fdate%3D1%26label%3D1%26commit%3D1&style=plastic)](https://forge.laravel.com/jbk/hidden-lake-ifu/3410737)

```bash
# also look for http and just '/app/'
vendor/bin/wp search-replace 'https://theartsabstract.ca/app/' 'https://theartsabstract.ca/content/' --all-tables-with-prefix --skip-columns=guid --report-changed-only --dry-run
```

7. Update the Nginx uploads rule, before the main PHP location block:

    ```nginx
    location ~* /content/uploads/.*\.php$ {
        deny all;
    }
    ```
