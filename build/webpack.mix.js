let mix = require('laravel-mix');
const path = require("path");

mix.webpackConfig({
    externals: {
        jquery: "jQuery",
        bootstrap: true,
        vue: "Vue",
        moment: "moment",
    }
});

mix.setResourceRoot('./');
mix.setPublicPath('../themes/sidebar_theme');

mix
    .copyDirectory("node_modules/@fontsource/poppins", "../themes/sidebar_theme/css/fonts/poppins")
    .sass('../themes/sidebar_theme/css/presets/default/main.scss', '../themes/sidebar_theme/css/skins/default.css', {
        sassOptions: {
            includePaths: [
                path.resolve(__dirname, './node_modules/')
            ]
        }
    })
    .js('assets/themes/sidebar_theme/js/main.js', '../themes/sidebar_theme/js').vue()