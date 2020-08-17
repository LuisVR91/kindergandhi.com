const path = require('path');
const HtmlWebpackPlugin = require('html-webpack-plugin');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const autoprefixer = require('autoprefixer');

module.exports = {
    entry: './src/app.js',
    output: {
        path: path.resolve(__dirname, 'dist'),
        filename: 'core/js/bundle.js'
    },
    devtool: 'source-map',
    devServer: {
        port: 4000,
        open: true,
        contentBase: path.resolve(__dirname, 'dist'),
        compress: true,
        port: 9000

    },
    module: {
        rules: [
            {
                test: /\.hbs$/,
                loader: 'handlebars-loader'
            },
            {
                test: /\.(sa|sc|c)ss$/,
                use: [
                    MiniCssExtractPlugin.loader,
                    'css-loader',
                    {
                        loader: 'postcss-loader',
                        options: {
                            autoprefixer: {
                                browser: ["last 2 versions"]
                            },
                            plugins: () => [
                                autoprefixer
                            ]
                        }
                    },
                    'sass-loader',
                ],
            },
            {
                test: /\.(gif|png|jpe?g|svg)$/i,
                use: [
                  'file-loader',
                  {
                    loader: 'image-webpack-loader'
                   
                  }
                ]
              }
        ]
    },
    plugins: [
        new HtmlWebpackPlugin({
            filename: 'index.html',
            template: './src/index.hbs',
           
            minify: {
                html5: true,
                collapseWhitespace: false,
                caseSensitive: false,
                removeComments: false,
                removeEmptyElements: false
            }
        }),
      
      
        new HtmlWebpackPlugin({
            filename: 'contacto.html',
            template: './src/contacto.hbs',
            minify: {
                html5: true,
                collapseWhitespace: false,
                caseSensitive: false,
                removeComments: false,
                removeEmptyElements: false
            }
        }),    new HtmlWebpackPlugin({
            filename: 'galeria.html',
            template: './src/galeria.hbs',
            minify: {
                html5: true,
                collapseWhitespace: false,
                caseSensitive: false,
                removeComments: false,
                removeEmptyElements: false
            }
        }),
        new HtmlWebpackPlugin({
            filename: 'conocenos.html',
            template: './src/conocenos.hbs',
            minify: {
                html5: true,
                collapseWhitespace: false,
                caseSensitive: false,
                removeComments: false,
                removeEmptyElements: false
            }
        }),
        new MiniCssExtractPlugin({
            filename: "core/src/css/[name]-styles.css",
            chunkFilename: "[id].css"
        })
    ]
};