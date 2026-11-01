# Mar's Music Archive

[blog.margreen.dev](https://blog.margreen.dev/)

### Wordpress blog

I made a music archive/blog as a school assignment. In this README I will be explaining my choices and the plugins I used.

## Plugins I used

- ACF, for custom fields (This is the only plugin that's really necessary when using my wordpress theme)
- Force Regenerate Thumbnails, during development, to easily refresh custom thumbnails sizes

## Mar's Music Theme

The main part of my blog is the theme. It's a classic Wordpress theme, so it's made with PHP.

### Custom post type: <i>Vinyl Records</i>

I made a custom post type in a collection called Vinyl Collection. I used ACF to add fields to the posts that are relevant to the vinyl records:
- Artist
- Release year
- Record format
- Genre
- Record label
- Purchase date
- condition

The title of the album should go in the usual title spot for Wordpress posts and the album cover should be the featured image.

### Custom widget: <i>Latest Vinyl</i>

I made a custom widget that gets the last posted vinyl record post and displays it along with the album name and artist.
