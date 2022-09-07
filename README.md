# Francoise Nussbaumer

`7.9.2022` Notes to myself:

- Node Version `v17.8.0`
- node-sass has been replaced with sass
- craft needs upgrade urgently

Built with [Craft-Vue](https://github.com/chasegiunta/craft-vue/).

*Text übernommen von Stillhart-Projekt, stimmt nur teilweise.*

## Installation

1. `git clone git@gitlab.com:oolong32/edelmannkrell.git` 
2. `composer install`
3. set up empty database
4. `./craft install` (or better, use existing `.env` file)
5. `npm install`
6. `npm install --save-dev @vue/cli @vue/cli-service-global core-js@3`

## Managing Remote Repo

Updates are made in the local repo with `composer update`.

On Staging/Production it’s first `git pull origin master`, then `composer install`.

`composer update` on remote is no catastrophe, but it will rewrite `package.lock`, which needs to be stashed before pulling next time.

## Dev/Vue

- `npm run dev` (local development)
- `npm run build` (before deploying)

### Vue Components

- Vue components are automatically registred, when they are in a subfolder of `/src/components/`.
- naming in camelcase:
    - `FooBar`
    - redundant but consistent: set component name to same Value (`name: "FooBar"`)

### Twig

- the vue app is registred in `/template/_layout.twig`
- every twig template starts with `{% extends "_layout" %}`
- components can be used like `<foo-bar></foo-bar>`
- beware: no self closing tags for components in twig!
- props: `<foo-bar :myprop="{{ twigvariable }}">`
- objects as props need to be converted to json: `<foo-bar :myprop="{{ twigobject|json_encode }}">`
- this can be done in the module
- set default for prop that can be absent: `myprop="{{ twigvariable|default('hello') }}"`

## Server

### Deploy

Always **clear the cache** after pulling npm build files (Craft CP, Tools).

- before push: `npm run build`
- after pushing changes to the backend, run `php craft project-config/apply` on the server.
- after pushing changes to the module it might be neccessary to run `composer dump-autoload -a` on the server.
- after pull: run `php craft clear-caches/all` to empty cache in craft’s cp or 

## Module

### Twig Variables

### CP Styles
