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
