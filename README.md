[![Laravel Forge Site Deployment Status](https://img.shields.io/endpoint?url=https%3A%2F%2Fforge.laravel.com%2Fsite-badges%2Fe883aafe-f0c0-4bc9-8f6a-97ee45cb216f%3Fdate%3D1%26label%3D1%26commit%3D1&style=plastic)](https://forge.laravel.com/jbk/hidden-lake-ifu/3410737)

```nginx
# Add above `location ~ \.php$ {`
location ~* /content/uploads/.*\.php$ {
    deny all;
}
```
