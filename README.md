> ### Laravel Livewire codebase containing real world examples (CRUD, auth, advanced patterns, etc) that adheres to the [RealWorld](https://github.com/gothinkster/realworld) spec and API.


### [Demo](https://realworld.sawirstudio.com)&nbsp;&nbsp;&nbsp;&nbsp;[Github](https://github.com/sawirricardo/realworld-tall-app)


This codebase was created to demonstrate a fully fledged fullstack application built with **Laravel Livewire** including CRUD operations, authentication, routing, pagination, and more.

We've gone to great lengths to adhere to the **Laravel Livewire** community styleguides & best practices.

For more information on how to this works with other frontends/backends, head over to the [RealWorld](https://github.com/gothinkster/realworld) repo.

## Project Overview

"Conduit" is a social blogging site (i.e. a Medium.com clone). It uses a custom API for all requests, including authentication. You can view a live demo over at https://realworld.sawirstudio.com

**General functionality:**

- Authenticate users via JWT (login/signup pages + logout button on settings page)
- CRU* users (sign up & settings page - no deleting required)
- CRUD Articles
- CR*D Comments on articles (no updating required)
- GET and display paginated lists of articles
- Favorite articles
- Follow other users

### Routing Guidelines

- Home page (URL: /#/ )
    - List of tags
    - List of articles pulled from either Feed, Global, or by Tag
    - Pagination for list of articles
- Sign in/Sign up pages (URL: /#/login, /#/register )
    - Uses JWT (store the token in localStorage)
    - Authentication can be easily switched to session/cookie based
- Settings page (URL: /#/settings )
- Editor page to create/edit articles (URL: /#/editor, /#/editor/article-slug-here )
- Article page (URL: /#/article/article-slug-here )
    - Delete article button (only shown to article's author)
    - Render markdown from server client side
    - Comments section at bottom of page
    - Delete comment button (only shown to comment's author)
- Profile page (URL: /#/profile/:username, /#/profile/:username/favorites )
    - Show basic user info
    - List of articles populated from author's created articles or author's favorited articles

# How it works
You can also access the back-end to the /api route.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
