const path = require('path');
const basePath = __dirname;
const distPath = 'Assets/css';
const MiniCssExtractPlugin = require('mini-css-extract-plugin');

module.exports = {
	entry: './Assets/js/main.js',
	output: {
		path: path.join(basePath, distPath),
		filename: '../js/scriptsFinales.js'
	},
	mode: 'development',
	devtool: 'source-map',
	module: {
		rules: [
			{
				test: /\.(c|sc|sa)ss$/,
				use: [
					MiniCssExtractPlugin.loader,
					{ loader: 'css-loader', options: { sourceMap: true } },
					{ loader: 'sass-loader', options: { sourceMap: true } },
				]
			}
		]
	},
	plugins: [
		new MiniCssExtractPlugin({
			filename: 'styles.css'
		})
	]
}