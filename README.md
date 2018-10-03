#Wordpress with Gulp

> Development of Wordpress theme using Gulp task manager

## Get Started

```bash
# Copy "wordpress-with-gulp" folder into your local Wordpress project: {your-site-folder}/wp-content/themes/

# Install dependencies
npm install

# Change local URL for your project in gulpfile.js
browserSync.init(files, {
  proxy: "{your-local-url-without-http}",
  notify: false
});

# Run the poject using terminal
gulp

# Project runs on http://localhost:3000
```

## App Info

### Author

Ihor Duchenko
[Ihor Duchenko](http://ihorduchenko.cloudaccess.host)

### Version

1.0.0