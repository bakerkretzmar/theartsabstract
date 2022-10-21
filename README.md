#### Setup

Site root must be `<project-dir>/web`.

Make sure the Nginx config includes:

```nginx
# Prevent PHP scripts from being executed inside the uploads folder.
location ~* /app/uploads/.*.php$ {
  deny all;
}
```

See:

- https://docs.roots.io/bedrock
- https://docs.roots.io/bedrock/master/server-configuration/#nginx-configuration-for-bedrock
