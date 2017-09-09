## Laravel Presets
This package scaffolds your fresh Laravel application with some css frameworks [spectre, etc ...]. By default a Laravel application has bootstrap3 auth interface. You can easily change it by laravel-presets.

## Installation
This package should be globally accessable.
```
composer global require selmonal/laravel-presets
```

## Usage
Go to your project root directory then run your presets.
```
laravel-presets preset spectre
```

Some presets update your sass and js files then you need to recompile your assets.
```
npm install
npm run dev
```

## Available Presets
    - spectre