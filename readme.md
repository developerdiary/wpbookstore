## What functionality I have done here

- Create bookstore custom post type
- Install author plugin for image
- Integrate slick slider on home page
- Create category page for books
- Create individual author page where you can see his books 

## How to setup bookstore without ecommerce.

- Clone the git on your localhost 
- Create DB
- Import database from git folder DB
- If you are using localhost then you don't need to change in the url. If you are using any server then you have to change urls with following commands

```
UPDATE wp_options SET option_value = replace(option_value, 'http://example.com/', 'http://newexample.com/') WHERE option_name = 'home' OR option_name = 'siteurl';

UPDATE wp_posts SET guid = replace(guid, 'http://example.com/', 'http://newexample.com/');

UPDATE wp_posts SET post_content = replace(post_content, 'http://example.com/', 'http://newexample.com/');

UPDATE wp_postmeta SET meta_value = replace(meta_value,'http://example.com/', 'http://newexample.com/');

```
